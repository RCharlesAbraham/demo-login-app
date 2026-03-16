<?php

declare(strict_types=1);

$viewsRoot = __DIR__ . '/../resources/views';

$textMap = [
    'Quiz' => "{{ route('quiz') }}",
    'Wallet Address' => "{{ route('wallet.address') }}",
    'Teach on IL2' => "{{ route('info.page', ['topic' => 'teach']) }}",
    'About Us' => "{{ route('info.page', ['topic' => 'about']) }}",
    'Contact Us' => "{{ route('info.page', ['topic' => 'contact']) }}",
    'Help and Support' => "{{ route('info.page', ['topic' => 'support']) }}",
    'Terms' => "{{ route('info.page', ['topic' => 'terms']) }}",
    'Privacy Policy' => "{{ route('info.page', ['topic' => 'privacy']) }}",
    'Cookies Policy' => "{{ route('info.page', ['topic' => 'cookies']) }}",
    'Career' => "{{ route('info.page', ['topic' => 'careers']) }}",
    'Save' => "{{ route('favorites') }}",
    'Share' => "{{ route('recommendations') }}",
    'Show all' => "{{ route('courses') }}",
    'Read more' => "{{ route('modules') }}",
    'Hide info about module content' => "{{ route('modules') }}",
    'Free' => "{{ route('free.courses') }}",
    'Stripe' => 'https://stripe.com',
];

$imgMap = [
    'facebook' => 'https://www.facebook.com/',
    'instagram' => 'https://www.instagram.com/',
    'twitter' => 'https://x.com/',
    'google_play_store_badge' => 'https://play.google.com/store',
    'download_on_the_app_store' => 'https://www.apple.com/app-store/',
];

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($viewsRoot, FilesystemIterator::SKIP_DOTS)
);

$totalFiles = 0;
$totalReplacements = 0;

foreach ($iterator as $file) {
    if (! $file->isFile() || ! str_ends_with($file->getFilename(), '.blade.php')) {
        continue;
    }

    $content = file_get_contents($file->getPathname());
    if ($content === false || $content === '') {
        continue;
    }

    $replacementsInFile = 0;

    $updated = preg_replace_callback(
        '/<a(?<pre>[^>]*?)href=("|\')javascript:void\(0\)\2(?<post>[^>]*)>(?<inner>.*?)<\/a>/is',
        static function (array $m) use (&$replacementsInFile, $textMap, $imgMap): string {
            $inner = $m['inner'];
            $attrs = strtolower(($m['pre'] ?? '') . ' ' . ($m['post'] ?? ''));

            $label = trim(strip_tags($inner));
            $label = preg_replace('/\s+/', ' ', $label ?? '') ?? '';

            $target = null;

            if ($label !== '' && array_key_exists($label, $textMap)) {
                $target = $textMap[$label];
            }

            if ($target === null && preg_match('/<img[^>]*src=["\']([^"\']+)["\']/i', $inner, $imgMatch) === 1) {
                $src = strtolower($imgMatch[1]);
                foreach ($imgMap as $needle => $url) {
                    if (str_contains($src, $needle)) {
                        $target = $url;
                        break;
                    }
                }
            }

            if ($target === null && $label === '') {
                if (str_contains($attrs, 'facebook')) {
                    $target = 'https://www.facebook.com/';
                } elseif (str_contains($attrs, 'instagram')) {
                    $target = 'https://www.instagram.com/';
                } elseif (str_contains($attrs, 'twitter')) {
                    $target = 'https://x.com/';
                } elseif (str_contains($attrs, 'h-icon-btn') || str_contains($attrs, 'h-icon') || str_contains($attrs, 'icon-btn')) {
                    $target = "{{ route('favorites') }}";
                }
            }

            if ($target === null) {
                return $m[0];
            }

            $replacementsInFile++;
            return '<a' . ($m['pre'] ?? '') . 'href="' . $target . '"' . ($m['post'] ?? '') . '>' . $inner . '</a>';
        },
        $content
    );

    if (! is_string($updated) || $updated === $content) {
        continue;
    }

    file_put_contents($file->getPathname(), $updated);
    $totalFiles++;
    $totalReplacements += $replacementsInFile;
    echo 'Updated ' . str_replace('\\', '/', $file->getPathname()) . ' (' . $replacementsInFile . ' replacements)' . PHP_EOL;
}

echo 'Done. Files updated: ' . $totalFiles . ', replacements: ' . $totalReplacements . PHP_EOL;

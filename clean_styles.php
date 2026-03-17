<?php

$files = [
    'resources/views/auth/calendar.blade.php',
    'resources/views/auth/learning.blade.php',
    'resources/views/auth/courses.blade.php',
    'resources/views/auth/quiz.blade.php',
    'resources/views/auth/account-new.blade.php',
    'resources/views/auth/wallet-address.blade.php',
    'resources/views/auth/transaction.blade.php',
    'resources/views/auth/payment-method.blade.php'
];

foreach ($files as $file) {
    if (!file_exists($file)) continue;

    $content = file_get_contents($file);

    // Remove :root, *, body styles
    $content = preg_replace('/:root\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\*\s*,\s*\*::before,\s*\*::after\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\*\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/body\s*\{.*?\}/s', '', $content);

    // Remove HEADER styles
    $content = preg_replace('/\/\*\s*───\s*HEADER\s*───\s*\*\/(.*?)(?=\/\*\s*───\s*(MAIN|SIDEBAR|CONTENT|ACCOUNT))/is', '', $content);
    $content = preg_replace('/header\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.header-pill\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.header-left\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.logo img\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.cat-dropdown\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.search-wrap\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.search-wrap input\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.search-wrap svg\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.header-right\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.h-icon-btn\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.notif-badge\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.profile-pill\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.avatar-head\s*\{.*?\}/s', '', $content);

    // Remove WRAPPER styles
    $content = preg_replace('/\n\s*\.wrapper\s*\{.*?\}/s', '', $content);

    // Remove SIDEBAR styles
    $content = preg_replace('/\/\*\s*───\s*SIDEBAR\s*───\s*\*\/(.*?)(?=\/\*\s*───\s*(CONTENT|ACCOUNT))/is', '', $content);
    $content = preg_replace('/\.sidebar\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.nav-link\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.nav-link:hover\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.nav-link\.active\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.nav-link img\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.nav-link\.active img\s*\{.*?\}/s', '', $content);

    // Remove nav-item for learning
    $content = preg_replace('/\.nav-item\s*\{.*?\}/s', '', $content);
    $content = preg_replace('/\.nav-item:hover.*?\}/s', '', $content);
    $content = preg_replace('/\.nav-item svg\s*\{.*?\}/s', '', $content);

    // Remove <footer> from the html content section
    $content = preg_replace('/<footer[^>]*>.*?<\/footer>/is', '', $content);

    // Keep the rest of the styles intact.
    
    // Clean up empty style tags if any
    $content = preg_replace('/<style>\s*<\/style>/s', '', $content);

    // Replace the class="wrapper" with nothing if it wraps the main content.
    // Actually, just changing <div class="wrapper"> to <div class="page-inner-content"> so it doesn't use the `.wrapper` CSS that might be left.
    $content = preg_replace('/<div class="wrapper">/', '<div class="dashboard-page-content">', $content);

    // Remove stray empty sections
    $content = preg_replace('/\/\*\s*───\s*(HEADER|MAIN|SIDEBAR)\s*───\s*\*\//i', '', $content);

    file_put_contents($file, $content);
    echo "Cleaned styles in $file\n";
}

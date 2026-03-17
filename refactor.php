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
    if (!file_exists($file)) {
        echo "Missing: $file\n";
        continue;
    }

    $content = file_get_contents($file);

    // If it already extends dashboard, skip
    if (strpos($content, '@extends(\'layouts.dashboard\')') !== false) {
        echo "Already refactored: $file\n";
        continue;
    }

    // Extract everything between <style> and </style>
    $styleContent = '';
    if (preg_match('/<style>(.*?)<\/style>/s', $content, $matches)) {
        $styleContent = $matches[1];
    } else {
        echo "No style tag found in $file\n";
    }

    // Find the end of </aside> or <div class="wrapper"> or </header> 
    // Wait, the main content is right after <aside class="sidebar"> ... </aside> or <header> ... </header> if no sidebar.
    // The safest way is to regex out the known blocks.

    // 1. Remove everything from <!DOCTYPE html> to </head>
    $content = preg_replace('/<!DOCTYPE html>.*?<head>.*?<\/head>/s', '', $content);
    
    // 2. Remove <body>
    $content = preg_replace('/<body[^>]*>/i', '', $content);
    $content = str_replace('</body>', '', $content);
    $content = str_replace('</html>', '', $content);

    // 3. Remove <header> ... </header>
    $content = preg_replace('/<header>.*?<\/header>/s', '', $content);
    $content = preg_replace('/<!--[^\n]*HEADER[^\n]*-->/i', '', $content);

    // 4. Remove <aside class="sidebar"> ... </aside>
    $content = preg_replace('/<aside[^>]*>.*?<\/aside>/s', '', $content);

    // 5. Remove <footer> ... </footer>
    $content = preg_replace('/<footer[^>]*>.*?<\/footer>/s', '', $content);

    // 6. Remove <div class="wrapper"> but leave its content?
    // In calendar, there is <div class="wrapper"> ... </div>. Removing it by string might be hard.
    // Let's just wrap whatever is left (which is just the main content and scripts) into @section
    
    // Clean up empty lines and styles at the top
    $content = preg_replace('/<style>.*?<\/style>/s', '', $content);

    // Build the new file
    $newContent = "@extends('layouts.dashboard')\n\n";

    if (strpos($file, 'calendar') !== false) $title = "Calendar | IL² RMUTTO";
    elseif (strpos($file, 'learning') !== false) $title = "Learning | IL² RMUTTO";
    elseif (strpos($file, 'courses') !== false) $title = "Exam | IL² RMUTTO";
    elseif (strpos($file, 'quiz') !== false) $title = "Quiz | IL² RMUTTO";
    elseif (strpos($file, 'account') !== false) $title = "Account | IL² RMUTTO";
    elseif (strpos($file, 'wallet') !== false) $title = "Wallet Address | IL² RMUTTO";
    elseif (strpos($file, 'transaction') !== false) $title = "Transaction | IL² RMUTTO";
    elseif (strpos($file, 'payment') !== false) $title = "Payment Method | IL² RMUTTO";
    else $title = "Dashboard | IL² RMUTTO";

    $newContent .= "@section('title', '$title')\n\n";

    $newContent .= "@push('styles')\n<style>\n" . trim($styleContent) . "\n</style>\n@endpush\n\n";

    $newContent .= "@section('dashboard-content')\n";
    $newContent .= trim($content) . "\n";
    $newContent .= "@endsection\n";

    file_put_contents($file, $newContent);
    echo "Refactored $file\n";
}

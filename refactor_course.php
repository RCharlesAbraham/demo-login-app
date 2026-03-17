<?php

$file = 'resources/views/auth/course-detail.blade.php';

if (!file_exists($file)) die("File not found");

$content = file_get_contents($file);

// Extract styles
$styleContent = '';
if (preg_match('/<style>(.*?)<\/style>/s', $content, $matches)) {
    $styleContent = $matches[1];
}

// 1. Remove everything from <!DOCTYPE html> to </head>
$content = preg_replace('/<!DOCTYPE html>.*?<head>.*?<\/head>/s', '', $content);

// 2. Remove <body>
$content = preg_replace('/<body[^>]*>/i', '', $content);
$content = str_replace('</body>', '', $content);
$content = str_replace('</html>', '', $content);

// 3. Remove <header> ... </header>
$content = preg_replace('/<header>.*?<\/header>/s', '', $content);

// 4. Remove sidebar
$content = preg_replace('/<aside[^>]*>.*?<\/aside>/s', '', $content);

// Remove <footer> ...
$content = preg_replace('/<footer[^>]*>.*?<\/footer>/s', '', $content);

// Clean up empty lines and styles at the top
$content = preg_replace('/<style>.*?<\/style>/s', '', $content);

// Wrap content
$newContent = "@extends('layouts.dashboard')\n\n";
$newContent .= "@section('title', 'Course Detail | IL² RMUTTO')\n\n";
$newContent .= "@push('styles')\n<style>\n" . trim($styleContent) . "\n</style>\n@endpush\n\n";
$newContent .= "@section('dashboard-content')\n";
$newContent .= trim($content) . "\n";
$newContent .= "@endsection\n";

// Cleaning out bad CSS
// Remove :root, *, body styles
$newContent = preg_replace('/:root\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\*\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/body\s*\{.*?\}/s', '', $newContent);

// Remove specific HEADER styles
$newContent = preg_replace('/\/\*\s*───\s*HEADER\s*───\s*\*\//is', '', $newContent);
$newContent = preg_replace('/header\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.header-pill\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.h-left\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.logo img\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.cat-dropdown\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.search-wrap\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.search-wrap input\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.search-wrap svg\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.search-wrap input:focus\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.h-right\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.h-icon\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.notif-badge\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.profile-btn\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.avatar-circle\s*\{.*?\}/s', '', $newContent);

// Remove LAYOUT styles .wrapper
$newContent = preg_replace('/\/\*\s*───\s*LAYOUT\s*───\s*\*\//is', '', $newContent);
$newContent = preg_replace('/\.wrapper\s*\{.*?\}/s', '', $newContent);

// Remove SIDEBAR CSS
$newContent = preg_replace('/\/\*\s*───\s*SIDEBAR\s*───\s*\*\//is', '', $newContent);
$newContent = preg_replace('/\.sidebar\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.nav-link\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.nav-link:hover\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.nav-link\.active\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.nav-link img\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.nav-link\.active img\s*\{.*?\}/s', '', $newContent);

// Replace wrapper inner class
$newContent = preg_replace('/<div class="wrapper">/', '<div class="app-container" style="max-width: 1450px; margin: 0 auto; padding: 20px 0; width: 100%;">', $newContent);

file_put_contents($file, $newContent);
echo "Refactored $file";

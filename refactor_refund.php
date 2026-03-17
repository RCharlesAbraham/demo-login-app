<?php

$file = 'resources/views/auth/refund.blade.php';

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
$content = preg_replace('/<header[^>]*>.*?<\/header>/s', '', $content);

// 4. Remove sidebar
$content = preg_replace('/<aside[^>]*>.*?<\/aside>/s', '', $content);

// Replace wrapper / shell
$content = preg_replace('/<div class="shell">/', '', $content);
$content = preg_replace('/<div class="wrapper">/', '', $content);
// We need to also remove closing div for shell, which is right before <script>
$content = preg_replace('/<\/div>\s*<script>/s', "<script>", $content);

// Remove <main class="content"> ... </main> wrappers but keep the insides?
// Wait, the main class="content" might be used for styling.
// We can just leave <div class="app-container" style="...">

// Let's replace `<main class="content">` with `<div class="app-container" style="max-width: 1450px; margin: 0 auto; padding: 20px 0; width: 100%;">`
$content = preg_replace('/<main class="content">/', '<div class="app-container" style="max-width: 1450px; margin: 0 auto; padding: 20px 0; width: 100%; display: flex; flex-direction: column; gap: 20px;">', $content);
$content = preg_replace('/<\/main>/', '</div>', $content);


// Clean up empty lines and styles at the top
$content = preg_replace('/<style>.*?<\/style>/s', '', $content);

// Wrap content
$newContent = "@extends('layouts.dashboard')\n\n";
$newContent .= "@section('title', 'Refunds | IL² RMUTTO')\n\n";
$newContent .= "@push('styles')\n<style>\n" . trim($styleContent) . "\n</style>\n@endpush\n\n";
$newContent .= "@section('dashboard-content')\n";
$newContent .= trim($content) . "\n";
$newContent .= "@endsection\n";

// Cleaning out bad CSS
// Remove :root, *, body styles
$newContent = preg_replace('/:root\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\*\s*,\s*\*::before,\s*\*::after\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/body\s*\{.*?\}/s', '', $newContent);

// Remove specific HEADER styles
$newContent = preg_replace('/\/\*\s*───\s*HEADER\s*───\s*\*\//is', '', $newContent);
$newContent = preg_replace('/header\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.header-pill\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.header-left\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.logo img\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.cat-dropdown\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.search-wrap\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.search-wrap input\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.search-wrap svg\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.header-right\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.h-icon-btn\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.notif-badge\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.profile-pill\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.avatar-head\s*\{.*?\}/s', '', $newContent);

// Remove LAYOUT styles .shell
$newContent = preg_replace('/\/\*\s*───\s*LAYOUT\s*───\s*\*\//is', '', $newContent);
$newContent = preg_replace('/\.shell\s*\{.*?\}/s', '', $newContent);

// Remove SIDEBAR CSS
$newContent = preg_replace('/\/\*\s*───\s*SIDEBAR\s*───\s*\*\//is', '', $newContent);
$newContent = preg_replace('/\.sidebar\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.nav-item\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.nav-item:hover\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.nav-item\.active\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.nav-item img\s*\{.*?\}/s', '', $newContent);
$newContent = preg_replace('/\.nav-item\.active img\s*\{.*?\}/s', '', $newContent);

// Remove main content css as we inline it
$newContent = preg_replace('/\.content\s*\{.*?\}/s', '', $newContent);

file_put_contents($file, $newContent);
echo "Refactored $file";

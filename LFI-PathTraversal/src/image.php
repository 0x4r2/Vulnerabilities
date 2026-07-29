<?php
$file = isset($_GET['file']) ? $_GET['file'] : '';
$path = __DIR__ . '/images/' . $file;

$ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
$mime = [
    'jpg'  => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png'  => 'image/png',
    'gif'  => 'image/gif',
    'webp' => 'image/webp',
];
header('Content-Type: ' . ($mime[$ext] ?? 'image/jpeg'));

if (file_exists($path) && is_file($path)) {
    readfile($path);
} else {
    http_response_code(404);
    echo 'File not found.';
}

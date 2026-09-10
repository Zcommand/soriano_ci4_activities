<?php

$tmpPath = '/tmp/';

$directories = [
    'cache',
    'logs',
    'session',
    'uploads',
    'debugbar',
];

foreach ($directories as $directory) {
    $path = $tmpPath . $directory;

    if (! is_dir($path)) {
        mkdir($path, 0777, true);
    }
}

define('WRITEPATH', $tmpPath);

/*
 * Vercel production URL
 */
$_ENV['app.baseURL'] = 'https://soriano-pos-ci4.vercel.app/';
$_SERVER['app.baseURL'] = 'https://soriano-pos-ci4.vercel.app/';

require __DIR__ . '/../public/index.php';
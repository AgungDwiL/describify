<?php
// Load .env file
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        [$key, $value] = explode('=', $line, 2);
        define(trim($key), trim($value));
    }
}

if (!defined('OPENROUTER_API_KEY')) define('OPENROUTER_API_KEY', '');
if (!defined('OPENROUTER_MODEL'))   define('OPENROUTER_MODEL', 'openrouter/free');

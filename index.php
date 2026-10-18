<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/config/session.php';
require_once __DIR__ . '/routes/web.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
$path = str_replace('//', '/', $path);
$path = preg_replace('#/+#', '/', $path) ?: '/';
$path = $path === '' ? '/' : rtrim($path, '/');
if ($path === '') {
    $path = '/';
}

if (strpos($path, '/sidado') === 0) {
    $path = substr($path, strlen('/sidado')) ?: '/';
}

dispatch($path);

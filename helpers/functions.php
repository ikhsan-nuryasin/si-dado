<?php
function url(string $path = ''): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

function view(string $template, array $data = [], string $layout = 'public'): void
{
    extract($data);
    $selectedLayout = $data['layout'] ?? $layout;
    $layoutFile = APP_ROOT . '/views/layouts/' . $selectedLayout . '.php';
    if (!file_exists($layoutFile)) {
        $layoutFile = APP_ROOT . '/views/layouts/public.php';
    }

    $contentView = APP_ROOT . '/views/' . $template . '.php';
    if (!file_exists($contentView)) {
        $contentView = APP_ROOT . '/views/404.php';
    }

    include $layoutFile;
}

function now(): string
{
    return date('Y-m-d H:i:s');
}

function upload_file(array $file, string $subdir = 'general'): string
{
    if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
        return '';
    }

    $targetDir = UPLOAD_DIR . $subdir . '/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid('img_', true) . '.' . $ext;
    $targetPath = $targetDir . $filename;
    move_uploaded_file($file['tmp_name'], $targetPath);
    return 'assets/uploads/' . $subdir . '/' . $filename;
}

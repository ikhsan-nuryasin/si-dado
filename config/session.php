<?php
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verify_csrf(): bool
{
    $token = $_POST['csrf_token'] ?? '';
    return hash_equals($_SESSION['csrf_token'] ?? '', $token);
}

function set_flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function get_flash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $flash;
}

function redirect(string $path): void
{
    header('Location: ' . BASE_URL . $path);
    exit;
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function asset(string $path): string
{
    return BASE_URL . '/assets/' . ltrim($path, '/');
}

function user(): ?array
{
    return $_SESSION['user'] ?? null;
}

function is_logged_in(): bool
{
    return !empty($_SESSION['user']);
}

function require_login(): void
{
    if (!is_logged_in()) {
        set_flash('warning', 'Silakan login untuk melanjutkan.');
        redirect('/login');
    }
}

function require_role(array $roles): void
{
    require_login();
    $current = $_SESSION['user']['role_name'] ?? '';
    if (!in_array($current, $roles, true)) {
        set_flash('danger', 'Anda tidak memiliki akses ke halaman ini.');
        redirect('/dashboard');
    }
}

function is_admin_user(): bool
{
    $role = $_SESSION['user']['role_name'] ?? '';
    return in_array($role, ['Super Admin', 'Admin PMI', 'Admin Rumah Sakit', 'Admin Klinik', 'Petugas UTD', 'Petugas BDRS'], true);
}

function require_admin(): void
{
    require_login();
    if (!is_admin_user()) {
        set_flash('danger', 'Halaman ini hanya untuk admin.');
        redirect('/');
    }
}

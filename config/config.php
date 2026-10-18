<?php
if (session_status() === PHP_SESSION_NONE) {
    session_name('sidado_session');
    session_start();
}

define('APP_ROOT', dirname(__DIR__));
define('BASE_URL', 'http://localhost/sidado');
define('APP_NAME', 'SI DADO');
define('APP_VERSION', '1.0.0');
define('UPLOAD_DIR', APP_ROOT . '/assets/uploads/');

define('DB_HOST', defined('DB_HOST') ? DB_HOST : '127.0.0.1');
define('DB_NAME', defined('DB_NAME') ? DB_NAME : 'sidado');
define('DB_USER', defined('DB_USER') ? DB_USER : 'root');
define('DB_PASS', defined('DB_PASS') ? DB_PASS : '');

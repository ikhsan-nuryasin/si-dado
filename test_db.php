<?php
require __DIR__ . '/config/config.php';
require __DIR__ . '/config/database.php';

try {
    $pdo = Database::getConnection();
    echo 'DB_OK';
} catch (Throwable $e) {
    echo $e->getMessage();
}

<?php
require __DIR__ . '/config/config.php';
require __DIR__ . '/config/database.php';

$pdo = Database::getConnection();
$stmt = $pdo->prepare('SELECT password_hash FROM users WHERE email = ?');
$stmt->execute(['admin@sidado.id']);
$hash = $stmt->fetchColumn();
echo $hash . PHP_EOL;
echo password_verify('password123', $hash) ? 'VERIFIED' : 'FAILED';

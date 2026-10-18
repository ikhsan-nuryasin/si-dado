<?php
require 'config/config.php';
require 'config/database.php';
$pdo = Database::getConnection();
foreach (['admin@sidado.id', 'user@sidado.id'] as $email) {
    $stmt = $pdo->prepare('SELECT email, role_id FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    echo $row['email'] . ':' . $row['role_id'] . PHP_EOL;
}

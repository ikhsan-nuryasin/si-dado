<?php
require_once __DIR__ . '/../config/database.php';

class UserRoleModel
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT * FROM roles ORDER BY id');
        return $stmt->fetchAll();
    }

    public static function allUsers(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT u.id, u.name, u.email, u.is_active, r.name AS role_name FROM users u LEFT JOIN roles r ON r.id = u.role_id ORDER BY u.id DESC');
        return $stmt->fetchAll();
    }

    public static function createUser(array $data): int
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password_hash, role_id, is_active, created_at, updated_at) VALUES (:name, :email, :password_hash, :role_id, :is_active, :created_at, :updated_at)');
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':password_hash' => password_hash($data['password'], PASSWORD_DEFAULT),
            ':role_id' => $data['role_id'],
            ':is_active' => $data['is_active'] ?? 1,
            ':created_at' => now(),
            ':updated_at' => now(),
        ]);
        return (int)$pdo->lastInsertId();
    }
}

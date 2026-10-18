<?php
require_once __DIR__ . '/../config/database.php';

class BloodStockModel
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT * FROM blood_stocks ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('INSERT INTO blood_stocks (facility_id, blood_group, rhesus, component, quantity, expiry_date, status, source, created_at, updated_at) VALUES (:facility_id, :blood_group, :rhesus, :component, :quantity, :expiry_date, :status, :source, :created_at, :updated_at)');
        $stmt->execute([
            ':facility_id' => $data['facility_id'],
            ':blood_group' => $data['blood_group'],
            ':rhesus' => $data['rhesus'],
            ':component' => $data['component'],
            ':quantity' => $data['quantity'],
            ':expiry_date' => $data['expiry_date'],
            ':status' => $data['status'],
            ':source' => $data['source'],
            ':created_at' => now(),
            ':updated_at' => now(),
        ]);
        return (int)$pdo->lastInsertId();
    }
}

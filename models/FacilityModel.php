<?php
require_once __DIR__ . '/../config/database.php';

class FacilityModel
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT * FROM facilities ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM facilities WHERE id = :id LIMIT 1');
        $stmt->execute([':id' => $id]);
        $facility = $stmt->fetch();
        return $facility ?: null;
    }

    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('INSERT INTO facilities (name, facility_type, address, province, city, district, postal_code, latitude, longitude, phone, email, website, operating_hours, is_active, is_pmi_partner, logo_path, created_at, updated_at) VALUES (:name, :facility_type, :address, :province, :city, :district, :postal_code, :latitude, :longitude, :phone, :email, :website, :operating_hours, :is_active, :is_pmi_partner, :logo_path, :created_at, :updated_at)');
        $stmt->execute([
            ':name' => $data['name'],
            ':facility_type' => $data['facility_type'],
            ':address' => $data['address'],
            ':province' => $data['province'],
            ':city' => $data['city'],
            ':district' => $data['district'],
            ':postal_code' => $data['postal_code'],
            ':latitude' => $data['latitude'],
            ':longitude' => $data['longitude'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':website' => $data['website'],
            ':operating_hours' => $data['operating_hours'],
            ':is_active' => $data['is_active'] ?? 1,
            ':is_pmi_partner' => $data['is_pmi_partner'] ?? 1,
            ':logo_path' => $data['logo_path'] ?? '',
            ':created_at' => now(),
            ':updated_at' => now(),
        ]);
        return (int)$pdo->lastInsertId();
    }

    public static function update(int $id, array $data): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('UPDATE facilities SET name = :name, facility_type = :facility_type, address = :address, province = :province, city = :city, district = :district, postal_code = :postal_code, latitude = :latitude, longitude = :longitude, phone = :phone, email = :email, website = :website, operating_hours = :operating_hours, is_active = :is_active, is_pmi_partner = :is_pmi_partner, logo_path = :logo_path, updated_at = :updated_at WHERE id = :id');
        $stmt->execute([
            ':id' => $id,
            ':name' => $data['name'],
            ':facility_type' => $data['facility_type'],
            ':address' => $data['address'],
            ':province' => $data['province'],
            ':city' => $data['city'],
            ':district' => $data['district'],
            ':postal_code' => $data['postal_code'],
            ':latitude' => $data['latitude'],
            ':longitude' => $data['longitude'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':website' => $data['website'],
            ':operating_hours' => $data['operating_hours'],
            ':is_active' => $data['is_active'] ?? 1,
            ':is_pmi_partner' => $data['is_pmi_partner'] ?? 1,
            ':logo_path' => $data['logo_path'] ?? '',
            ':updated_at' => now(),
        ]);
    }

    public static function delete(int $id): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM facilities WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }
}

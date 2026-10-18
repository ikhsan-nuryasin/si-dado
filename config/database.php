<?php
class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $dsn = 'mysql:host=' . DB_HOST . ';charset=utf8mb4';
            $databaseDsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';

            try {
                self::$connection = new PDO($databaseDsn, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {
                if (str_contains($e->getMessage(), '1049') || str_contains($e->getMessage(), 'Unknown database')) {
                    $initializer = new PDO($dsn, DB_USER, DB_PASS, $options);
                    $initializer->exec('CREATE DATABASE IF NOT EXISTS `' . DB_NAME . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
                    self::$connection = new PDO($databaseDsn, DB_USER, DB_PASS, $options);
                } else {
                    throw $e;
                }
            }

            self::initializeSchema();
        }

        return self::$connection;
    }

    private static function initializeSchema(): void
    {
        $pdo = self::$connection;
        $pdo->exec("CREATE TABLE IF NOT EXISTS roles (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(50) NOT NULL UNIQUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB");

        $pdo->exec("CREATE TABLE IF NOT EXISTS users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            password_hash VARCHAR(255) NOT NULL,
            role_id INT NOT NULL DEFAULT 1,
            is_active TINYINT(1) DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            CONSTRAINT fk_users_role FOREIGN KEY (role_id) REFERENCES roles(id)
        ) ENGINE=InnoDB");

        $pdo->exec("CREATE TABLE IF NOT EXISTS facilities (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(150) NOT NULL,
            facility_type VARCHAR(100) NOT NULL,
            address TEXT,
            province VARCHAR(100),
            city VARCHAR(100),
            district VARCHAR(100),
            postal_code VARCHAR(20),
            latitude VARCHAR(50),
            longitude VARCHAR(50),
            phone VARCHAR(50),
            email VARCHAR(100),
            website VARCHAR(255),
            operating_hours VARCHAR(100),
            is_active TINYINT(1) DEFAULT 1,
            is_pmi_partner TINYINT(1) DEFAULT 1,
            logo_path VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB");

        $pdo->exec("CREATE TABLE IF NOT EXISTS blood_stocks (
            id INT PRIMARY KEY AUTO_INCREMENT,
            facility_id INT NOT NULL,
            blood_group VARCHAR(10) NOT NULL,
            rhesus VARCHAR(10) NOT NULL,
            component VARCHAR(50) NOT NULL,
            quantity INT NOT NULL DEFAULT 0,
            expiry_date DATE,
            status VARCHAR(50) NOT NULL DEFAULT 'Tersedia',
            source VARCHAR(50) NOT NULL DEFAULT 'Manual',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            CONSTRAINT fk_blood_stocks_facility FOREIGN KEY (facility_id) REFERENCES facilities(id)
        ) ENGINE=InnoDB");

        $pdo->exec("INSERT IGNORE INTO roles (id, name) VALUES (1, 'Super Admin'), (2, 'Admin PMI'), (3, 'Admin Rumah Sakit'), (4, 'Admin Klinik'), (5, 'Petugas UTD'), (6, 'Petugas BDRS'), (7, 'Masyarakat')");

        $adminHash = password_hash('password123', PASSWORD_DEFAULT);
        $userHash = password_hash('user12345', PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash, role_id, is_active) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE password_hash = VALUES(password_hash), role_id = VALUES(role_id), is_active = VALUES(is_active)");
        $stmt->execute(['Administrator', 'admin@sidado.id', $adminHash, 1, 1]);
        $stmt->execute(['Pengguna Umum', 'user@sidado.id', $userHash, 7, 1]);
    }
}

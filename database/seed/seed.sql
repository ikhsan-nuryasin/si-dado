USE sidado;

INSERT INTO roles (id, name) VALUES
(1, 'Super Admin'),
(2, 'Admin PMI'),
(3, 'Admin Rumah Sakit'),
(4, 'Admin Klinik'),
(5, 'Petugas UTD'),
(6, 'Petugas BDRS'),
(7, 'Masyarakat');

INSERT INTO users (name, email, password_hash, role_id, is_active) VALUES
('Administrator', 'admin@sidado.id', '$2y$10$PPb5fBGSUBpXr6elQbv3f.jdYUImFOgDrU8vN./isrGwFGe0AM2MS', 1, 1),
('Pengguna Umum', 'user@sidado.id', '$2y$10$2yK2D6yqQ.G4cQx7gxXkuO54iJj0gQ0G5J66mYnW4m9pWv2K7zM4K', 7, 1);

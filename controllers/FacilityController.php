<?php
require_once __DIR__ . '/../models/FacilityModel.php';
require_once __DIR__ . '/../config/session.php';

class FacilityController
{
    public function index(): void
    {
        require_admin();
        $facilities = FacilityModel::all();
        view('fasilitas/index', ['page_title' => 'Fasilitas Kesehatan', 'layout' => 'admin', 'facilities' => $facilities]);
    }

    public function create(): void
    {
        require_admin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf()) {
                set_flash('danger', 'CSRF token tidak valid.');
                redirect('/fasilitas');
            }

            $logoPath = '';
            if (!empty($_FILES['logo']['tmp_name'])) {
                $logoPath = upload_file($_FILES['logo'], 'facilities');
            }

            FacilityModel::create([
                'name' => trim($_POST['name'] ?? ''),
                'facility_type' => trim($_POST['facility_type'] ?? ''),
                'address' => trim($_POST['address'] ?? ''),
                'province' => trim($_POST['province'] ?? ''),
                'city' => trim($_POST['city'] ?? ''),
                'district' => trim($_POST['district'] ?? ''),
                'postal_code' => trim($_POST['postal_code'] ?? ''),
                'latitude' => trim($_POST['latitude'] ?? ''),
                'longitude' => trim($_POST['longitude'] ?? ''),
                'phone' => trim($_POST['phone'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'website' => trim($_POST['website'] ?? ''),
                'operating_hours' => trim($_POST['operating_hours'] ?? ''),
                'is_active' => (int)($_POST['is_active'] ?? 1),
                'is_pmi_partner' => (int)($_POST['is_pmi_partner'] ?? 1),
                'logo_path' => $logoPath,
            ]);

            set_flash('success', 'Fasilitas berhasil ditambahkan.');
            redirect('/fasilitas');
        }

        view('fasilitas/form', ['page_title' => 'Tambah Fasilitas', 'layout' => 'admin', 'csrf_token' => csrf_token()]);
    }

    public function edit(int $id): void
    {
        require_admin();
        $facility = FacilityModel::find($id);
        if (!$facility) {
            set_flash('danger', 'Fasilitas tidak ditemukan.');
            redirect('/fasilitas');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf()) {
                set_flash('danger', 'CSRF token tidak valid.');
                redirect('/fasilitas');
            }

            $logoPath = $facility['logo_path'] ?? '';
            if (!empty($_FILES['logo']['tmp_name'])) {
                $logoPath = upload_file($_FILES['logo'], 'facilities');
            }

            FacilityModel::update($id, [
                'name' => trim($_POST['name'] ?? ''),
                'facility_type' => trim($_POST['facility_type'] ?? ''),
                'address' => trim($_POST['address'] ?? ''),
                'province' => trim($_POST['province'] ?? ''),
                'city' => trim($_POST['city'] ?? ''),
                'district' => trim($_POST['district'] ?? ''),
                'postal_code' => trim($_POST['postal_code'] ?? ''),
                'latitude' => trim($_POST['latitude'] ?? ''),
                'longitude' => trim($_POST['longitude'] ?? ''),
                'phone' => trim($_POST['phone'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'website' => trim($_POST['website'] ?? ''),
                'operating_hours' => trim($_POST['operating_hours'] ?? ''),
                'is_active' => (int)($_POST['is_active'] ?? 1),
                'is_pmi_partner' => (int)($_POST['is_pmi_partner'] ?? 1),
                'logo_path' => $logoPath,
            ]);

            set_flash('success', 'Fasilitas berhasil diperbarui.');
            redirect('/fasilitas');
        }

        view('fasilitas/form', ['page_title' => 'Edit Fasilitas', 'layout' => 'admin', 'facility' => $facility, 'csrf_token' => csrf_token()]);
    }

    public function delete(int $id): void
    {
        require_admin();
        FacilityModel::delete($id);
        set_flash('success', 'Fasilitas berhasil dihapus.');
        redirect('/fasilitas');
    }
}

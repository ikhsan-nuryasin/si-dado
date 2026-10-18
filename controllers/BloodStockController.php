<?php
require_once __DIR__ . '/../models/BloodStockModel.php';
require_once __DIR__ . '/../config/session.php';

class BloodStockController
{
    public function index(): void
    {
        require_admin();
        $stocks = BloodStockModel::all();
        view('stok/index', ['page_title' => 'Stok Darah', 'layout' => 'admin', 'stocks' => $stocks]);
    }

    public function create(): void
    {
        require_admin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            BloodStockModel::create([
                'facility_id' => (int)($_POST['facility_id'] ?? 0),
                'blood_group' => trim($_POST['blood_group'] ?? ''),
                'rhesus' => trim($_POST['rhesus'] ?? ''),
                'component' => trim($_POST['component'] ?? ''),
                'quantity' => (int)($_POST['quantity'] ?? 0),
                'expiry_date' => trim($_POST['expiry_date'] ?? ''),
                'status' => trim($_POST['status'] ?? 'Tersedia'),
                'source' => trim($_POST['source'] ?? 'Manual'),
            ]);
            set_flash('success', 'Data stok berhasil disimpan.');
            redirect('/stok');
        }

        view('stok/form', ['page_title' => 'Tambah Stok Darah', 'layout' => 'admin', 'csrf_token' => csrf_token()]);
    }
}

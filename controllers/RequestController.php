<?php
require_once __DIR__ . '/../config/session.php';

class RequestController
{
    public function index(): void
    {
        require_admin();
        view('permintaan/index', ['page_title' => 'Permintaan Darah', 'layout' => 'admin']);
    }

    public function create(): void
    {
        require_admin();
        view('permintaan/form', ['page_title' => 'Tambah Permintaan', 'layout' => 'admin', 'csrf_token' => csrf_token()]);
    }
}

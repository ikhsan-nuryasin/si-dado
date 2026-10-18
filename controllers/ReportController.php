<?php
require_once __DIR__ . '/../config/session.php';

class ReportController
{
    public function index(): void
    {
        require_admin();
        view('laporan/index', ['page_title' => 'Laporan SI DADO', 'layout' => 'admin']);
    }
}

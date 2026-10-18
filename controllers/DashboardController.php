<?php
require_once __DIR__ . '/../config/session.php';

class DashboardController
{
    public function index(): void
    {
        require_admin();
        view('dashboard/index', ['page_title' => 'Dashboard', 'layout' => 'admin']);
    }
}

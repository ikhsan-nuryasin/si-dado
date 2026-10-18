<?php
require_once __DIR__ . '/../config/session.php';

class DistributionController
{
    public function index(): void
    {
        require_admin();
        view('distribusi/index', ['page_title' => 'Distribusi Darah', 'layout' => 'admin']);
    }
}

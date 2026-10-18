<?php
require_once __DIR__ . '/../config/session.php';

class PublicController
{
    public function index(): void
    {
        view('public/index', ['page_title' => 'Pencarian Darah', 'layout' => 'public']);
    }
}

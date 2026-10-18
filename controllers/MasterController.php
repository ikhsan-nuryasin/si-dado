<?php
require_once __DIR__ . '/../config/session.php';

class MasterController
{
    public function provinces(): void
    {
        require_admin();
        view('master/provinces', ['page_title' => 'Master Provinsi', 'layout' => 'admin']);
    }

    public function districts(): void
    {
        require_admin();
        view('master/districts', ['page_title' => 'Master Kabupaten', 'layout' => 'admin']);
    }

    public function bloodGroups(): void
    {
        require_admin();
        view('master/blood-groups', ['page_title' => 'Master Golongan Darah', 'layout' => 'admin']);
    }

    public function components(): void
    {
        require_admin();
        view('master/components', ['page_title' => 'Master Komponen Darah', 'layout' => 'admin']);
    }
}

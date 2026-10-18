<?php
class FacilityController
{
    public function index(): void
    {
        view('fasilitas/index', ['page_title' => 'Fasilitas Kesehatan', 'layout' => 'admin']);
    }
}

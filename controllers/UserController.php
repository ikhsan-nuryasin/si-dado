<?php
require_once __DIR__ . '/../models/UserRoleModel.php';
require_once __DIR__ . '/../config/session.php';

class UserController
{
    public function index(): void
    {
        require_admin();
        $users = UserRoleModel::allUsers();
        $roles = UserRoleModel::all();
        view('users/index', ['page_title' => 'Manajemen User', 'layout' => 'admin', 'users' => $users, 'roles' => $roles]);
    }

    public function create(): void
    {
        require_admin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            UserRoleModel::createUser([
                'name' => trim($_POST['name'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'password' => $_POST['password'] ?? '',
                'role_id' => (int)($_POST['role_id'] ?? 1),
                'is_active' => (int)($_POST['is_active'] ?? 1),
            ]);
            set_flash('success', 'User berhasil ditambahkan.');
            redirect('/users');
        }

        $roles = UserRoleModel::all();
        view('users/form', ['page_title' => 'Tambah User', 'layout' => 'admin', 'roles' => $roles, 'csrf_token' => csrf_token()]);
    }
}

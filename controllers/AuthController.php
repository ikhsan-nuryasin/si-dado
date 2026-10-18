<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/session.php';

class AuthController
{
    private function getRoleName(int $roleId): ?string
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT name FROM roles WHERE id = :id LIMIT 1');
        $stmt->execute([':id' => $roleId]);
        $row = $stmt->fetch();
        return $row['name'] ?? null;
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf()) {
                set_flash('danger', 'CSRF token tidak valid.');
                redirect('/login');
            }

            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $user = UserModel::findByEmail($email);

            if ($user && password_verify($password, $user['password_hash'])) {
                $roleName = 'Masyarakat';
                if (!empty($user['role_id'])) {
                    $roleStmt = $this->getRoleName($user['role_id']);
                    if ($roleStmt !== null) {
                        $roleName = $roleStmt;
                    }
                }

                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role_name' => $roleName,
                ];
                set_flash('success', 'Login berhasil.');
                redirect('/dashboard');
            }

            set_flash('danger', 'Email atau password salah.');
            redirect('/login');
        }

        view('auth/login', ['csrf_token' => csrf_token()]);
    }

    public function logout(): void
    {
        session_destroy();
        redirect('/login');
    }
}

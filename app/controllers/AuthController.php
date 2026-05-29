<?php
require_once '../app/models/UserModel.php';

class AuthController {

    private $userModel;

    public function __construct() {
        session_start();
        $this->userModel = new UserModel();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm_password'];
            $role = $_POST['role'];
            
            if ($password !== $confirm) {
            echo "Password tidak sama!";
            return;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
            if (!in_array($role, ['admin','siswa'])) {
                echo "Role tidak valid!";
                return;
            }

            $this->userModel->register([
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'role' => $role
            ]);

            header("Location: index.php?url=login");
            exit;
        }

        require '../app/views/auth/register.php';
    }

    public function login() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $user = $this->userModel->getByEmail($email);

        if (!$user) {
            die("EMAIL TIDAK DITEMUKAN");
        }

        // kode ini sementara TIDAK akan jalan karena exit di atas
        if (!password_verify($password, $user['password'])) {
            die("PASSWORD SALAH");
        }

        $_SESSION['user'] = $user;

        if ($user['role'] == 'admin') {
            header("Location: index.php?url=admin");
        } else {
            header("Location: index.php?url=siswa");
        }

        exit;
    }

    require '../app/views/auth/login.php';
}

    public function logout() {
        session_destroy();
        header("Location: index.php?url=login");
    }

    public function listUser() {
        $users = $this->userModel->getAllUsers();
        require '../app/views/admin/user_list.php';
    }

    public function tambahUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama     = $_POST['nama'];
            $email    = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role     = $_POST['role'];

            $this->userModel->register([
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'role' => $role
            ]);

            header('Location: index.php?url=user_list');
            exit;
        }

        // kalau belum submit → tampilkan form
        require '../app/views/admin/user_tambah.php';
    }

    public function hapusUser() {
        $id = $_GET['id'];

        $this->userModel->deleteUser($id);

        header('Location: index.php?url=user_list');
        exit;
    }
    


}
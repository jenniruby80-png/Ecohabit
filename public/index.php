<?php
require_once '../app/controllers/AuthController.php';

$auth = new AuthController();

$url = $_GET['url'] ?? 'login';

switch ($url) {

    case 'register':
        $auth->register();
        break;

    case 'login':
        $auth->login();
        break;

    case 'logout':
        $auth->logout();
        break;

    case 'admin':
        require '../app/views/admin/dashboard.php';
        break;

    case 'siswa':
        require '../app/views/siswa/dashboard.php';
        break;

    default:
        echo "404";
}
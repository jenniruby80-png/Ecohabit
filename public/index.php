<?php
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/AktivitasController.php';
require '../app/views/admin/dashboard.php';

$aktivitas = new AktivitasController();

$auth = new AuthController();

$url = $_GET['url'] ?? 'login';
$url = $_GET['url'] ?? 'index';


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

    case 'tambah_aktivitas':
        $aktivitas->index();
        break;

    case 'simpan_aktivitas':
        $aktivitas->simpan();
        break;

    case 'riwayat':
        $aktivitas->riwayat();
        break;

    case 'grafik':
    $aktivitas->grafik();
    break;

    case 'user_list':
    case 'user_tambah':
    case 'kebiasaan_list':
    case 'kebiasaan_tambah':
    case 'laporan':
    case 'grafik_admin':
    
    break;

    default:
        echo "404";

        
}
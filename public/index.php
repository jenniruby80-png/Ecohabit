<?php
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/AktivitasController.php';

// Inisialisasi controller
$auth = new AuthController();
$aktivitas = new AktivitasController();

// Ambil URL (default ke login)
$url = $_GET['url'] ?? 'login';

// Routing
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

    // route kosong (biar ga error kalau dipanggil)
    case 'user_list':
        $auth->listUser();
        break;

    case 'user_tambah':
        $auth->tambahUser();
        break;

    case 'user_hapus':
        $auth->hapusUser();
        break;

    case 'kebiasaan_list':
        $aktivitas->listKebiasaan();
        break;

    case 'kebiasaan_tambah':
        $aktivitas->tambahKebiasaan();
        break;

    case 'kebiasaan_hapus':
        $aktivitas->hapusKebiasaan();
        break;

    case 'laporan':
        $aktivitas->laporan();
        break;

    case 'grafik_admin':
        $aktivitas->grafikAdmin();
        break;

    default:
        echo "404 - Halaman tidak ditemukan";
}
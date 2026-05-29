<?php
require_once '../core/Database.php';
require_once '../app/models/AktivitasModel.php';

class AktivitasController {

    private $db;
    private $aktivitasModel;

    public function __construct() {
        $this->db = new Database();
        $this->aktivitasModel = new AktivitasModel();
    }

    public function index() {
        $kebiasaan = $this->aktivitasModel->getAllKebiasaan();
        require '../app/views/siswa/tambah_aktivitas.php';
    }

    public function simpan() {
        session_start();

        $user_id = $_SESSION['user']['id'];
        $kebiasaan_id = $_POST['kebiasaan_id'];

        $this->aktivitasModel->tambahAktivitas($user_id, $kebiasaan_id);

        header("Location: index.php?url=dashboard");
    }

    public function riwayat() {
        $riwayat = $this->aktivitasModel->getRiwayat();
        require '../app/views/siswa/riwayat.php';
    }

    public function grafik() {
        $grafik = $this->aktivitasModel->getGrafik();

        $label = $grafik['label'];
        $data = $grafik['data'];

        require '../app/views/siswa/grafik.php';
    }

    public function listKebiasaan() {
        $kebiasaan = $this->aktivitasModel->getAllKebiasaan();
        require '../app/views/admin/kebiasaan_list.php';
    }

    public function tambahKebiasaan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $this->aktivitasModel->tambahKebiasaan($nama);
            header('Location: index.php?url=kebiasaan_list');
            exit;
        }
        require '../app/views/admin/kebiasaan_tambah.php';
    }

    public function hapusKebiasaan() {
        $id = $_GET['id'];
        $this->aktivitasModel->hapusKebiasaan($id);
        header('Location: index.php?url=kebiasaan_list');
        exit;
    }

    public function laporan() {
        $laporan = $this->aktivitasModel->getLaporan();
        require '../app/views/admin/laporan.php';
    }

    public function grafikAdmin() {
        $grafik = $this->aktivitasModel->getGrafik();

        $label = $grafik['label'];
        $data = $grafik['data'];

        require '../app/views/admin/grafik_admin.php';
    }


}
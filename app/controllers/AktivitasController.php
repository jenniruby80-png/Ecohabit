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

    public function simpan()
        {
            session_start();

            if (!isset($_SESSION['user']['id'])) {
                header("Location: index.php?url=login");
                exit;
            }

            $user_id = $_SESSION['user']['id'];
            $kebiasaan_id = $_POST['kebiasaan_id'];

            // CEK DUPLIKAT
            if ($this->aktivitasModel->sudahPernahHariIni($user_id, $kebiasaan_id)) {
                $_SESSION['error'] = "Kamu sudah memilih aktivitas ini hari ini!";
                header("Location: index.php?url=tambah_aktivitas");
                exit;
            }

            // SIMPAN
            $this->aktivitasModel->tambahAktivitas($user_id, $kebiasaan_id);

            $_SESSION['success'] = "Aktivitas berhasil disimpan!";
            header("Location: index.php?url=tambah_aktivitas");
            exit;
        }

     public function dashboard()
    {
       $user_id = $_SESSION['user']['id'];

        $total_poin = $this->aktivitasModel->getTotalPoin($user_id);

        require '../app/views/siswa/dashboard.php';
    }
    public function riwayat()
    {

        $user_id = $_SESSION['user']['id'];

        $model = new AktivitasModel();

        $riwayat = $model->getRiwayat($user_id);

        $total_poin = $model->getTotalPoin($user_id);

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
        $nama = $_POST['nama_kebiasaan'];
        $poin = $_POST['poin'];

        $this->aktivitasModel->tambahKebiasaan($nama, $poin);

        header('Location: index.php?url=kebiasaan_list');
        exit;
    }

    $kebiasaan = $this->aktivitasModel->getAllKebiasaan();

    require '../app/views/admin/kebiasaan_tambah.php';
}

    public function hapusKebiasaan() {
        $id = $_GET['id'];
        $this->aktivitasModel->hapusKebiasaan($id);
        header('Location: index.php?url=kebiasaan_list');
        exit;
    }

   public function laporan()
    {
        // Data tabel laporan
        $laporan = $this->aktivitasModel->getLaporan();

        // Data grafik
        $grafik = $this->aktivitasModel->getGrafik();

        $label = $grafik['label'];
        $data = $grafik['data'];

        // Tampilkan halaman laporan yang sudah berisi tabel dan grafik
        require '../app/views/admin/laporan.php';
    }
    public function getRiwayat()
        {
            $query = "
            SELECT k.nama_kebiasaan, a.tanggal
            FROM aktivitas a
            JOIN kebiasaan k ON a.kebiasaan_id = k.id
            WHERE a.user_id = ?
            ORDER BY a.tanggal DESC
        ";

            $stmt = $this->db->conn->prepare($query);
            $stmt->bind_param("i", $_SESSION['user']['id']);
            $stmt->execute();

            $result = $stmt->get_result();

            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            return $data;
        }
}
<?php
require_once '../core/Database.php';

class AktivitasController {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function index() {
        $query = "SELECT * FROM kebiasaan";
        $result = $this->db->conn->query($query);

        if (!$result) {
        die("Query error: " . $this->db->conn->error);
    }

        require '../app/views/siswa/tambah_aktivitas.php';
    }

    public function simpan() {
        session_start();

        $user_id = $_SESSION['user']['id'];
        $kebiasaan_id = $_POST['kebiasaan_id'];

        $query = "INSERT INTO aktivitas (user_id, kebiasaan_id, tanggal)
                  VALUES ('$user_id', '$kebiasaan_id', CURDATE())";

        $this->db->conn->query($query);

        header("Location: index.php?url=dashboard");
    }

    public function riwayat() {
    $query = "
        SELECT r.id, k.nama_kebiasaan, r.tanggal
        FROM aktivitas r
        JOIN kebiasaan k ON r.kebiasaan_id = k.id
        ORDER BY r.tanggal DESC
    ";

    $result = $this->db->conn->query($query);

    if (!$result) {
        die("Query error: " . $this->db->conn->error);
    }

    $riwayat = [];

    while ($row = $result->fetch_assoc()) {
        $riwayat[] = $row;
    }

    require '../app/views/siswa/riwayat.php';
}

public function grafik() {

    $query = "
        SELECT DATE(tanggal) as tgl, COUNT(*) as total
        FROM aktivitas
        GROUP BY DATE(tanggal)
        ORDER BY tgl ASC
    ";

    $result = $this->db->conn->query($query);

     if (!$result) {
        die("Query error: " . $this->db->conn->error);
    }
    
    $label = [];
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $label[] = $row['tgl'];
        $data[] = $row['total'];
    }

    require '../app/views/siswa/grafik.php';
}


}
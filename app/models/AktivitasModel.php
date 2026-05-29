<?php
require_once '../core/Database.php';

class AktivitasModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllKebiasaan() {
        $query = "SELECT * FROM kebiasaan";
        $result = $this->db->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function tambahKebiasaan($nama) {
        $query = "INSERT INTO kebiasaan (nama) VALUES (?)";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("s", $nama);
        return $stmt->execute();
    }

    public function hapusKebiasaan($id) {
        $query = "DELETE FROM kebiasaan WHERE id=?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getLaporan() {
        $query = "
            SELECT u.nama, k.nama_kebiasaan, a.tanggal
            FROM aktivitas a
            JOIN users u ON a.user_id = u.id
            JOIN kebiasaan k ON a.kebiasaan_id = k.id
            ORDER BY a.tanggal DESC
        ";

        $result = $this->db->conn->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getGrafik() {
        $query = "
            SELECT DATE(tanggal) as tgl, COUNT(*) as total
            FROM aktivitas
            GROUP BY DATE(tanggal)
            ORDER BY tgl ASC
        ";

        $result = $this->db->conn->query($query);

        $label = [];
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $label[] = $row['tgl'];
            $data[] = $row['total'];
        }

        return [
            'label' => $label,
            'data' => $data
        ];
    }

}
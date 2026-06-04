<?php
require_once '../core/Database.php';

class AktivitasModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

   public function getAllKebiasaan()
{
    $query = "SELECT * FROM kebiasaan";
    $result = $this->db->conn->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
}

    public function tambahKebiasaan($nama, $poin) {

    $query = "INSERT INTO kebiasaan 
              (nama_kebiasaan, poin) 
              VALUES (?, ?)";

    $stmt = $this->db->conn->prepare($query);

    $stmt->bind_param("si", $nama, $poin);

    return $stmt->execute();
}

    public function tambahAktivitas($user_id, $kebiasaan_id)
    {
        $query = "INSERT INTO aktivitas (user_id, kebiasaan_id, tanggal)
              VALUES (?, ?, NOW())";

        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("ii", $user_id, $kebiasaan_id);

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

    public function getRiwayat($user_id)
    {
        $conn = new mysqli("localhost", "root", "", "ecohabit");

        $query = "SELECT a.tanggal, k.nama_kebiasaan
                FROM aktivitas a
                JOIN kebiasaan k ON a.kebiasaan_id = k.id
                WHERE a.user_id = '$user_id'
                ORDER BY a.tanggal DESC";

        $result = $conn->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }   

    public function getTotalPoin($user_id)
{
    $query = "
        SELECT SUM(k.poin) AS total_poin
        FROM aktivitas a
        JOIN kebiasaan k ON a.kebiasaan_id = k.id
        WHERE a.user_id = $user_id
    ";

    $result = $this->db->conn->query($query);

    $data = $result->fetch_assoc();

    return $data['total_poin'] ?? 0;
}

    public function sudahPernahHariIni($user_id, $kebiasaan_id)
        {
            $query = "SELECT * FROM aktivitas 
                WHERE user_id = ? 
                AND kebiasaan_id = ? 
                AND DATE(tanggal) = CURDATE()";

            $stmt = $this->db->conn->prepare($query);
            $stmt->bind_param("ii", $user_id, $kebiasaan_id);
            $stmt->execute();

            $result = $stmt->get_result();

            return $result->num_rows > 0;
        }

}
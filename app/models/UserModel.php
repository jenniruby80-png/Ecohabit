<?php
require_once '../core/Database.php';

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($data) {
        $query = "INSERT INTO users (nama, email, password, role)
                  VALUES (?, ?, ?, ?)";

        $stmt = $this->db->conn->prepare($query);

        $stmt->bind_param(
            "ssss",
            $data['nama'],
            $data['email'],
            $data['password'],
            $data['role']
        );

        return $stmt->execute();
    }

    public function getByEmail($email) {
        $query = "SELECT * FROM users WHERE email=?";

        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users";

        $result = $this->db->conn->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id=?";

        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function getById($id) {
        $query = "SELECT * FROM users WHERE id=?";

        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUser($data) {
        $query = "UPDATE users 
                  SET nama=?, email=?, role=? 
                  WHERE id=?";

        $stmt = $this->db->conn->prepare($query);

        $stmt->bind_param(
            "sssi",
            $data['nama'],
            $data['email'],
            $data['role'],
            $data['id']
        );

        return $stmt->execute();
    }
}
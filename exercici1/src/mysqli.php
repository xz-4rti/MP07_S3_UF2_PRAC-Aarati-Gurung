<?php
require_once __DIR__ . '/../config/config.php';

class UsuarisMySQLi {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if ($this->conn->connect_error) {
            die("Error de connexió: " . $this->conn->connect_error);
        }
        
    }

    // Consulta simple
    public function getUsuarisMajors25Simple() {
        $sql = "SELECT * FROM usuaris WHERE edat > 25";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Consulta preparada
    public function getUsuarisMajors25Preparada() {
        $sql = "SELECT * FROM usuaris WHERE edat > ?";
        $stmt = $this->conn->prepare($sql);
        $edat = 25;
        $stmt->bind_param("i", $edat);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
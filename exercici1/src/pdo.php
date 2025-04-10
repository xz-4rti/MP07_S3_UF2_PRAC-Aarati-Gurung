<?php
require_once __DIR__ . '/../config/config.php';

class UsuarisPDO {
    private $pdo;

    public function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";";
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de connexió: " . $e->getMessage());
        }
    }

    // Consulta simple
    public function getUsuarisMajors25Simple() {
        $sql = "SELECT * FROM usuaris WHERE edat > 25";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Consulta preparada
    public function getUsuarisMajors25Preparada() {
        $sql = "SELECT * FROM usuaris WHERE edat > :edat";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['edat' => 25]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
<?php

// Conexion i consultas con PDO
// Requiere el archivo de configuración
require_once __DIR__ . '/../config/config.php';

try {
    // Conexión a la base de datos con PDO
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta simple
    $query = "SELECT * FROM usuaris WHERE edat > 25";
    $stmt = $pdo->query($query);
    $usersSimple = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Consulta preparada
    $query = "SELECT * FROM usuaris WHERE edat > :edat";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['edat' => 25]);
    $usersPrepared = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna los resultados de las consultas
    return ['simple' => $usersSimple, 'prepared' => $usersPrepared];

} catch (PDOException $e) {
    // Manejo de errores de conexión
    die("Error de conexión: " . $e->getMessage());
}
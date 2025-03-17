<?php
// src/pdo.php

// Importa la configuración de la base de datos
require_once __DIR__ . '/../config/config.php';

try {
    // Conexión a la base de datos utilizando PDO
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

    // Configura PDO para lanzar excepciones en caso de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define la consulta SQL con INNER JOIN para obtener datos de dos tablas relacionadas
    $query = "
        SELECT usuaris.nom, comandes.producte, comandes.preu
        FROM usuaris
        INNER JOIN comandes ON usuaris.id = comandes.usuari_id
    ";

    // Ejecuta la consulta y obtiene el resultado
    $stmt = $pdo->query($query);

    // Obtiene todos los resultados como un array asociativo
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna los resultados obtenidos de la consulta
    return $results;
} catch (PDOException $e) {
    // Si hay un error en la conexión o consulta, muestra el mensaje de error y detiene la ejecución
    die("Error de conexión: " . $e->getMessage());
}

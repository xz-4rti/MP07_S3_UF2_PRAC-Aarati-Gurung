<?php
// src/mysqli.php

// Importa la configuración de la base de datos
require_once __DIR__ . '/../config/config.php';

// Crea una conexión a la base de datos utilizando MySQLi
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verifica si hay un error en la conexión
if ($mysqli->connect_error) {
    // Si hay un error, termina la ejecución y muestra el mensaje de error
    die("Error de conexión: " . $mysqli->connect_error);
}

// Define la consulta SQL con INNER JOIN para obtener datos de dos tablas relacionadas
$query = "
    SELECT usuaris.nom, comandes.producte, comandes.preu
    FROM usuaris
    INNER JOIN comandes ON usuaris.id = comandes.usuari_id
";

// Ejecuta la consulta SQL en la base de datos
$result = $mysqli->query($query);

// Verifica si la consulta se ejecutó correctamente
if ($result) {
    // Si la consulta fue exitosa, obtiene todos los resultados como un array asociativo
    $results = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Si hay un error en la consulta, termina la ejecución y muestra el mensaje de error
    die("Error en la consulta: " . $mysqli->error);
}

// Cierra la conexión con la base de datos
$mysqli->close();

// Retorna los resultados obtenidos de la consulta
return $results;

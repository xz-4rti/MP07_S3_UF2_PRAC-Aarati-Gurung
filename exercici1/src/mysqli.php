<?php

// Conexion i consultas con PDO

require_once __DIR__ . '/../config/config.php';

// Conexion a la base de datos con mysqli
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar la connection
if ($mysqli->connect_error) {
    die("Error de connexió: " . $mysqli->connect_error);
}

// Consultas simple
$query = "SELECT * FROM usuaris WHERE edat > 25"; // Consulta para seleccionar todos los usuarios con edad mayor a 25
$result = $mysqli->query($query); // Ejecutar la consulta
$usersSimple = $result->fetch_all(MYSQLI_ASSOC); // Obtener todos los resultados como un array asociativo

// Consultas preparada
$query = "SELECT * FROM usuaris WHERE edat > ?"; // Consulta preparada para seleccionar usuarios con edad mayor a un valor dado
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $edat); // Vincular el parámetro de edad a la consulta
$edat = 25; // Asignar el valor 25 a la variable de edad
$stmt->execute(); // Ejecutar la consulta preparada
$result = $stmt->get_result(); // Obtener el resultado de la consulta
$usersPrepared = $result->fetch_all(MYSQLI_ASSOC); // Obtener todos los resultados como un array asociativo

$mysqli->close(); // Cerrar la conexión a la base de datos

return ['simple' => $usersSimple, 'prepared' => $usersPrepared]; // Devolver los resultados de ambas consultas

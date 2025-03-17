<?php

// Importa los archivos que contienen las consultas con PDO y MySQLi
require_once __DIR__ . '/../src/pdo.php';
require_once __DIR__ . '/../src/mysqli.php';

// Ejecuta e incluye los resultados obtenidos desde pdo.php
$pdoResults = include __DIR__ . '/../src/pdo.php';

// Ejecuta e incluye los resultados obtenidos desde mysqli.php
$mysqliResults = include __DIR__ . '/../src/mysqli.php';

?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Exercici 1 - Consultes bàsiques amb PDO i MySQLi</title>
</head>

<body>
    <!-- Sección de resultados obtenidos con PDO -->
    <h1>Resultats amb PDO</h1>

    <!-- Muestra los resultados de una consulta simple con PDO -->
    <h2>Consulta simple</h2>
    <pre><?php print_r($pdoResults['simple']); ?></pre>

    <!-- Muestra los resultados de una consulta preparada con PDO -->
    <h2>Consulta preparada</h2>
    <pre><?php print_r($pdoResults['prepared']); ?></pre>

    <!-- Sección de resultados obtenidos con MySQLi -->
    <h1>Resultats amb MySQLi</h1>

    <!-- Muestra los resultados de una consulta simple con MySQLi -->
    <h2>Consulta simple</h2>
    <pre><?php print_r($mysqliResults['simple']); ?></pre>

    <!-- Muestra los resultados de una consulta preparada con MySQLi -->
    <h2>Consulta preparada</h2>
    <pre><?php print_r($mysqliResults['prepared']); ?></pre>
</body>

</html>
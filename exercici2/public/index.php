<?php
// public/index.php

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
    <title>Exercici 2 - Consultes avançades amb PDO i MySQLi</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <!-- Sección de resultados obtenidos con PDO -->
    <h1>Resultats amb PDO</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Producte</th>
                <th>Preu</th>
            </tr>
        </thead>
        <tbody>
            <!-- Bucle para recorrer los resultados obtenidos con PDO y mostrarlos en la tabla -->
            <?php foreach ($pdoResults as $row): ?>
                <tr>
                    <td><?php echo $row['nom']; ?></td> <!-- Muestra el nombre del usuario -->
                    <td><?php echo $row['producte']; ?></td> <!-- Muestra el producto -->
                    <td><?php echo $row['preu']; ?> €</td> <!-- Muestra el precio con el símbolo de euro -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Sección de resultados obtenidos con MySQLi -->
    <h1>Resultats amb MySQLi</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Producte</th>
                <th>Preu</th>
            </tr>
        </thead>
        <tbody>
            <!-- Bucle para recorrer los resultados obtenidos con MySQLi y mostrarlos en la tabla -->
            <?php foreach ($mysqliResults as $row): ?>
                <tr>
                    <td><?php echo $row['nom']; ?></td> <!-- Muestra el nombre del usuario -->
                    <td><?php echo $row['producte']; ?></td> <!-- Muestra el producto -->
                    <td><?php echo $row['preu']; ?> €</td> <!-- Muestra el precio con el símbolo de euro -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
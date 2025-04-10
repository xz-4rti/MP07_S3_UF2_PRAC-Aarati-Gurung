<?php
require_once __DIR__ . '/../src/pdo.php';
require_once __DIR__ . '/../src/mysqli.php';

$pdo = new UsuarisPDO();
$mysqli = new UsuarisMySQLi();

$usuarisPDOSimple = $pdo->getUsuarisMajors25Simple();
$usuarisPDOPreparada = $pdo->getUsuarisMajors25Preparada();
$usuarisMySQLiSimple = $mysqli->getUsuarisMajors25Simple();
$usuarisMySQLiPreparada = $mysqli->getUsuarisMajors25Preparada();
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Usuaris majors de 25 anys</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            margin-top: 30px;
            color: #333;
        }
    </style>
</head>

<body>
    <h1>Usuaris majors de 25 anys</h1>

    <h2>PDO - Consulta Simple</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Edat</th>
        </tr>
        <?php foreach ($usuarisPDOSimple as $usuari): ?>
            <tr>
                <td><?= htmlspecialchars($usuari['id']) ?></td>
                <td><?= htmlspecialchars($usuari['nom']) ?></td>
                <td><?= htmlspecialchars($usuari['email']) ?></td>
                <td><?= htmlspecialchars($usuari['edat']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>PDO - Consulta Preparada</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Edat</th>
        </tr>
        <?php foreach ($usuarisPDOPreparada as $usuari): ?>
            <tr>
                <td><?= htmlspecialchars($usuari['id']) ?></td>
                <td><?= htmlspecialchars($usuari['nom']) ?></td>
                <td><?= htmlspecialchars($usuari['email']) ?></td>
                <td><?= htmlspecialchars($usuari['edat']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>MySQLi - Consulta Simple</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Edat</th>
        </tr>
        <?php foreach ($usuarisMySQLiSimple as $usuari): ?>
            <tr>
                <td><?= htmlspecialchars($usuari['id']) ?></td>
                <td><?= htmlspecialchars($usuari['nom']) ?></td>
                <td><?= htmlspecialchars($usuari['email']) ?></td>
                <td><?= htmlspecialchars($usuari['edat']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>MySQLi - Consulta Preparada</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Edat</th>
        </tr>
        <?php foreach ($usuarisMySQLiPreparada as $usuari): ?>
            <tr>
                <td><?= htmlspecialchars($usuari['id']) ?></td>
                <td><?= htmlspecialchars($usuari['nom']) ?></td>
                <td><?= htmlspecialchars($usuari['email']) ?></td>
                <td><?= htmlspecialchars($usuari['edat']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
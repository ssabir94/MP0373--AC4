<?php
$pdo = new PDO("mysql:host=localhost;dbname=world", "root", "");

$sql = "
    SELECT country.Name AS pais, city.Name AS capital
    FROM country
    JOIN city ON country.Capital = city.ID
    ORDER BY country.Name
";

$result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Països i capitals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 40px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 60%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2>CRUD WORLD</h2>
    <table>
        <tr>
            <th>País</th>
            <th>Capital</th>
        </tr>
        <?php foreach ($result as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['pais']) ?></td>
            <td><?= htmlspecialchars($row['capital']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

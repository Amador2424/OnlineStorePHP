<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            text-align: left;
            padding: 12px;
        }
        th {
            background-color: #008CBA;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            color: #008CBA;
            text-decoration: none;
        }
        a:hover {
            color: #005580;
        }
        .btn {
            display: inline-block;
            background-color: #008CBA;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #005580;
        }
    </style>
</head>
<body>
    <h1>Liste des voitures</h1>
    <a href="add.php" class="btn">Ajouter une voiture</a>
    <?php
    require_once '../Classes/connexion.php';
    require_once 'navbar.php';

    $connexion = new Connexion();
    $conn = $connexion->getConn();

    $query = "SELECT * FROM voiture";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Modèle</th><th>Prix</th><th>Photo</th><th>Actions</th></tr>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["model"] . '</td>';
            echo '<td>' . $row["prix"] . ' $</td>';
            echo '<td><img src="'.$row['pict'].'" alt="" style="max-width: 100px;"></td>';
            echo '<td><a href="modifier_voiture.php?id=' . $row["id"] . '">Modifier</a> | <a href="supprimer_voiture.php?id=' . $row["id"] . '">Supprimer</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Aucune voiture trouvée.";
    }
    $conn->close();
    ?>
</body>
</html>

<?php
session_start();

// Inclure la classe Voiture
require_once '../Classes/voiture.php';


// Instancier un objet Voiture
$voiture = new voiture();

// Vérifier si un formulaire de modification de quantité a été soumis
if (isset($_POST['modifierQuantite'])) {
    $id = $_POST['id'];
    $quantite = $_POST['quantite'];
    $voiture->modifierQuantitePanier($id, $quantite);
}

// Vérifier si un formulaire de suppression a été soumis
if (isset($_POST['supprimer'])) {
    $id = $_POST['id'];
    $voiture->supprimerDuPanier($id);
}

// Vérifier si un formulaire d'ajout a été soumis
if (isset($_POST['ajouterAuPanier'])) {
    $id = $_POST['id'];
    $quantite = $_POST['quantite'];
    $voiture->ajouterAuPanier($id, $quantite);
}

// Récupérer le contenu du panier
$panier = $voiture->getPanier();

// Afficher le contenu du panier
if (count($panier) > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Modèle</th>';
    echo '<th>Prix</th>';
    echo '<th>Description</th>';
    echo '<th>Quantité</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($panier as $voiture) {
        echo '<tr>';
        echo '<td>' . $voiture['model'] . '</td>';
        echo '<td>' . $voiture['prix'] . ' €</td>';
        echo '<td>' . $voiture['descript'] . '</td>';
        echo '<td>';
        echo '<form method="post">';
        echo '<input type="hidden" name="id" value="' . $voiture['id'] . '">';
        echo '<input type="number" name="quantite" value="' . $voiture['quantite'] . '">';
        echo '<input type="submit" name="modifierQuantite" value="Modifier">';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form method="post">';
        echo '<input type="hidden" name="id" value="' . $voiture['id'] . '">';
        echo '<input type="submit" name="supprimer" value="Supprimer">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo 'Le panier est vide.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require_once 'navbar.php';
?>
</head>
<body>
    
</body>
</html>

<?php
require_once '../Classes/Voiture.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $connexion = new Connexion();
    $conn = $connexion->getConn();

    // Supprimer la voiture avec l'ID spécifié
    $stmt = $conn->prepare("DELETE FROM voiture WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    header("Location: listeVoitures.php"); // Rediriger vers la liste des voitures
    exit();
} else {
    echo "ID de la voiture non spécifié.";
}
?>

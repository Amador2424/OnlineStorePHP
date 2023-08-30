<?php
require_once '../Classes/Voiture.php';
require_once 'navbar.php';

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Créer une instance de la classe Voiture
    $voiture = new Voiture();

    // Appeler la fonction ajouterVoiture pour ajouter la voiture à la base de données
    $result = $voiture->ajouterVoiture();

    // Vérifier si l'ajout a réussi
    if ($result) {
        // Rediriger vers la page des voitures avec un message de succès
        header("Location: listeVoiture.php?success=La voiture a été ajoutée avec succès.");
        exit;
    } else {
        // Afficher un message d'erreur
        $error = "Une erreur s'est produite lors de l'ajout de la voiture.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter une voiture</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<h2>Ajouter une nouvelle voiture</h2>
	<form  method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="image">Image:</label>
			<input type="file" class="form-control-file" id="image" name="photo" required>
		</div>
		<div class="form-group">
			<label for="model">Modèle:</label>
			<input type="text" class="form-control" id="model" placeholder="Entrez le modèle" name="model" required>
		</div>
		<div class="form-group">
			<label for="prix">Prix:</label>
			<input type="number" class="form-control" id="prix" placeholder="Entrez le prix" name="prix" required>
		</div>
        <div class="form-group">
			<label for="prix">Description:</label>
			<input type="text" class="form-control" id="prix" placeholder="Entrez la description" name="description" required>
		</div>
        <div class="form-group">
			<label for="quantite">Quantité:</label>
			<input type="number" name="quantite" min="1" value="1">
		</div>
        <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
	</form>
</div>

</body>
</html>

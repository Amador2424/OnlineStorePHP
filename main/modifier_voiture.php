<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une voiture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        form {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #008CBA;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #005580;
        }
    </style>
    	    <?php
    require_once 'navbar.php';
?>

</head>
<body>
    <h1>Modifier une voiture</h1>
    <?php
    require_once '../Classes/Voiture.php';

    // Vérifier si le formulaire a été soumis
    if (isset($_POST['submit'])) {
        echo"yyyyyyyyyy";
        // Créer une instance de la classe Voiture
        $voiture = new Voiture();
    
        // Appeler la fonction ajouterVoiture pour ajouter la voiture à la base de données
        $result = $voiture->UpCar($_GET['id']);
    
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
    

            echo '<form method="post" enctype="multipart/form-data">';
            echo '<label for="description">Modele :</label>';
            echo '<input type="text" name="model" value="">';
            echo '<label for="description">Description :</label>';
            echo '<input type="text" name="description" value="">';
            echo '<label for="prix">Prix :</label>';
            echo '<input type="number" name="prix" value="">';
            echo '<label for="photo">Photo :</label>';
            echo '<input type="file" name="photo">';
            echo '<input type="number" name="quantite" min="1" value="1">';
            echo '<input type="submit" name="submit" value="Modifier">';
            echo '</form>';
        
    ?>
</body>

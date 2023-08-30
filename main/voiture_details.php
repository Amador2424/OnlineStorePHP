<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Détails de la voiture</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
		body {
			background-color: #f5f5f5;
		}
		h1 {
			margin-top: 40px;
			font-size: 36px;
			font-weight: bold;
			color: #1a1a1a;
			text-align: center;
			text-transform: uppercase;
		}
		.img-fluid {
			display: block;
			margin: auto;
			max-width: 80%;
			height: auto;
			margin-top: 30px;
			margin-bottom: 30px;
		}
		p {
			font-size: 24px;
			color: #1a1a1a;
			font-weight: bold;
			text-align: center;
			margin-bottom: 30px;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 30px;
		}
		label {
			font-size: 20px;
			color: #1a1a1a;
			margin-bottom: 10px;
		}
		input[type="number"] {
			padding: 5px;
			font-size: 18px;
			color: #1a1a1a;
			border: 2px solid #cccccc;
			border-radius: 5px;
			width: 80px;
			margin-bottom: 10px;
			text-align: center;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			font-size: 18px;
			cursor: pointer;
			margin-bottom: 30px;
			transition: background-color 0.2s;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		
	</style>
	
		    <?php
    require_once 'navbar.php';
?>

</head>
<body>
	<div class="container">
		<?php
			require_once '../Classes/Voiture.php';
			session_start();
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$voiture = new Voiture();
				$details = $voiture->getVoitureById($id);
				if ($details) {
					echo '<h1>'.$details['model'].'</h1>';
					echo '<img src="'.$details['pict'].'" class="img-fluid">';
					echo '<p>Prix : '.$details['prix'].' €</p>';
					echo '<p>Description : '.$details['descript'].' </p>';
					echo '<form method="post" action="">';
					echo '<label for="quantite">Quantité : </label>';
					echo '<input type="number" name="quantite" min="1" value="1" max="'.$details['quantite'].'">';
					echo "<a class='btn btn-primary btn-block' role='button' name='ajout_panier' href='panier_Controller.php?action=add&id=" . $details['id'] . "'>Ajouter au panier</a>";
					echo '</form>';
				} else {

					echo '<p>Aucune voiture trouvée pour cet ID.</p>';
				}
			} else {
				echo '<p>ID de la voiture non spécifié.</p>';
			}
		

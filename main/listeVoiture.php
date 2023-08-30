<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Liste des voitures</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style type="text/css">
		.card {
			margin-bottom: 20px;
			border-radius: 10px;
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
		}

		.card-img-top {
			border-radius: 10px 10px 0 0;
		}

		.card-body {
			padding: 20px;
		}

		.card-title {
			font-size: 1.5rem;
			margin-bottom: 10px;
		}

		.card-text {
			font-size: 1.2rem;
			color: #666;
			margin-bottom: 20px;
		}

		.btn-primary {
			background-color: #007bff;
			border-color: #007bff;
			border-radius: 20px;
			padding: 10px 20px;
			font-size: 1.2rem;
			font-weight: 600;
			transition: all 0.3s ease;
		}

		.btn-primary:hover {
			background-color: #0069d9;
			border-color: #0062cc;
			transform: translateY(-2px);
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
		}
	</style>
	    <?php
    require_once 'navbar.php';
?>

</head>
<body>
	<div class="container">
		<h1 class="text-center my-5">Liste des voitures</h1>
		<div class="row">
			<?php

				require_once '../Classes/Voiture.php';
				$voiture = new Voiture();
				$voitures = $voiture->getAllVoitures();

				if ($voitures) {
					foreach ($voitures as $v) {
						echo '<div class="col-md-4">';
						echo '<div class="card">';
						echo '<img src="'.$v['pict'].'" class="card-img-top">';
						echo '<div class="card-body">';
						echo '<h5 class="card-title">'.$v['model'].'</h5>';
						echo '<p class="card-text">'.$v['prix'].' €</p>';
						echo "<a class='btn btn-primary btn-block' href='voiture_details.php?id=" . $v['id'] . "'>Voir les détails</a>";
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
				} else {
					echo '<p class="text-center my-5">Aucune voiture trouvée.</p>';
				}
                
			?>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

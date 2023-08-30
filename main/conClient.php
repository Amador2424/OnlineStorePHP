<!DOCTYPE html>
<html>
<head>
	<title>Authentification</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h2>Authentification</h2>
		<style>
        /* Style pour les formulaires */
        form {
            margin: 0 auto;
            width: 50%;
            text-align: center;
        }
        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }
        button[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button[type=submit]:hover {
            background-color: #45a049;
        }
        .container {
            padding: 16px;
        }
        /* Style pour les messages d'erreur */
        .error {
            color: red;
            font-weight: bold;
            margin: 8px 0;
        }
    </style>

		<?php
        require_once '../Classes/client.php';
        require_once 'navbar.php';

			$client = new Client();

			if (isset($_POST['submit'])) {
				if ($client->authentification()) {
					header("Location: listeVoiture.php");
					exit();
				} else {
					echo '<div class="error">Nom d\'utilisateur ou mot de passe incorrect</div>';
				}
			}
		?>
		<form method="POST" action="">
			<label for="email">Email :</label>
			<input type="text" id="email" name="email" required>

			<label for="motdepass">Mot de passe :</label>
			<input type="password" id="motdepass" name="motdepass" required>

			<input type="submit" name="submit" value="Se connecter">
		</form>
		<p>Pas encore inscrit ? <a href="inscription.php">Cliquez ici pour vous inscrire</a>.</p>
	</div>
</body>
</html>

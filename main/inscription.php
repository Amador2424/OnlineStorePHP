-----<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
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
</head>
<body>
    <h2>Inscription</h2>
    <?php
        require_once '../Classes/client.php';
        require_once 'navbar.php';

        // Instanciation de la classe Client
        $client = new Client();

        // Si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Appel de la fonction d'inscription
            $resultat = $client->inscription();

            // Si l'inscription a réussi, redirection vers la page de connexion
            if ($resultat) {
                header("Location: conClient.php");
            } else {
                echo '<div class="error">Erreur d\'inscription. Veuillez réessayer.</div>';
            }
        }
    ?>
    <form method="POST">
        <div class="container">
            <label for="nom_complet"><b>Nom complet</b></label>
            <input type="text" placeholder="Entrez votre nom complet" name="nom_complet" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Entrez votre email" name="email" required>

            <label for="motdepass"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrez votre mot de passe" name="motdepass" required>

            <button type="submit">S'inscrire</button>
        </div>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Authentification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        form {
            border: 1px solid #ccc;
            background-color: #fff;
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #008CBA;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #005580;
        }
    </style>
</head>
<body>
    <?php
    require_once '../Classes/Admin.class.php';
    require_once 'navbar.php';

    if(isset($_POST['submit'])){
        $admin = new Admin();
        $admin->Verifier($_POST['utilisateur'], $_POST['mdp']);
    }
    ?>
    <form method="POST" action="">
        <h1>Authentification</h1>
        <label for="utilisateur">Nom d'utilisateur :</label>
        <input type="text" id="utilisateur" name="utilisateur" required>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required>
        <input type="submit" name="submit" value="Se connecter">
    </form>
    </body>
</html>    
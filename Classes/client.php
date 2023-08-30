<?php
require_once 'Connexion.php';

class Client {
    private $conn;

    public function __construct() {
        $connexion = new Connexion();
        $this->conn = $connexion->getConn();
    }

    // Fonction pour inscrire un nouveau client
    public function inscription() {
        $nom_complet = $_POST['nom_complet'];
        $motdepass = $_POST['motdepass'];
        $email = $_POST['email'];

        $query = "INSERT INTO client (nom_complet, mdp, email) VALUES ('$nom_complet', '$motdepass', '$email')";
        $result = $this->conn->query($query);

        if (!$result) {
            die("Erreur d'inscription : " . $this->conn->error);
        }

        return true;
    }

    // Fonction pour authentifier un client
    public function authentification() {
        $email = $_POST['email'];
        $motdepass = $_POST['motdepass'];

        $query = "SELECT * FROM client WHERE email='$email' AND mdp='$motdepass'";
        $result = $this->conn->query($query);

        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
}

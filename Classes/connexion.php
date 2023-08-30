<?php
class Connexion {
  public $connexion;
private $host ="localhost";
private $user ="root";
private $password = "";
private $database = "locationroyalcar";
  public function __construct( ) {
    $this->connexion = mysqli_connect($this->host, $this->user, $this->password, $this->database);
    if (!$this->connexion) {
      die("Erreur de connexion à la base de données : " . mysqli_connect_error());
    }
  }

  public function getConn() {
    if ($this-> connexion == null) {
        new Connexion();
    }
    return $this-> connexion;
  }

}

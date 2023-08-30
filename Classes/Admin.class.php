<?php
class Admin{
    private $utilisateur = "AMADOR";
    private $mdp = "TRS12345";

    public function __construct(){
        $this->utilisateur;
        $this->mdp;
    }

    public function Verifier($util, $mdpa){
        if($this->utilisateur == $util && $this->mdp == $mdpa){
            header("Location: admin.php");
            exit;
        }else{
            echo '<div style="background-color: #f44336; color: white; padding: 10px;">Nom d\'utilisateur ou mot de passe incorrect</div>';
        }        
    }
}
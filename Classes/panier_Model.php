<?php
require_once ('connexion.php');
session_start();
class panier{
    public function ajout_panier($id_produit)
    {
        $connexion=new Connexion();
        $con=$connexion->getConn();
        $new_query = "SELECT * FROM voiture WHERE id = '$id_produit'";
        $result = $con->query($new_query);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function creation_Panier()
    {
       
          $_SESSION['panier']=array();
          $_SESSION['panier']['modele'] = array();
          $_SESSION['panier']['id'] = array();
          $_SESSION['panier']['quantite'] = array();
          $_SESSION['panier']['prix'] = array();
       
    }

 
     public function ajouterProduitDansPanier($modele,$id_produit,$quantite,$prix)
    {
	    $position_produit = array_search($id_produit,  $_SESSION['panier']['id']); 
        echo 'toto';
        if ($position_produit !== false)
        {
            echo 'titi';
            $_SESSION['panier']['quantite'][$position_produit] += $quantite ;
        }
        else 
        {
            $_SESSION['panier']['modele'][] = $modele;
            $_SESSION['panier']['id'][] = $id_produit;
            $_SESSION['panier']['quantite'][] = $quantite;
            $_SESSION['panier']['prix'][] = $prix;
            echo 'toto2';
        }
    }



    public function retirerproduitDuPanier($id_produit_a_supprimer)
    {
        $position_produit = array_search($id_produit_a_supprimer,  $_SESSION['panier']['id']);
        if ($position_produit !== false)
        {
            array_splice($_SESSION['panier']['modele'], $position_produit, 1);
            array_splice($_SESSION['panier']['id'], $position_produit, 1);
            array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
            array_splice($_SESSION['panier']['prix'], $position_produit, 1);
        }
    }

    public function viderpanier()
    {
        unset($_SESSION['panier']);

    }

    public function montantTotal()
    {
        $total=0;
        for($i = 0; $i < count($_SESSION['panier']['id']); $i++) 
        {
            $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
        }
        return round($total,2);
    }

    public function valider_paiement()
    {
        $connexion=new Connexion();
        $con=$connexion->getConn();
        for($i=0 ;$i < count($_SESSION['panier']['id']) ; $i++) 
	    {
            $x=$_SESSION['panier']['quantite'][$i];
            $req = "SELECT * FROM voiture WHERE id=" . $_SESSION['panier']['id'][$i];
            $resultat=$con->query($req);
            $row = $resultat->fetch_assoc();
            $y=$row['quantite'];
            $req="UPDATE voiture set   quantite=$y-$x WHERE id=" . $_SESSION['panier']['id'][$i];
            $res=$con->query($req);
        }

    }


}
?>
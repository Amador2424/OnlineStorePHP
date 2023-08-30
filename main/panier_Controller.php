<?php
require_once('../Classes/panier_Model.php') ;
$panier=new panier();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $details=$panier->ajout_panier($id);
    if (!isset($_SESSION['panier']))
	{$panier->creation_Panier();}
    $panier->ajouterProduitDansPanier($details['model'],$details['id'],$details['quantite'],$details['prix']);
    header('Location:listeVoiture.php');
}

//retirer un produit du panier
if(isset($_GET['action']) && $_GET['action'] == "retirer")
{
	$panier->retirerproduitDuPanier($_GET['id_produit']);
}

//vider le panier
if((isset($_GET['action']) && $_GET['action'] == "vider"))
{
	$panier->viderpanier();
}
//MAJ de stock dans la base de données
if(isset($_POST['payer']))
{
    $produit=$panier->valider_paiement();
    $panier->viderpanier();
}
?>
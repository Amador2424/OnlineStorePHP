
<?php
include 'panier_Controller.php';
?>
<table border='1' style='border-collapse: collapse' cellpadding='7'>
<tr><td colspan='5'><center><b>Panier</td></tr>
<tr><th>Titre</th><th>Produit</th><th>Quantité</th><th>Prix Unitaire</th><th>Action</th></tr>
<?php
if(empty($_SESSION['panier']['id'])) // panier vide
{
	echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
    echo "<tr><td colspan='5'><a href='listeVoiture.php'>continuer vos achats</a></td></tr>";
}
else
{
	for($i = 0; $i < count($_SESSION['panier']['id']); $i++) 
	
	{
		echo "<tr>";
		echo "<td>" . $_SESSION['panier']['modele'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['id'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['quantite'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['prix'][$i] . "</td>";
        echo '<td><a href="?action=retirer&id_produit=' . $_SESSION['panier']['id'][$i] .'">retirer</a></td>';
		echo "</tr>";
	}

	echo "<tr><th colspan='3'>Total</th><td colspan='2'>" .$panier->montantTotal() . " dollars</td></tr>";
    echo '<form method="post" action="">';
		echo '<tr><td colspan="5"><input type="submit" name="payer" value="Valider  le paiement" /></td></tr>';
		echo '</form>';	

        echo "<tr><td colspan='5'><a href='?action=vider'>Vider mon panier</a></td></tr>";
	echo "<tr><td colspan='5'><a href='listeVoiture.php'>continuer vos achats</a></td></tr>";

echo "</table><br />";
echo "<i>Réglement par CHEQUE uniquement a l'adresse suivante : 3030 rue Hochlaga H3S 1U2 Montreal</i><br />";
}
?>
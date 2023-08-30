
    <?php
require'connexion.php';

class Voiture {
    private $conn;

    public function __construct() {
        $connexion = new Connexion();
        $this->conn = $connexion->getConn();
    }

    // Fonction pour récupérer toutes les voitures
    public function getAllVoitures() {
        $query = "SELECT * FROM voiture";
        $result = $this->conn->query($query);
        $voitures = array();

        while ($row = $result->fetch_assoc()) {
            $voitures[] = $row;
        }

        return $voitures;
    }

    public function getVoitureById($id) {
        $query = "SELECT * FROM voiture WHERE id=$id";
        $result = $this->conn->query($query);
    
        if (!$result) {
            die("Erreur de récupération de voiture : " . $this->conn->error);
        }
    
        return $result->fetch_assoc();
    }

    public function UpCar($id){

        $photo_bdd = "";
        $model = $_POST['model'];
        $prix = $_POST['prix'];
        $des = $_POST['description'];
        $qut= $_POST['quantite'];
        if(!empty($_FILES['photo']['name']))
        {   
            $nom_photo = $_FILES['photo']['name'];
            
            $photo_bdd = "/RoyalCar/photo/".$nom_photo;    
        
            $photo_dossier="C:/xampp/htdocs/RoyalCar/photo/".$nom_photo;
            copy($_FILES['photo']['tmp_name'],$photo_dossier);
        }
        
    
        $req="UPDATE voiture set pict ='$photo_bdd',descript='$des',
        prix =  '$prix', model='$model', quantite='$qut' where id =$id";
         $result = $this->conn->query($req);
    
        if (!$result) {
            die("Erreur d'ajout de voiture : " . $this->conn->error);
        }
    
        move_uploaded_file($_FILES['photo']['tmp_name'], "C:/xampp/htdocs/RoyalCar/photo/$nom_photo");
    
        return true;
    
    }
    
    // Fonction pour ajouter une voiture
    public function ajouterVoiture() {
        $photo_bdd = "";
        $model = $_POST['model'];
        $prix = $_POST['prix'];
        $des = $_POST['description'];
        $qut= $_POST['quantite'];
        if(!empty($_FILES['photo']['name']))
        {   
            $nom_photo = $_FILES['photo']['name'];
            
            $photo_bdd = "/RoyalCar/photo/".$nom_photo;	
        
            $photo_dossier="C:/xampp/htdocs/RoyalCar/photo/".$nom_photo;
            copy($_FILES['photo']['tmp_name'],$photo_dossier);
        }
        

        $query = "INSERT INTO voiture (pict, model, prix,descript,quantite) VALUES ('$photo_bdd', '$model', '$prix','$des',$qut)";
        $result = $this->conn->query($query);

        if (!$result) {
            die("Erreur d'ajout de voiture : " . $this->conn->error);
        }

        move_uploaded_file($_FILES['photo']['tmp_name'], "C:/xampp/htdocs/RoyalCar/photo/$nom_photo");

        return true;
    
    }

    public function modifierVoiture($id, $description, $photo, $prix, $model) {
        // Vérifier si l'ID de la voiture existe
        $voiture = $this->getVoitureById($id);
        if (!$voiture) {
            die("Voiture non trouvée");
        }
    
        // Vérifier si une nouvelle photo a été envoyée
        $photo_bdd = $voiture['pict'];
        if (!empty($photo['name'])) {
            $nom_photo = $photo['name'];
            $photo_bdd = "/RoyalCar/photo/".$nom_photo;	
            $photo_dossier="C:/xampp/htdocs/RoyalCar/photo/".$nom_photo;
            move_uploaded_file($photo['tmp_name'],$photo_dossier);
        }
    
        // Modifier les champs de la voiture
        $query = "UPDATE voiture SET model='$model',descript='$description', pict='$photo_bdd', prix='$prix' WHERE id=$id";
        $result = $this->conn->query($query);
    
        if (!$result) {
            die("Erreur de modification de voiture : " . $this->conn->error);
        }
    
        return true;
    }
    

    // Fonction pour supprimer une voiture
    public function supprimerVoiture($id) {
        $query = "DELETE FROM voiture WHERE id=$id";
        $result = $this->conn->query($query);

        if (!$result) {
            die("Erreur de suppression de voiture : " . $this->conn->error);
        }

        return true;
    }

}
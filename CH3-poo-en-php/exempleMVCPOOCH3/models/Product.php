<?php
require_once 'models/Model.php';

class Product extends Model {
    private int $id;
    private string $titre;
    private string $descriptif;
    private int $stock;
    private float $prix;
    private string $fabricant;

    // Constructeur prenant un tableau associatif représentant un produit en paramètre
    public function __construct(array $row) {
        $this->id = (int) $row["id_produit"];
        $this->titre =  $row["titre"];
        $this->descriptif = $row["descriptif"];
        $this->stock = (int) $row["stock"];
        $this->prix = (float) $row["prix"];
        $this->fabricant =  $row["fabricant"];
    }
    public function getId(): int {
        return $this->id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getDescriptif(): string {
        return $this->descriptif;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function getPrix(): float {
        return $this->prix;
    }

    public function getFabricant(): string {
        return $this->fabricant;
    }

    // Méthode statique pour récupérer tous les produits de la table produits
    public static function getAll(): array {
        // Exécution de la requête SQL pour récupérer tous les produits
        $rows = self::executeQuery("select * from produits;");//$rows est de type PDOStatement
        $tabRows=$rows->fetchAll(PDO::FETCH_ASSOC);//tabRows est de type tableau associatif
        $products = array();
        // Création d'instances de la classe Product à partir des données récupérées
        //et remplissage d'un tableau d'objets
        foreach ($tabRows as $row) {
            array_push($products, new self($row));
        }
        return $products;
    }

    // Méthode statique pour récupérer un produit dans la table produits à partir de son identifiant 
    public static function getById(int $id): ?Product {
         // Préparation et exécution de la requête SQL
        $query = self::prepareQuery("select * from produits where id_produit=?");
        $query->execute(array($id));
        // Vérification si le produit a été trouvé dans la base de données
        if ($query->rowCount() == 1) {
            $row = $query->fetch();
            // Récupération des données du produit et création d'une instance de la classe Product 
            return new Product($row);
        } else {
            return null;
        }
    }
    public static function ajoutProduit(string $titre, string $descriptif, int $stock, float $prix, string $fabricant): int {
        //cette fonction retourne un entier égal à 1 si l'ajout s'est bien déroulé
         $req_ajout="INSERT INTO produits(titre,descriptif,stock,prix,fabricant) "
                 . "VALUES('$titre','$descriptif',$stock,$prix,'$fabricant')";
         $res=self::execQuery($req_ajout);
         return($res);
         }

    public static function rechercheProduit(string $titre): ?array  {
           
        $query = self::prepareQuery("select * from produits where titre=?");
        $query->execute(array($titre));//$query est de type PDOStatement
        $tabRows=$query->fetchAll(PDO::FETCH_ASSOC);//tabRows est de type tableau associatif
        $products = array();
        // Création d'instances de la classe Product à partir des données récupérées
        //et remplissage d'un tableau d'objets
        foreach ($tabRows as $row) {
            array_push($products, new self($row));
        }
        return $products;
    }

    public static function supprimerProduit(int $id): int {
        //cette fonction retourne un entier égal à 1 si la suppression s'est bien déroulée
        $req_suppression="DELETE FROM produits WHERE id_produit=$id";
        $res=self::execQuery($req_suppression);
        return($res);
    }
}


?>

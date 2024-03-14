<?php
require_once "controllers/Controller.php";
require_once 'models/Product.php';

class ProductsController extends Controller {
    
    // Méthode pour afficher la liste des produits
    public function productsIndex(): void {
        // Récupération de tous les produits depuis le modèle Product
        $products = Product::getAll();        
        // Affichage de la vue "products" avec les produits récupérés
        $this->render("products", ['products' => $products]);
    }

    // Méthode pour afficher les détails d'un produit spécifique
    public function productShow(): void {
        // Récupération de l'identifiant du produit à afficher depuis la requête GET
        $id = intval($_GET['id'] ?? 0);        // si intval($_GET['id']est null ou indéfinie $id prend la valeur 0 
        // Vérification si l'identifiant du produit est valide (non nul)
        if ($id != 0) {
            // Récupération du produit correspondant à l'identifiant depuis le modèle Product
            $product = Product::getById($id);            
            // Vérification si le produit existe
            if ($product !== null) {
                // Affichage de la vue "product" avec les détails du produit récupéré
                $this->render("product", ['product' => $product]);
                return; // Arrêt de l'exécution de la méthode après l'affichage du produit
            }
        }     
        // Si le produit n'existe pas ou si l'identifiant est invalide, affichage d'une erreur 404
        $this->error(404, "Produit " . $id);
    }
    function menuShow() :void{
    // Affichage de la vue "menuView" 
        $this->render("menuView");
    }
    
    public function ajout():void{
        if(isset($_POST["titre"])){
            //formulaire ajout a été rempli dans la vue ajoutView.php
            //On utilise des filtres au lieu d'affecter directement les données de $POST afin de 
            //nettoyer et valider les données saisies dans le formulaire
            $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING);
            $descriptif = filter_input(INPUT_POST, 'descriptif', FILTER_SANITIZE_STRING);
            $stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_INT);
            $prix = filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_FLOAT);
            $fabricant = filter_input(INPUT_POST, 'fabricant', FILTER_SANITIZE_STRING);
            $res = Product::ajoutProduit($titre, $descriptif, $stock, $prix, $fabricant);
            if($res==1){
                echo "<script> window.alert('Produit ajouté'); </script> ";
                echo "<script> window.location.assign('index.php');</script> "; 
                menuShow() ;
            }
            else{
                echo "<script> window.alert('Erreur ajout'); </script> ";
                menuShow() ;
           }
        }
        else {
            //1er appel d'ajout
            $this->render("ajoutView");
        }
    }
    
    public function recherche():void{
        if(isset($_POST["titre"])){
            //formulaire recherche a été rempli dans la vue rechercheView.php
            $titre=$_POST['titre'];
            $products = Product::rechercheProduit($titre);
            if($products){
                // Affichage de la vue "products" avec les détails des produit récupérés
                $this->render("products", ['products' => $products]);
                return; // Arrêt de l'exécution de la méthode après l'affichage du produit
            }
            else{
                 // Si le produit n'existe pas affichage d'une erreur 404
                $this->error(404, "Produit " . $titre);
           }
        }
        else {
            $this->render("rechercheView");
        }
    }

    public function supprimer():void{
        if(isset($_POST["id"])){
            //formulaire supprimer a été rempli dans la vue supprimerView.php
            $id=$_POST['id'];
            $res = Product::supprimerProduit($id);
            if($res==1){
                echo "<script> window.alert('Produit supprimé'); </script> ";
                echo "<script> window.location.assign('index.php');</script> "; 
                $this->render("products", ['products' => Product::getAll()]);
            }
            else{
                echo "<script> window.alert('Erreur suppression'); </script> ";
                $this->error(404, "Produit " . $id);
           }
        }
        else {
            $this->render("supprimerView");
        }
    }
}

?>
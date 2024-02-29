<?php
require 'models/productModel.php';

function menuShow() {
    require 'views/menuView.php';
}

// Permet d'afficher une erreur
function error($code, $msg) {
  if ($code == 404) {
    http_response_code(404);
    require 'views/404.php';
  } else {
    http_response_code(500);
    require 'views/500.php';
  }
  die();
}

function productsIndex() {
  $products = getProductsModels();
  require 'views/productsView.php';
}

function productShow() {
  $id = intval($_GET['id']);
  if ($id != 0) {
    $product = getProductModel($id);
    require 'views/productView.php';
  } else {
    error(404, "Produit " . $id );
  }
}


function ajout(){
    if(isset($_POST["titre"])){
        //formulaire ajout a été rempli dans la vue ajoutView.php
        $titre=$_POST['titre'];
        $descriptif=$_POST['descriptif'];
        $stock=intval($_POST['stock']);
        $prix=floatval($_POST['prix']);
        $fabricant=$_POST['fabricant'];
        $res = ajoutProduit($titre, $descriptif, $stock, $prix, $fabricant);
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
        require 'views/ajoutView.php';//On reste dans la page index.php
        //Autre écriture qui fonctionne mais pose problème:
        //echo "<script> window.location.assign('views/ajoutView.php'); </script> "; 
        //Pose probleme à cause des chemins des fichiers dans layout par ex
        //Le retour menu ne marche plus: 
        //testez le pour comprendre
    }
}
    
function recherche(){
    if(isset($_POST["titre"])){
        //formulaire recherche a été rempli dans la vue rechercheView.php
        $titre=$_POST['titre'];
        $products = rechercheProduit($titre);
        if($products){
            require 'views/productsView.php';
        }
        else{
            echo "<script> window.alert('Erreur recherche'); </script> ";
            require 'views/rechercheView.php';
     
       }
    }
    else {
         require 'views/rechercheView.php';//On reste dans la page index.php
      }
}

function supprimer(){
    if(isset($_POST["id"])){
        //formulaire suppression a été rempli dans la vue menuView.php
        $id=intval($_POST['id']);
        $res = supprimerProduit($id);
        if($res){
          echo "<script> window.alert('Produit supprimé'); </script> ";
          menuShow();
        }
        else{
          require 'views/supprimerView.php';
       }
    }
    else {
        require 'views/supprimerView.php';
    }
}


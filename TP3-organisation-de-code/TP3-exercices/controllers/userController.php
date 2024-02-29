<?php

require 'models/userModel.php';

// Permet d'afficher une erreur
function error($code, $msg) {
  if ($code == 404) {
    http_response_code(404);
    require 'views/404.php';
  } else {
    http_response_code(500);
    require 'views/500.php';
  }
  die(); // Arrête l'exécution du script
}

function menuShow() {
  require 'views/menuView.php';
}

function affichage(){
  $label = "Tous les utilisateurs";
  $users = affichageUtilisateurs();
  require 'views/affichageUtilisateursView.php';
}

function ajout(){
  if(isset($_POST['ajout-submit'])){
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $nom = $_POST['nom'];
    $categorie = $_POST['categorie'];
    $res = ajoutUtilisateur($login, $mdp, $nom, $categorie);
    if($res){
      echo "<script> window.alert('Utilisateur ajouté'); </script> ";
      echo "<script> window.location.assign('index.php?action=affichage');</script> "; 
      affichage() ;
    }
    else{
      error(500, "Erreur lors de l'ajout de l'utilisateur");
    }
  }
  else {
    require 'views/ajoutUtilisateurView.php';
  }
}

function recherche(){
  if(isset($_POST['recherche-submit'])){
    if(isset($_POST['login'])){
      $users = rechercheUtilisateurLogin($_POST['login']);
      $label = "avec Login";
    }
    else if(isset($_POST['nom'])){
      $users = rechercheUtilisateurNom($_POST['nom']);
      $label = "avec Nom";
    }
    else if(isset($_POST['categorie'])){
      $users = rechercheUtilisateurCategorie($_POST['categorie']);
      $label = "avec Catégorie";
    }
    require 'views/affichageUtilisateursView.php';
  }
  else {
    require 'views/rechercheUtilisateurView.php';
  }
}

function supprimer(){
  if(isset($_POST['login'])){
    $res = suppressionUtilisateur($_POST['login']);
    if($res){
      echo"<script> window.alert('Utilisateur supprimé'); </script> ";
      require 'views/supprimerUtilisateurView.php';
    } else {
      error(500, "Erreur lors de la suppression de l'utilisateur");
    }
  } else {
    require 'views/supprimerUtilisateurView.php';
  }
}

function connexion(){
  if(isset($_POST['login'])){
    $login = $_POST['login'];
    $mdp = $_POST['password'];
    $res = connexionUtilisateur($login, $mdp);
    if($res){
      echo "<script> window.alert('Connexion réussie'); </script> ";
      require 'views/menuView.php';
      affichage();
    }
    else{
      echo "<script> window.alert('Erreur de connexion'); </script> ";
      require 'views/connexionUtilisateurView.php';
    }
  }
  else {
    require 'views/connexionUtilisateurView.php';
  }
}

?>
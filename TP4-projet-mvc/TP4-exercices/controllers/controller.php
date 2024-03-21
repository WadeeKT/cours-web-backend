<?php

require('models/model.php');

function error($code, $msg) {
    http_response_code($code);
    $title = "Erreur $code";
    $style = "public/css/error.css";
    require 'views/components/header.php';
    require 'views/error/error.php';
    require 'views/components/footer.php';
    die();
}

function menuShow(): void{
  require 'views/menuView.php';
}

function affichageMembre(): void{
    $users = getAllMembre();
    $style = "public/css/affichageMembre.css";
    $title = "Affichage des Membres";
    require 'views/components/header.php';
    require 'views/affichageMembreView.php';
    require 'views/components/footer.php';
}

function ajoutMembre(): void{
    if(isset($_POST['ajoutMembre'])){
        $pseudo = $_POST['pseudo'];
        $age = $_POST['age'];
        $res = addMembre($pseudo, $age);
        if($res){
            echo "<script> window.alert('Membre ajouté'); </script> ";
            echo "<script> window.location.href = 'index.php?action=affichageMembre'; </script> ";
            affichageMembre(); 
        }
        else{
            error(500, "Erreur lors de l'ajout du membre");
        }
    }
    else {
      $style = "public/css/ajoutMembre.css";
      $title = "Ajouter un Membre";
      require 'views/components/header.php';
      require 'views/ajoutMembreView.php';
      require 'views/components/footer.php';
    }
}

function membre(){
    if(isset($_GET['pseudo'])){
        $pseudo = $_GET['pseudo'];
        $user = getMembre($pseudo);
        if(!$user){
            error(404, "Membre non trouvé");
        } else{
            $numRandos = getParticipationByMembre($pseudo);
            $style = "public/css/membre.css";
            $title = "Membre $pseudo";
            require 'views/components/header.php';
            require 'views/membreView.php';
            require 'views/components/footer.php';
        }
    }
    else{
        error(404, "Membre non trouvé");
    }
}



?>
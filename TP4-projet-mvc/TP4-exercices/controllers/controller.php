<?php

require('models/model.php');

// fonction d'erreur

function error(int $code, string $msg): void
{
    http_response_code($code);
    $title = "Erreur $code";
    $style = "public/css/error.css";
    require 'views/components/header.php';
    require 'views/error/error.php';
    require 'views/components/footer.php';
    die(); // arrêter l'exécution du script
}

// fonction d'ajout de membre

function ajoutMembre(): void
{
    if (isset($_POST['ajoutMembre'])) {
        $pseudo = $_POST['pseudo'];
        $age = (int)$_POST['age'];
        $res = addMembre($pseudo, $age);
        if ($res) {
            echo "<script> window.alert('Membre ajouté'); </script> ";
            echo "<script> window.location.href = 'index.php?action=membre&pseudo=$pseudo'; </script> ";
        } else {
            error(500, "Erreur lors de l'ajout du membre");
        }
    } else {
        $style = "public/css/ajoutMembre.css";
        $title = "Ajouter un Membre";
        require 'views/components/header.php';
        require 'views/ajoutMembreView.php';
        require 'views/components/footer.php';
    }
}

// fonction d'affichage des membres

function affichageMembre(): void
{
    $users = getAllMembre();
    $style = "public/css/affichageMembre.css";
    $title = "Affichage des Membres";
    require 'views/components/header.php';
    require 'views/affichageMembreView.php';
    require 'views/components/footer.php';
}

// fonction de gestion d'un membre

function membre(): void
{
    if (isset($_POST['assignerRando'])) {
        $numRando = (int)$_POST['numRando'];
        $pseudo = $_GET['pseudo'];
        $res = addParticipant($numRando, $pseudo);
        if ($res) {
            echo "<script> window.alert('Randonnée assignée'); </script> ";
            echo "<script> window.location.href = 'index.php?action=membre&pseudo=$pseudo'; </script> ";
        } else {
            error(500, "Erreur lors de l'assignation de la randonnée");
        }
    } else {
        if (isset($_GET['pseudo'])) {
            $pseudo = $_GET['pseudo'];
            $user = getMembre($pseudo);
            if (!$user) {
                error(404, "Membre non trouvé");
            } else {
                $numRandos = getParticipationByMembre($pseudo);
                $allRandonnes = getAllRando();
                $style = "public/css/membre.css";
                $title = "Membre $pseudo";
                require 'views/components/header.php';
                require 'views/membreView.php';
                require 'views/components/footer.php';
            }
        } else {
            error(404, "Membre non trouvé");
        }
    }
}

// fonction d'ajout de randonnée

function ajoutRando(): void
{
    if (isset($_POST['ajoutRando'])) {
        $titre = $_POST['titre'];
        $dateDep = $_POST['dateDep'];
        $res = addRando($titre, $dateDep);
        if ($res) {
            $numRando = getRandoByTitre($titre)['numRando'];
            echo "<script> window.alert('Randonnée ajoutée'); </script> ";
            echo "<script> window.location.href = 'index.php?action=randonnee&numRando=$numRando'; </script> ";
        } else {
            error(500, "Erreur lors de l'ajout de la randonnée");
        }
    } else {
        $style = "public/css/ajoutMembre.css";
        $title = "Ajouter une Randonnée";
        require 'views/components/header.php';
        require 'views/ajoutRandoView.php';
        require 'views/components/footer.php';
    }
}

// fonction d'affichage des randonnées

function affichageRando(): void
{
    $allRandos = getAllRando();
    $style = "public/css/affichageMembre.css";
    $title = "Affichage des Randonnées";
    require 'views/components/header.php';
    require 'views/affichageRandoView.php';
    require 'views/components/footer.php';
}

// fonction de gestion d'une randonnée

function randonnee(): void
{
    if (isset($_POST['ajoutParticipant'])) {
        $pseudo = $_POST['pseudo'];
        $numRando = (int)$_GET['numRando'];
        $res = addParticipant($numRando, $pseudo);
        if ($res) {
            echo "<script> window.alert('Participant ajouté'); </script> ";
            echo "<script> window.location.href = 'index.php?action=randonnee&numRando=$numRando'; </script> ";
        } else {
            error(500, "Erreur lors de l'ajout du participant");
        }
    } else {
        if (isset($_GET['numRando'])) {
            $numRando = (int)$_GET['numRando'];
            $rando = getRandoById($numRando);
            if (!$rando) {
                error(404, "Randonnée non trouvée");
            } else {
                $participants = getParticipantsByNumRando($numRando);
                $allMembres = getAllMembre();
                $style = "public/css/membre.css";
                $title = "Randonnée " . $rando['titre'];
                require 'views/components/header.php';
                require 'views/randonneeView.php';
                require 'views/components/footer.php';
            }
        } else {
            error(404, "Randonnée non trouvée");
        }
    }
}

// fonction de recherche de randonnée

function rechercheRando(): void
{
    if (isset($_POST['rechercheRando'])) {
        $titre = $_POST['titre'];
        $randos = getRandoByTitre($titre);
        if ($randos) {
            echo "<script> window.location.href = 'index.php?action=randonnee&numRando=" . $randos['numRando'] . "'; </script> ";
        } else {
            error(404, "Randonnée non trouvée");
        }
    } else {
        $style = "public/css/ajoutMembre.css";
        $title = "Recherche de Randonnée";
        require 'views/components/header.php';
        require 'views/rechercheRandoView.php';
        require 'views/components/footer.php';
    }
}
?>

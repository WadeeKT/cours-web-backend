<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
require 'controllers/controller.php';

// Définition des routes
$routes = [
    'ajoutMembre' => 'ajoutMembre', // ajouter un membre. Créer un membre emmène vers la page membre
    'affichageMembre' => 'affichageMembre', // afficher tous les membres. Cliquer sur un membre emmène vers la page membre
    'ajoutRando' => 'ajoutRando', // ajouter une randonnée. Créer une randonnée emmène vers la page randonnee
    'affichageRando' => 'affichageRando', // afficher les randonnées, cliquer sur une randonnée emmène vers la page randonnee
    'rechercheRando' => 'rechercheRando', // rechercher une randonnée emmène vers la page randonnee
    'randonnee' => 'randonnee', // afficher les infos d'une randonnée et administrer les participants (fonctionne avec get de l'id de randonnée)
    'membre' => 'membre', // afficher les infos d'un membres et les randonnées auxquelles il participe (fonctionne avec get de l'id de membre)
];

$action = $_GET['action'] ?? 'ajoutMembre'; // ajoutMembre est l'action par défaut

try {
    if (isset($routes[$action])) {
        $fonct = $routes[$action];
        
        if (function_exists($fonct)) {
            $fonct(); // appel de la fonction associée à la route
        } else {
            throw new Exception("Action non valide");
        }
    } else {
        // Si l'URL ne correspond à aucune route, afficher le menu par défaut
        affichageMembre();
    }
} catch (Exception $e) {
    error(500, $e->getMessage());
}
?>

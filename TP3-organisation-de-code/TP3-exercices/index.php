<?php

ini_set('error_reporting', E_ALL) ; 
ini_set('display_errors', 1);
require 'controllers/userController.php';

try {
    if (isset($_GET['action'])) {       
        $action=$_GET['action'];       
        switch($action){    
            case 'affichage' :{  //  GET /index.php?action=affichage
                affichage();
                break;
            }
            case 'ajout':  {
                ajout();
                break;
            }
            case 'recherche': {
                recherche();
                break;
            }
            case 'menu' : {
                menuShow();
                break;
            } 
            case 'supprimer' : {
                supprimer();
                break;
            }
            case 'connexion' : {
                connexion();
                break;
            }
            default: {
                throw new Exception("Action non valide");
            }
        }
    } else {  // GET /index.php
        //1er appel d'index sans action
        menuShow();
    }
} catch (Exception $e) {
    error(500, $e->getMessage());
}

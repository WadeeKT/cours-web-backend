<?php

ini_set('error_reporting', E_ALL) ; 
ini_set('display_errors', 1);
require 'controllers/productsControler.php';

try {
    if (isset($_GET['action'])) {       
        $action=$_GET['action'];       
        switch($action){    
            case 'products' :{  //  GET /index.php?action=products
                productsIndex();
                break;
            }
            case 'product' : {
                if (isset($_GET['id'])) {  //  GET /index.php?action=product&id=X
                    productShow();
                } else {  //  GET /index.php?action=product
                    error(404, "/index.php?action=product");
                }
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

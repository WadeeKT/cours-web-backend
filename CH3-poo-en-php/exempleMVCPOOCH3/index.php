<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

require_once('controllers/Router.php');
require_once("controllers/ProductsController.php");

$productsController = new ProductsController();
$router = new Router("menu", array(
      "products" => array($productsController, "productsIndex"),
      "product" => array($productsController, "productShow"),
      "menu"=>array($productsController, "menuShow"),
      "ajout"=>array($productsController, "ajout"), 
      "recherche"=>array($productsController, "recherche"), 
      "supprimer"=>array($productsController, "supprimer"),
    )
);
$router->routeRequest();

?>

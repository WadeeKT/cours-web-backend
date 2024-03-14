<?php

require 'config/db.php';

// Initialise une seule fois la connection à la base de donnée
function getDatabase() {
  static $db = null;
  if ($db == null) {
    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8';
    $db = new PDO($dsn, DB_USER, DB_PWD);

    // lever une exception si erreur
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  return $db;
}

// Renvoie la liste des produits
function getProductsModels() {
  $db = getDatabase();
  $products = $db->query('select * from produits');
  return $products;
}

// Renvoie un produit selon son id
function getProductModel($id) {
  $db = getDatabase();
  $query = $db->prepare('select * from produits where id_produit=?');
  $query->execute(array($id));
  if ($query->rowCount() == 1) {
    return $query->fetch();
  } else {
    error(404, "Produit " . $id);
  }
}

function ajoutProduit($titre,$descriptif,$stock,$prix,$fabricant){
    //cette fonction retourne un entier égal à 1 si l'ajout s'est bien déroulé
    $db = getDatabase();
    $req_ajout="INSERT INTO produits(titre,descriptif,stock,prix,fabricant) "
            . "VALUES('$titre','$descriptif',$stock,$prix,'$fabricant')";
    $res=$db->exec($req_ajout);
    return($res);
}

function rechercheProduit($titre) {
  $db = getDatabase();
//  $products = $db->query("select * from produits where titre='$titre'");
  $query = $db->prepare("select * from produits where titre=?");
  $query->execute(array($titre));
  if ($query->rowCount() >= 1) {
    return $query;
  } else {
    error(404, "Produit " . $titre);
  }
}

function supprimerProduit($id) {
  $db = getDatabase();
  $query = $db->prepare('DELETE FROM produits WHERE id_produit=:id_produit');
  $query->execute([
    'id_produit' => $id
  ]);
  if ($query->rowCount() == 1) {
    return $query;
  } else {
    error(404, "Produit " . $id);
  }
}


?>

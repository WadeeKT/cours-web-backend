<?php 
declare(strict_types=1);

require 'config/db.php';

// Initialise une seule fois la connection à la base de donnée
function getDatabase() {
  static $db = null;
  if ($db == null) {
    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8';
    $db = new PDO($dsn, DB_USER, DB_PWD);
  }
  return $db;
}

function affichageUtilisateurs(): array{
  $db = getDatabase();
  $query = $db->prepare('SELECT * FROM t_utilisateur ORDER BY nom ASC');
  $query->execute();
  return $query->fetchAll();
}

function ajoutUtilisateur(string $login, string $mdp, string $nom, string $categorie): bool{
  $db = getDatabase();
  $query = $db->prepare('INSERT INTO t_utilisateur (login, mdp, nom, categorie) VALUES (?, ?, ?, ?)');
  return $query->execute([$login, $mdp, $nom, $categorie]);
}

function rechercheUtilisateurLogin(string $login): array{
  $db = getDatabase();
  $query = $db->prepare('SELECT * FROM t_utilisateur WHERE login = :login');
  $query->execute(["login" => $login]);
  return $query->fetchAll();
}

function rechercheUtilisateurNom(string $nom): array{
  $db = getDatabase();
  $query = $db->prepare('SELECT * FROM t_utilisateur WHERE nom = :nom');
  $query->execute(["nom" => $nom]);
  return $query->fetchAll();
}

function rechercheUtilisateurCategorie(string $categorie): array{
  $db = getDatabase();
  $query = $db->prepare('SELECT * FROM t_utilisateur WHERE categorie = :categorie');
  $query->execute(["categorie" => $categorie]);
  return $query->fetchAll();
}

function suppressionUtilisateur(string $login): bool{
  $db = getDatabase();
  $query = $db->prepare('DELETE FROM t_utilisateur WHERE login = :login');
  return $query->execute(["login" => $login]);
}

function connexionUtilisateur(string $login, string $mdp): array{
  $db = getDatabase();
  $query = $db->prepare('SELECT * FROM t_utilisateur WHERE login = :login AND mdp = :mdp');
  $query->execute(["login" => $login, "mdp" => $mdp]);
  return $query->fetch();
}

?>
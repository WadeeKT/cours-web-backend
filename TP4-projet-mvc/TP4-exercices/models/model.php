<?php

require('config/db.php');

function getDatabase() {
  static $db = null;
  if ($db == null) {
    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8';
    $db = new PDO($dsn, DB_USER, DB_PWD);
  }
  return $db;
}

// fonctions de gestion des membres

function addMembre(string $pseudo, int $age): bool {
  $db = getDatabase();
  $query = $db->prepare('INSERT INTO membre (pseudo, age) VALUES (?, ?)');
  return $query->execute([$pseudo, $age]);
}

function getAllMembre(): array {
  $db = getDatabase();
  $query = $db->prepare('SELECT * FROM membre');
  $query->execute();
  return $query->fetchAll();
}

function getMembre(string $pseudo): array {
  $db = getDatabase();
  $query = $db->prepare('SELECT * FROM membre WHERE pseudo = :pseudo');
  $query->execute(['pseudo' => $pseudo]);
  $res = $query->fetch();
  if (!$res) {
    // si l'on retournait $query->fetch() directement, on retournerait false (bool) si le membre n'existait pas or on veut retourner un tableau (array)
    return []; 
  }
  return $res;
}

// fonctions de gestion des randonnées

function addRando(string $titre, string $dateDep): bool{
  $db = getDatabase();
  $query = $db->prepare('INSERT INTO randonnee (titre, dateDep) VALUES (?, ?)');
  return $query->execute([$titre, $dateDep]);
}

function getAllRando(): array {
  $db = getDatabase();
  $query = $db->prepare('SELECT * FROM randonnee');
  $query->execute();
  return $query->fetchAll();
}

function getRandoByTitre(string $titre): array {
  $db = getDatabase();
  $query = $db->prepare('SELECT * FROM randonnee WHERE titre = :titre');
  $query->execute(['titre' => $titre]);
  $res = $query->fetch();
  if (!$res) {
    // si l'on retournait $query->fetch() directement, on retournerait false (bool) si le membre n'existait pas or on veut retourner un tableau (array)
    return []; 
  }
  return $res;
}

function getRandoById(int $numRando): array {
  $db = getDatabase();
  $query = $db->prepare('SELECT * FROM randonnee WHERE numRando = :numRando');
  $query->execute(['numRando' => $numRando]);
  $res = $query->fetch();
  if (!$res) {
    // si l'on retournait $query->fetch() directement, on retournerait false (bool) si le membre n'existait pas or on veut retourner un tableau (array)
    return []; 
  }
  return $res;
}

// fonctions de gestion des participants

function addParticipant(int $numRando, string $pseudo): bool {
  $db = getDatabase();
  $query = $db->prepare('INSERT INTO participation (numRando, pseudo) VALUES (?, ?)');
  return $query->execute([htmlentities($numRando), htmlentities($pseudo)]);
}

function getParticipationByMembre(string $pseudo): array {
  $db = getDatabase();
  $query = $db->prepare('SELECT numRando FROM participation WHERE pseudo = :pseudo');
  $query->execute(['pseudo' => htmlentities($pseudo)]);
  $res = $query->fetchAll();
  if (!$res) {
    // si l'on retournait $query->fetchAll() directement, on retournerait false (bool) si le membre n'existait pas or on veut retourner un tableau (array)
    return []; 
  }
  return $res;
}

function getParticipantsByNumRando(int $numRando): array {
  $db = getDatabase();
  $query = $db->prepare('SELECT pseudo FROM participation WHERE numRando = :numRando');
  $query->execute(['numRando' => $numRando]);
  $res = $query->fetchAll();
  if (!$res) {
    // si l'on retournait $query->fetchAll() directement, on retournerait false (bool) si le membre n'existait pas or on veut retourner un tableau (array)
    return []; 
  }
  return $res;
}

function suppParticipation(int $numRando, string $pseudo): bool {
  $db = getDatabase();
  $query = $db->prepare("DELETE FROM participation WHERE numRando = :numRando AND pseudo = :pseudo");
  $res = $query->execute(['numRando' => $numRando, 'pseudo' => $pseudo]);
  return $res;
}

?>

<?php

require('config/db.php');

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
    // si l'on retournait $res directement, on retournerait false (bool) si le membre n'existait pas or on veut retourner un tableau (array)
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
    return []; 
  }
  return $res;
}

// CONNECTION

function connexionMembre(string $pseudo, string $mdp): array {
  $db = getDatabase();
  $query = $db->prepare('SELECT pseudo FROM membre WHERE pseudo = :pseudo AND mdp = :mdp');
  $query->execute([
    'pseudo' => $pseudo,
    'mdp' => $mdp
  ]);
  $res = $query->fetch();
  if (!$res) {
    return [];
  }
  return $res;
}

?>

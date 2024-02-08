<?php

if(isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['nom']) && isset($_POST['categorie'])){

    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $nom = $_POST['nom'];
    $categorie = $_POST['categorie'];

    $dp = new PDO('mysql:host=localhost;dbname=securite', 'root', '');

    $query = $dp->prepare('INSERT INTO t_utilisateur (login, mdp, nom, categorie) VALUES (:login, :mdp, :nom, :categorie)');
    $query->execute([
        'login' => $login,
        'nom' => $nom,
        'mdp' => $mdp,
        'categorie' => $categorie
    ]);

    echo "Enregistrement effectué. Retourner à <a href='3_affichage_utilisateurs.php'>l'affichage utilisateur</a>";

} else{
    echo "Erreur lors de l'ajout.";
}

?>
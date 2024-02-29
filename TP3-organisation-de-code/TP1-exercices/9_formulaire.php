<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>
    <h1>Se connecter</h1>
    <form action="9_formulaire.php" method="post">
        <label for="login">Login</label>
        <input required type="text" name="login" id="login" required>
        <label for="password">Mot de passe</label>
        <input required type="password" name="password" id="password" required>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>

<?php

if(isset($_POST['login']) && isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    $dp = new PDO('mysql:host=localhost;dbname=securite', 'root', '');

    $queryUser = $dp->prepare('SELECT * FROM t_utilisateur WHERE login = :login AND mdp = :password');
    $queryUser->execute([
        'login' => $login,
        'password' => $password
    ]);

    $user = $queryUser->fetch();
    
    if($user){
        if($user['categorie'] == "admin"){
            header('Location: 8_menu_gestion.html');
        }
        else{
            echo "Vous êtes connecté en tant qu'utilisateur, vous ne possedez pas les droits d'administrateur !";
        }
    }
    else{
        echo "Mauvais login ou mot de passe !";
    }
}
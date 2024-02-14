<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter en tant que modérateur</title>
    <link rel="stylesheet" href="seConnecter.css">
</head>
<body>
    <h1>Se connecter en tant que modérateur</h1>
    <form method="post" action="4-se-connecter.php">
        <div>
            <label for="login">Login</label>
            <input required type="text" name="login" id="login" placeholder="Votre login">
        </div>
        <div>
            <label for="mdp">Mot de passe</label>
            <input required type="password" name="mdp" id="mdp"  placeholder="Votre mot de passe">
        </div>
        <div>
            <button type="submit">Se connecter</button>
        </div>

        <?php
        if(isset($_POST['login']) && isset($_POST['mdp'])){
            $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
            $query = $db->prepare('SELECT * FROM utilisateurs WHERE login = :login AND mdp = :mdp');
            $query->execute([
                "login"=>$_POST['login'],
                "mdp"=>$_POST['mdp']
            ]);
            $user = $query->fetch();
            if($user){
                if($user['role'] == 'modérateur'){
                    // On stocke l'id de l'utilisateur dans une variable de session pour pouvoir l'utiliser dans les autres pages en utilisant session_start() au début de chaque page.
                    $_SESSION['moderateur'] = $user['id_aut'];
                    header("Location: 3-gestion-des-commentaires.php");
                } else {
                    echo "<p>Vous n'êtes pas autorisé à vous connecter</p>";
                }
            } else {
                echo "<p>Erreur de connexion</p>";
            }
        }
        ?>

    </form>



</body>
</html>
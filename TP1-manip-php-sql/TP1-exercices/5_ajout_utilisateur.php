<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
        }
        form div{
            display: flex;
            justify-content: space-between;
            width: 300px;
            margin: 4px;
        }
        #bouton-submit{
            width: 300px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Ajout utilisateur</h1>
    <form action="5_ajout_utilisateur.php" method="post">
        <div>
            <label for="login">Login :</label>
            <input type="text" name="login" id="login">
        </div>
        <div>
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp">
        </div>
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="categorie">Catégorie :</label>
            <select name="categorie" id="categorie">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <input name="ajout-submit" id="bouton-submit" type="submit" value="Enregistrer">
    </form>
    <?php

    if(isset($_POST['ajout-submit'])){

        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $nom = $_POST['nom'];
        $categorie = $_POST['categorie'];

        $dp = new PDO('mysql:host=localhost;dbname=securite', 'root', '');

        $query = $dp->prepare('INSERT INTO t_utilisateur (login, mdp, nom, categorie) VALUES (:login, :mdp, :nom, :categorie)');
        $query->execute([
            'login' => $login,
            'mdp' => $mdp,
            'nom' => $nom,
            'categorie' => $categorie
        ]);

        echo "Enregistrement effectué. Retourner à <a href='3_affichage_utilisateurs.php'>l'affichage utilisateur</a>";

    }

    ?>
</body>
</html>
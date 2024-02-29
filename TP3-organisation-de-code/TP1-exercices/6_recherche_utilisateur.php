<?php

function afficheUser($users){
    $nombreUsers = count($users);
    echo "<h3>$nombreUsers résultat(s) trouvé(s) :</h3>";
    echo '<table border="1">
    <tr>
        <th>Login</th>
        <th>Mot de passe</th>
        <th>Nom</th>
        <th>Categorie</th>
    </tr>';
    foreach($users as $user){
        echo '<tr>
        <td>' . $user['login'] . '</td>
        <td>' . $user['mdp'] . '</td>
        <td>' . $user['nom'] . '</td>
        <td>' . $user['categorie'] . '</td>
        </tr>';
    };
    echo '</table>';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche utilisateur</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 3px;
        }
        form *{
            margin: 2px;
        }
        input[type=submit], select{
            cursor: pointer;
        }
    </style>

</head>
<body>
    <h1>Recherche utilisateurs</h1>
    <form action="6_recherche_utilisateur.php" method="post">
        <label for="login">Login</label>
        <input type="text" name="login" id="login">
        <input name="login-search" type="submit" value="Rechercher login">
    </form>

    <form action="6_recherche_utilisateur.php" method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
        <input name="nom-search" type="submit" value="Rechercher nom">
    </form>

    <form action="6_recherche_utilisateur.php" method="post">
        <label for="categorie">Catégorie</label>
        <select name="categorie" id="categorie">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <input name="categorie-search" type="submit" value="Rechercher catégorie">
    </form>


    <?php

    $dp = new PDO('mysql:host=localhost;dbname=securite', 'root', '');


    if(isset($_POST['login-search'])){
        $login = $_POST['login'];

        $query = $dp->prepare('SELECT * FROM t_utilisateur WHERE login = :login');
        $query->execute([
            'login' => $login
        ]);

        $users = $query->fetchAll();
        if(!$users){
            echo "Aucun résultat trouvé";
        } else {
            afficheUser($users);
        }
    }

    if(isset($_POST['nom-search'])){
        $nom = $_POST['nom'];

        $query = $dp->prepare('SELECT * FROM t_utilisateur WHERE nom = :nom');
        $query->execute([
            'nom' => $nom
        ]);

        $users = $query->fetchAll();
        if(!$users){
            echo "Aucun résultat trouvé";
        } else {
            afficheUser($users);
        }
    }

    if(isset($_POST['categorie-search'])){
        $categorie = $_POST['categorie'];

        $query = $dp->prepare('SELECT * FROM t_utilisateur WHERE categorie = :categorie');
        $query->execute([
            'categorie' => $categorie
        ]);

        $users = $query->fetchAll();
        if(!$users){
            echo "Aucun résultat trouvé";
        } else {
            afficheUser($users);
        }
    }


    ?>
</body>
</html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Utilisateurs</title>
</head>
<body>
    <?php
        $dp = new PDO('mysql:host=localhost;dbname=securite', 'root', '');
        
        $query = $dp->prepare('SELECT * FROM t_utilisateur ORDER BY nom ASC');
        $query->execute();
        
        $utilisateurs = $query->fetchAll(); 
        // On peut mettre fetchAll(PDO::FETCH_ASSOC) pour spécifier que le tableau qui va sortir sera associatif.
        
        echo '<h1>Affichage des utilisateurs triés par nom</h1>';
        echo '<table border="1">
                <tr>
                    <th>Login</th>
                    <th>Mot de passe</th>
                    <th>Nom</th>
                    <th>Categorie</th>
                </tr>';

        foreach ($utilisateurs as $utilisateur) {
            echo '<tr>
                    <td>' . $utilisateur['login'] . '</td>
                    <td>' . $utilisateur['mdp'] . '</td>
                    <td>' . $utilisateur['nom'] . '</td>
                    <td>' . $utilisateur['categorie'] . '</td>
                  </tr>';
        }

        echo '</table>';
    ?>
</body>
</html>

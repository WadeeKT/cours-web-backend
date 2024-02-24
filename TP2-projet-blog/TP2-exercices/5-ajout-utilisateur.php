<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajout utilisateur</title>
  <link rel="stylesheet" href="gestionAjout.css">
</head>
<body>

  <?php include 'header.php'; ?>

  <h1>Ajout d'un utilisateur</h1>

  <main>
    <form class='conteneur-ajout' action="5-ajout-utilisateur.php" method="POST">
      <div>
        <label for="nom">Nom</label>
        <input required type="text" name="nom" placeholder="Votre nom...">
      </div>
      <div>
        <label for="prenom">Prénom</label>
        <input required type="text" name="prenom" placeholder="Votre prénom...">
      </div>
      <div>
        <label for="login">Login</label>
        <input required type="text" name="login" placeholder="Votre login...">
      </div>
      <div>
        <label for="password">Mot de passe</label>
        <input required type="password" name="password" placeholder="Votre mot de passe...">
      </div>

      <div>
        <label for="role">Rôle</label>
        <select required name="role" id="role">
          <option value="auteur">Auteur</option>
          <option value="modérateur">Modérateur</option>
        </select>
      </div>
      <input type="submit" value="Ajouter">

      <?php
      if(isset($_POST['login'])){
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $query = $db->prepare("INSERT INTO utilisateurs (nom, prenom, login, mdp, role) VALUES (:nom, :prenom, :login, :mdp, :role)");
        $res = $query->execute([
          "nom" => $_POST['nom'],
          "prenom" => $_POST['prenom'],
          "login" => $_POST['login'],
          "mdp" => $_POST['password'],
          "role" => $_POST['role']
        ]);

        echo "<div>";
        if($res){
          echo "L'utilisateur a bien été ajouté !";
        } else {
          echo "Problème lors de l'ajout. Réessayez plus tard";
        }
        echo "</div>";

      }
      ?>

    </form>
  </main>
</body>
</html>
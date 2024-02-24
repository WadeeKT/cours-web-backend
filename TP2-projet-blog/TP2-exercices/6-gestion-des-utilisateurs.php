<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des utilisateurs</title>
  <link rel="stylesheet" href="gestionUtilisateurs.css">
</head>
<body>

  <?php include 'header.php'; ?>


  <h1>Tous les utilisateurs</h1>

  <main>
  <div class="users-container">
  <?php
    $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
    $query = $db->prepare('SELECT id_aut, nom, prenom, role 
                           FROM utilisateurs
                           ORDER BY role DESC');
    $query->execute();
    $users = $query->fetchAll();
    $query->closeCursor();
    
    if(isset($users)){
      foreach($users as $user){
        $id_aut = $user['id_aut'];
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        $role = $user['role'];

        $query = $db->prepare('SELECT * FROM articles WHERE id_aut = :id_aut');
        $query->execute([
          "id_aut" => $id_aut
        ]);
        $articles = $query->fetchAll();

        echo"
        <div class='user'>
          <div><span>$id_aut</span>
          <h3>$nom $prenom</h3></div>
          <span>$role</span>
        </div>";

        if($role == 'auteur'){
          echo"<div class='deroulant'>";
          if($articles){
            echo "<h4>Articles de $nom $prenom</h4>";
            foreach($articles as $article){
              echo"<a href='3-gestion-des-commentaires.php?id_article=". $article['id_art'] ."'";
                echo "<p>".$article["id_art"]."</p>";
                echo "<p>".$article["titre"]."</p>";
              echo"</a>";
            }
          } else {
            echo "<p>Aucun article pour $nom $prenom</p>";
          }
          echo"</div>";
        }

      }
    } else{
      echo "Aucun utilisateur trouvé ^^'";
    }
  ?>

    </div>
  </main>
</body>
</html>
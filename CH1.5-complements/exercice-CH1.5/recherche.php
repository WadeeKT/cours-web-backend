<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Recherche Produits</title>
</head>
<body>
<header>
    <h1>Recherche Produits</h1>
</header>
<form method="post" action="recherche.php">
  id du produit :<br>
  <input type="text" name="id"><br><br>
  <input type="submit" value="Rechercher Produit"><br>
</form>
  <?php
    if (!empty($_POST['id']) ){
        $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $id=$_POST['id'];

        // Ancien Code ----------
        // $req = "SELECT * FROM produits WHERE id_produit = $id";
        // $res = $bdd->query($req);  
        
        // // Nouveau Code ----------
        $req = "SELECT * FROM produits WHERE id_produit = :id";
        $res = $bdd->prepare($req);
        $res->execute([
          "id" => $id
        ]);

        // Autre Code -----------
        // $req = "SELECT * FROM produits WHERE id_produit = ?";
        // $res = $bdd->prepare($req);
        // $res->execute(array($id));
        
        
        if ($res) {
            $prod = $res->fetch(PDO::FETCH_ASSOC);
            if ($prod) { 
                echo "<table border='1'> <tr><th>ID produuit</th>
                <th>Titre</th> <th>Prix</th>
                </tr>";
               do{
                    echo "<tr>";
                    echo "<td>" . $prod['id_produit'] . "</td>";
                    echo "<td>" . $prod['titre'] . "</td>";
                    echo "<td>" . $prod['prix'] . "</td>";
                    echo "</tr>";
                }
                while ($prod = $res->fetch(PDO::FETCH_ASSOC));
                  echo "  </table><BR>";
                echo "<br><br><a href='recherche.php'>Une autre recherche</a>";
            }
            else {
                echo  "<p>Aucune réponse</p>";
                echo "<a href='recherche.php'>Recommencer la saisie</a>";
            }    
        } 
        else {
                echo  '<p>Erreur, lecture impossible</p>';
                echo "<a href='recherche.php'>Recommencer la saisie</a>";
        }
        echo "<BR>";
        $res->closeCursor();
        echo "Requete exécutée : " . $req ;
    }
?>
</body>
</html>

<!-- 
  1. En saisissant "1 OR 1=1", le script ressemble à "SELECT * FROM produits WHERE id_produit = 1 OR 1=1".
  La condition 1=1 est toujours juste, donc chaque ligne sera renvoyée.

  2. En saisissant "1; DELETE FROM produits;, le script ressemble à "SELECT * FROM produits WHERE id_produit = 1 ; DELETE FROM produits;"
  On a fait en sorte que deux scripts sql se lancent en une seule requête, ici on a réussi à supprimer toutes les données de la table produits.
-->
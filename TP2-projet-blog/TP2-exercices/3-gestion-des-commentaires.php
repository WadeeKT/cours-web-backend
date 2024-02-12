<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des commentaires</title>
    <link rel="stylesheet" href="gestionCommentaires.css">
</head>
<body>
    <main>
        <h1>Gestion des commentaires</h1>
        <form id="formRecherche" method="post" action="3-gestion-des-commentaires.php">
            <input required type="text" name="idart" placeholder="Rechercher un article par ID">
            <button onclick="submitForm()" title="Rechercher">
                <img src="http://cdn.onlinewebfonts.com/svg/img_588.png" alt="Rechercher">
            </button>
        </form>

            <?php
            $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

            if(isset($_POST['send-commentaire']) && isset($_SESSION['idart'])){ // Les champs sont en "required" donc il n'y a pas besoin de vérifier s'ils sont remplis.
                $pseudo = $_POST['pseudo'];
                $comment = $_POST['comment'];

                $sendComReq = $db->prepare("INSERT INTO commentaires (id_art, pseudo, contenu, date_crea) VALUES (:id_art, :pseudo, :contenu, :date_crea)");
                $sendComReq->execute([
                    "id_art"=>$_SESSION['idart'],
                    "pseudo"=>$pseudo,
                    "contenu"=>$comment,
                    "date_crea"=>date('Y-m-d H:i:s')
                ]);
                header("Location: 3-gestion-des-commentaires.php?id_article=" . $_SESSION['idart']); // On recharge la page pour afficher le commentaire ajouté.
            }

            
            if(isset($_POST['idart']) || isset($_GET['id_article'])){

                // Récupération de l'id de l'article à l'aide d'une variable de session qui fait office de "variable globale".
                if(isset($_POST['idart'])){
                    $idart = $_POST['idart'];
                    $_SESSION['idart'] = $idart;
                } else {
                    $idart = $_GET['id_article'];
                    $_SESSION['idart'] = $idart;
                }
                $query = $db->prepare(
                    "SELECT id_art, titre, corps, date_crea, date_modif, nom, prenom
                    FROM articles JOIN utilisateurs USING(id_aut) WHERE id_art = :idart"
                                    );
                $query->execute([
                    "idart"=>$idart
                ]);
                $article = $query->fetch();
                
                if($article){

                    // Affichage de l'article
                    echo"<div class='conteneur-article'>";

                        echo"<h1>" . $article['titre'] . "</h1>";
                        echo"<p class='corps-article'>" . $article['corps'] . "</p>";
                        echo"<div class='info-art-container'> 
                                <p class='info-art'> Article écrit par " . $article['prenom'] . " " . $article['nom'] . "</p>
                                <p class='info-art'> Publié le " . $article['date_crea'] . "</p>
                                <p class='info-art'> Modifié le " . $article['date_modif'] . "</p>
                            </div>";
                        
                        echo "<div class='ligne-horizontale'></div>";

                        // Récupération des commentaires

                        $query = $db->prepare("SELECT * FROM commentaires WHERE id_art = :idart");
                        $query->execute(["idart" => $idart]);
                        $commentaires = $query->fetchAll();

                        // Affichage du nombre de commentaires
                        
                        echo "<h2 class='comms-annonce'>";
                            if ($commentaires) {
                                $commentCount = count($commentaires);
                                if ($commentCount > 1) {
                                    echo $commentCount . " commentaires";
                                } else {
                                    echo $commentCount . " commentaire";
                                }
                            } else {
                                echo "Aucun commentaire";
                            }
                        echo "</h2>";

                            // Affichage des commentaires

                        echo "<div class='comms-cont'>";
                            foreach($commentaires as $com){
                                echo "
                                <div class='com'>
                                    <h4>" . $com['pseudo'] . "</h4>
                                    <p>" . $com['contenu'] . "</p>
                                    <p class='date-com'> Le " . substr($com['date_crea'], 0, 10) . "</p>";

                                if(isset($_SESSION['admin'])){
                                    echo "<form onsubmit='demandeValidation()' method='POST' action='3-gestion-des-commentaires.php'>
                                            <input type='hidden' name='idSupp' value='" . $com['id_com'] . "'>
                                            <input type='image' class='img-supp' src='https://pic.onlinewebfonts.com/thumbnails/icons_373777.svg' alt='Supprimer' title='Supprimer le commentaire'>
                                        </form>";
                                }
                                echo "</div>";
                            }
                        echo"</div>";

                        // Formulaire pour ajouter un commentaire

                        echo "<div class='comment-form'>";
                            echo "<h3>Ecrire un commentaire :</h3>";
                            echo "<form method='POST' action=''>";
                                echo "<input required type='text' name='pseudo' placeholder='Votre pseudo'>";
                                echo "<textarea required name='comment' placeholder='Votre commentaire...'></textarea>";
                                echo "<input name='send-commentaire' type='submit' value='Envoyer'>";
                            echo "</form>";
                        echo "</div>";

                    echo"</div>";

                }else{
                    echo"<div>Article non trouvé</div>";
                }
            }
            
            ?>



    </main>

    <?php

    // Suppression d'un commentaire

    if(isset($_POST['idSupp'])){
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $idSupp = $_POST['idSupp'];
        $query = $db->prepare("DELETE FROM commentaires WHERE id_com = :idSupp");
        $query->execute(["idSupp" => $idSupp]);
        echo "<script>alert('Le commentaire a bien été supprimé.');</script>";
        // retourner à la page actuelle après 3 secondes
        header('refresh:0;url=3-gestion-des-commentaires.php?id_article=' . $_SESSION['idart']); // refresh:0 permet de rafraîchir la page actuelle après 0 secondes. Sans ce refresh, l'alerte ne semble pas s'afficher.
    }
    ?>

    <script>
    // Fonction pour soumettre le formulaire de recherche
    function submitForm() {
        document.getElementById('formRecherche').submit();
    }
    // Fonction pour demander confirmation avant de supprimer un commentaire
    function demandeValidation() {
        if(!confirm("Voulez-vous vraiment supprimer ce commentaire ?")){
            event.preventDefault();
        }
    }
    </script>
</body>
</html>
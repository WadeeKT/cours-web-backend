<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des articles</title>
    <link rel="stylesheet" href="gestionArticles.css">
</head>
<!-- Cette page n'est pas responsive, il est préférable de le visionner sur un écran d'ordinateur -->
<body>
    <main>
        <h1>Gestion des articles</h1>
        <div class="sections-conteneur">
            <div class="derniers-articles">
                <h2>Les 5 derniers articles</h2>
                <?php
                    $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
                    $query = $db->prepare('SELECT titre, corps, date_crea, nom, prenom FROM articles JOIN utilisateurs USING (id_aut) ORDER BY date_crea DESC LIMIT 5');
                    $query->execute();

                    $articles = $query->fetchAll();

                    foreach($articles as $article){

                        $corps_decoupe150 = substr($article['corps'], 0, 150); // prends le corps du caractère de l'index 0 jusqu'à celui de l'index 150
                        $corps_article = strlen($article['corps']) > 150 ? $corps_decoupe150 . "..." : $corps_decoupe150; // rajouts de points de suspensions (seulement si le corps est long) pour ne pas couper la description brutalement.

                        echo"
                            <a href='#' class='article'>
                                <img src='https://boutique-courrier-picard.s3.eu-west-3.amazonaws.com/wp-content/uploads/2021/04/journaux-anniversaire-1.png' alt='Image de l'article'/>
                                <span class='titreCorps'>
                                    <h3>" . $article['titre'] . "</h3>
                                    <p>". $corps_article ."</p>
                                </span>
                                <span>
                                    <p>Par " . $article['prenom'] . " " . $article["nom"] . " </p>
                                    <p>le " . $article['date_crea'] . "</p>
                                </span>
                            </a>
                        ";
                    }
                    $query->closeCursor();
                ?>
            </div>
            <div class="add-article">
                <h2>Ajouter un article</h2>
                <form onsubmit="VerifForm()" method="post" action="2-gestion-des-articles.php">
                    <div>
                        <label for="login">Login</label>
                        <input required type="text" name="login" id="login">
                    </div>
                    <div>
                        <label for="mdp">Mot de passe</label>
                        <input required type="password" name="mdp" id="mdp">
                    </div>
                    <div>
                        <label for="titre">Titre de l'article</label>
                        <input type="text" name="titre" id="titre">
                    </div>
                    <div>
                        <label for="contenu">Contenu de l'article</label>
                        <textarea placeholder="Saisissez votre contenu ici..." name="contenu" id="contenu"></textarea>
                    </div>
                    <input name='' type="submit" value="Publier">
                </form>
                <p>
                <?php
                
                if(isset($_POST['login']) && isset($_POST['mdp'])){
                    $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

                    $login = $_POST['login'];
                    $mdp = $_POST['mdp'];
                    $titre = $_POST['titre'];
                    $contenu = $_POST['contenu'];

                    $query = $db->prepare("SELECT * FROM utilisateurs WHERE login = :login AND mdp = :mdp");
                    $query->execute([
                        "login" => $login,
                        "mdp" => $mdp
                    ]);

                    $user = $query->fetch();
                    if($user){
                        if($user['role'] == 'auteur'){
                            $publication = $db->prepare('INSERT INTO articles (id_aut, titre, corps, date_crea, date_modif) VALUES (:id_aut, :titre, :corps, :date_crea, :date_modif)');
                            $publication->execute([
                                "id_aut" => $user['id_aut'],
                                "titre" => $titre,
                                "corps" => $contenu,
                                "date_crea" => date('Y-m-d H:i:s'),
                                "date_modif" => date('Y-m-d H:i:s')
                            ]);
                            echo "Article publié avec succès. <a href='2-gestion-des-articles.php'>Recharger la page</a>.";
                        } else {
                            echo "Vous n'êtes pas auteur. Impossible de publier cet article.";
                        }
                    } else{
                        echo "Login ou Mot de passe incorrect.";
                    }
                    $query->closeCursor();
                }
                
                ?>
                </p>

            </div>
        </div>
    </main>

    <script>
        function VerifForm(){
            let message = ''
            let titreVal = document.querySelector('#titre').value
            let contenuVal = document.querySelector('#contenu').value

            if (!titreVal){
                message += 'Le champs titre ne doit pas rester vide. \n'
            } 
            else if (titreVal.length > 255){
                message += 'Le champs titre ne doit pas dépasser les 255 caractères. \n'
            } 
            if (!contenuVal){
                message += 'Le champs contenu ne doit pas rester vide.'
            }
            if (message){
                alert(message)
                event.preventDefault();
            }
        }
    </script>

</body>
</html>
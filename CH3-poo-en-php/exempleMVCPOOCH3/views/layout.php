<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="public/style.css" />
        <!-- Pour forcer le vidage du cache du navigateur -->
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="Expires" CONTENT="-1">
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <a href="index.php"><h1><?= $title ?></h1></a>
            <h2>Exemple MVC OO</h2>
        </header>
        <hr/>
        <div>
            <?= $content ?>
        </div>
        <footer>
            
            Mon footer, partagé par toutes les vues également
        </footer>
        <hr/>
    </body>
</html>

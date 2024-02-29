<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="public/style.css" />
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <a href="index.php?action=menu">Retour au menu</a><h1><?= $title ?></h1></a>
            <h2>Exemple MVC Simple</h2>
        </header>
        <hr/>
        <div>
            <?= $content ?>
        </div>
        <footer>
        </footer>
        <hr/>
    </body>
</html>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="public/style.css" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href=<?= $style ?>>
    </head>
    <body>
        <header>
            <a href="index.php?action=menu">Retour au menu</a><h1><?= $title ?></h1></a>
            <h1>Securite</h1>
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

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
            <input type="text" name="idart" placeholder="Rechercher un article par ID">
            <button onclick="submitForm()">
                <img src="http://cdn.onlinewebfonts.com/svg/img_588.png" alt="Rechercher">
            </button>
        </form>
    </main>
    <script>
    function submitForm() {
        document.getElementById('formRecherche').submit();
    }
    </script>
</body>
</html>
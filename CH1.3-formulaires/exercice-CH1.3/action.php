<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $tabEtu = [
        "Paoli" => 10,
        "Nivet" => 19,
        "Simonnet" => 18
    ];

    if(isset($_POST['nomEtu'])){
        $nomEtu = $_POST['nomEtu'];
        if (isset($tabEtu[$nomEtu])){
            $note = $tabEtu[$nomEtu];
            echo"$nomEtu a une note de $note";
        } else {
            echo "Il n'existe pas de $nomEtu dans la table";
        }
    }

    ?>
</body>
</html>
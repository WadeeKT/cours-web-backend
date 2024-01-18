<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Est Bissextile - Fonction</title>
</head>
<body>
    <?php
    function estBissextile($a){
        if (($a%4==0 && $a%100!=0) || $a%400==0){
            return true;
        }
    }

    echo "<h3> Liste des années bissextiles entre 2020 et 2050 : </h3>";

    for($i=2020 ; $i <= 2050 ; $i++){
        if (estBissextile($i)){
            echo $i;
            echo " ";

        }
    }
    ?>
</body>
</html>
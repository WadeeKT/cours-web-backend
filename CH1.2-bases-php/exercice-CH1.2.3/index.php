<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableaux associatifs</title>
</head>
<body>
    <?php
    $tabEtu = [
        "Paoli" => 10,
        "Nivet" => 19,
        "Simonnet" => 18
    ];
    echo "<table border='1'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";
    foreach( $tabEtu as $cle => $val ){
        echo "<tr><td>$cle</td><td>$val</td></tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
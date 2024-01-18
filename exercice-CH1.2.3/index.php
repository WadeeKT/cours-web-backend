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
    echo "<ul>";
    foreach( $tabEtu as $key => $value ){
        echo "<li> $key a eu une note de $value </li> <br>";
    }
    echo "</ul>";
    ?>
</body>
</html>
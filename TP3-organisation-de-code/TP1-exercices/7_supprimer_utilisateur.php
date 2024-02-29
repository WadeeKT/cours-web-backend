<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un utilisateur</title>
    <style>
        form{
            width: 200px;
            display: flex;
            flex-direction: column;
        }
        form * {
            margin: 5px;
        }
    </style>
    <script>
        function ValiderForm(){
            if(!confirm("Voulez-vous vraiment supprimer cet utilisateur ?")){
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <form onsubmit="ValiderForm()" action="7_supprimer_utilisateur.php" method="post">
        <label for="login">
            Login à supprimer :
        </label>
        <input type="text" name="login" id="login">
        <input name="supp-login" type="submit" value="Supprimer un utilisateur">
    </form>
</body>
</html>

<?php

$dp = new PDO('mysql:host=localhost;dbname=securite', 'root', '');

if(isset($_POST['login'])){
    $login = $_POST['login'];

    $queryUser = $dp->prepare('SELECT * FROM t_utilisateur WHERE login = :login');
    $queryUser->execute([
        'login' => $login
    ]);

    $user = $queryUser->fetch();
    
    if($user){
        $queryDel = $dp->prepare("DELETE FROM t_utilisateur WHERE login = :login");
        $queryDel->execute(array(
            'login' => $login
        ));
        echo "L'utilisateur a bien été supprimé !";
    }
    else{
        echo "L'utilisateur n'existe pas !";
    }
}
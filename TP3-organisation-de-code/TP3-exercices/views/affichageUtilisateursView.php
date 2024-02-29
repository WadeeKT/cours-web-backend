<?php $title="Affichage Utilisateur"; ?>
<?php $style="public/rien.css"; ?>
<?php ob_start(); ?>

<h1>Affichage des utilisateurs - <?=$label?></h1>;
<table border="1">
  <tr>
    <th>Login</th>
    <th>Mot de passe</th>
    <th>Nom</th>
    <th>Categorie</th>
  </tr>

<?php foreach ($users as $user): ?>
  <tr>
    <td> <?= $user['login'] ?></td>
    <td> <?= $user['mdp'] ?></td>
    <td> <?= $user['nom'] ?></td>
    <td> <?= $user['categorie'] ?></td>
  </tr>
<?php endforeach ?>

</table>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout.php'); ?>
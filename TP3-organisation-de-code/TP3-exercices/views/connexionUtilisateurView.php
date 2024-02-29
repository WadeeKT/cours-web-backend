<?php $title="Ajout Utilisateur"; ?>
<?php $style="public/ajout.css"; ?>
<?php ob_start(); ?>

<h1>Se Connecter</h1>
<form action="index.php?action=connexion" method="post">
  <label for="login">Login</label>
  <input required type="text" name="login" id="login" required>
  <label for="password">Mot de passe</label>
  <input required type="password" name="password" id="password" required>
  <input type="submit" value="Se connecter">
</form>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout.php'); ?>
<?php $title="Ajout Utilisateur"; ?>
<?php $style="public/ajout.css"; ?>
<?php ob_start(); ?>

<h1>Supprimer un utilisateur avec son Login</h1>

<form onsubmit="ValiderForm()" action="index.php?action=supprimer" method="post">
  <label for="login">
    Login à supprimer :
  </label>
  <input type="text" name="login" id="login">
  <input name="supp-login" type="submit" value="Supprimer un utilisateur">
</form>
<script src="public/supprimer.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout.php'); ?>
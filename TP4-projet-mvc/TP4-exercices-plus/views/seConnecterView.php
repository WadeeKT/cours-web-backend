<form action="index.php?action=seConnecter" method="POST">
  <label for="pseudo">Pseudo</label>
  <input required type="text" name="pseudo">
  <label for="mdp">Mot de passe</label>
  <input required type="password" name="mdp">
  <input type="submit" value="Se Connecter">
</form>

<?php

if(isset($_GET['statut'])){
  echo "<div class='erreurConnexion'>Pseudo ou Mot de passe incorrect</div>";
}

?>
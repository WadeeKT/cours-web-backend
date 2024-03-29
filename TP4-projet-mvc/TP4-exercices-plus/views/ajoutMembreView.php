<form action="index.php?action=ajoutMembre" method="post">
  <label for="pseudo">Pseudo</label>
  <input type="text" id="pseudo" name="pseudo" required>
  <label for="age">Age</label>
  <input type="number" id="age" name="age" required>
  <label for="mdp">Mot de passe</label>
  <input type="password" id="mdp" name="mdp" required>
  <input type="submit" name="ajoutMembre" value="Ajouter">
</form>


<?php if (isset($user)) : ?>

  <h2> Informations </h2>

  <p>
    Age : <?php echo $user['age']; ?>
  </p>

  <h2> Randonnées participées </h2>

  <?php

  if (!$numRandos) {
    echo "<p> Aucune randonnée participée </p>";
  } else {
    foreach ($numRandos as $numRando) {
      $rando = getRandoById($numRando['numRando']);
      $titre = $rando['titre'];
      $dateDep = $rando['dateDep'];
      echo "<a class='rando' href='index.php?action=randonnee&numRando=" . $numRando['numRando'] . "'>";
        echo "<h2>$titre</h2>";
        echo "<p>Date de départ : $dateDep</p>";
        echo "<form id='suppPart' action='index.php?action=supprimerParticipation' method='post'>";
          echo "<input type='hidden' name='numRando' value='" . $numRando['numRando'] . "'>";
          echo "<input type='hidden' name='pseudo' value='" . $user['pseudo'] . "'>";
          echo '<button type="submit" name="supprimerParticipation" class="btnSupp">x</button>';
        echo "</form>";
      echo "</a>";
    }
  }

  ?>

  <?php

  $existingRandos = array_column($numRandos, 'numRando');
  $tousLesRandos = array_column($allRandonnes, 'numRando');
  ?>
  <?php
  if (count($existingRandos) != count($tousLesRandos)) :
  ?>
    <div onclick="openForm()" class="rando addRando" id="addRando">
      <h2>Assigner une randonnée à <?php echo $user["pseudo"]; ?></h2>
    </div>
  <?php endif; ?>

  <form action="index.php?action=membre&pseudo=<?php echo $user['pseudo']; ?>" method="post" class="form-popup" id="form">
    <label for="numRando">Randonnée à ajouter</label>
    <select name="numRando" id="numRando">
      <?php
      // obtenir un tableau de tous les numéros de randonnées que l'utilisateur a déjà faites
      $existingRandos = array_column($numRandos, 'numRando');

      foreach ($allRandonnes as $randonnee) {
        if (!in_array($randonnee['numRando'], $existingRandos)) {
          echo "<option value='" . $randonnee['numRando'] . "'>" . $randonnee['titre'] . "</option>";
        }
      }
      ?>
      <input type="submit" name='assignerRando' value="Assigner">
      <button type="button" class="btn cancel" onclick="closeForm()">Fermer le formulaire</button>
  </form>

<?php else : ?>

  <p> Membre non trouvé </p>

<?php endif; ?>

<script src="public/js/membre.js"></script>
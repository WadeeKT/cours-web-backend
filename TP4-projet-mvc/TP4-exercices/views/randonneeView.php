<?php if (isset($rando)) : ?>

  <h2> Informations sur la randonnée </h2>

  <p>
    Date de départ : <?php echo $rando['dateDep']; ?>
  </p>

  <h2> Membres participant </h2>

  <?php

  if (!$participants) {
    echo "<p> Aucune randonnée participée </p>";
  } else {
    foreach ($participants as $participant) {
      $membre = getMembre($participant['pseudo']);
      $pseudo = $membre['pseudo'];
      $age = $membre['age'];
      echo "<a class='rando' href='index.php?action=membre&pseudo=" . $pseudo . "'>";
      echo "<h2>$pseudo</h2>";
      echo "<p>Age : $age</p>";
      echo "</a>";
    }
  }

  ?>

  <?php

  $existingMembres = array_column($participants, 'pseudo');
  $tousLesMembres = array_column($allMembres, 'pseudo');
  ?>
  <?php
  if (count($existingMembres) != count($tousLesMembres)) :
  ?>
    <div onclick="openForm()" class="rando addRando" id="addRando">
      <h2>Ajouter un participant à <?php echo $rando["titre"]; ?></h2>
    </div>
  <?php endif; ?>

  <form action="index.php?action=randonnee&numRando=<?php echo $rando['numRando']; ?>" method="post" class="form-popup" id="form">
    <label for="numRando">Participant à ajouter</label>
    <select name="pseudo" id="pseudo">
      <?php
      // obtenir un tableau de tous les pseudos de randonneurs de la randonnée déjà enregistrés
      $existingMembres = array_column($participants, 'pseudo');

      foreach ($allMembres as $memb) {
        if (!in_array($memb['pseudo'], $existingMembres)) {
          echo "<option value='" . $memb['pseudo'] . "'>" . $memb['pseudo'] . "</option>";
        }
      }
      ?>
      <input type="submit" name='ajoutParticipant' value="Ajouter le membre à la randonnée">
      <button type="button" class="btn cancel" onclick="closeForm()">Fermer le formulaire</button>
  </form>

<?php else : ?>

  <p> Randonnée non trouvée </p>

<?php endif; ?>

<script src="public/js/membre.js"></script>
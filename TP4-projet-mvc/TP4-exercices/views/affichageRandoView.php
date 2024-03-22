<?php

foreach ($allRandos as $rando) {
  $titre = $rando['titre'];
  $dateDep = $rando['dateDep'];
  $numRando = $rando['numRando'];
  echo "<a class='membre' href='index.php?action=randonnee&numRando=$numRando'>";
  echo "<h2>$titre</h2>";
  echo "<p>Date de départ : $dateDep</p>";
  echo "</a>";
}

?>
<h2> Informations </h2>

<p>
  Pseudo : <?php echo $user['pseudo']; ?>
</p>
<p>
  Age : <?php echo $user['age']; ?>
</p>

<h2> Randonnées participées </h2>

<?php

if(!$numRandos){
  echo "<p> Aucune randonnée participée </p>";
}
else{
  foreach($numRandos as $numRando){
    $rando = getRandoById($numRando['numRando']);
    $titre = $rando['titre'];
    $dateDep = $rando['dateDep'];
    echo "<a class='rando' href='index.php?action=randonnee&numRando=".$numRando['numRando']."'>";
      echo "<h2>$titre</h2>";
      echo "<p>Date de départ : $dateDep</p>";
    echo "</a>";
  }
}

?>
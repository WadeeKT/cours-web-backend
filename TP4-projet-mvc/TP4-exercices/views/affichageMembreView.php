<?php

foreach($users as $user){
  $pseudo = $user['pseudo'];
  $age = $user['age'];
  echo "<a class='membre' href='index.php?action=membre&pseudo=$pseudo'>";
    echo "<img src='public/img/photo.jpg' alt='photo de profil de $pseudo' />";
    echo "<h2>$pseudo</h2>";
    echo "<p>Age : $age</p>";
  echo "</a>";
}

?>
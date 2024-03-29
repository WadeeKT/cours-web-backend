<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo "TP4 - $title"; ?>	
  </title>
  <link rel="stylesheet" href="public/css/header.css">
  <link rel="stylesheet" href="public/css/footer.css">
  <link rel="stylesheet" href=<?php echo $style;?>>
</head>
<body>
<header>
  <nav>
    <ul class="head-haut">
      <li><a href="index.php?action=ajoutMembre">Ajout Membre</a></li>
      <li><a href="index.php?action=ajoutRando">Ajout Rando</a></li>
      <li><a href="index.php?action=affichageMembre">Affichage Membres</a></li>
      <li><a href="index.php?action=affichageRando">Affichage Rando</a></li>
      <li><a href="index.php?action=rechercheRando">Recherche Rando</a></li>
    </ul>
  </nav>
  <div>
    <img class="logoUniv" src="https://upload.wikimedia.org/wikipedia/fr/thumb/c/c3/Logotype_de_l%E2%80%99universit%C3%A9_de_Corse-Pascal-Paoli.svg/1200px-Logotype_de_l%E2%80%99universit%C3%A9_de_Corse-Pascal-Paoli.svg.png" alt="Logo université de corse">
    <span class="head-bas">
      <?php if(isset($_SESSION['pseudo'])): ?>
        <?php echo $_SESSION['pseudo']; ?>
      <?php else: ?>
        <a href="index.php?action=seConnecter">Se Connecter</a>
      <?php endif; ?>
    </span>
  </div>
</header>
<h1 class="titre">
  <?php echo $title; ?>	
</h1>

<main>
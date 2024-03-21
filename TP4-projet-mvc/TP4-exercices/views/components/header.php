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
    <ul>
      <li><a href="index.php?action=ajoutMembre">Ajout Membre</a></li>
      <li><a href="index.php?action=affichageMembre">Affichage Membres</a></li>
      <li><a href="index.php?action=ajoutRando">Ajout Rando</a></li>
      <li><a href="index.php?action=affichageRando">Affichage Rando</a></li>
      <li><a href="index.php?action=rechercheRando">Recherche Rando</a></li>
    </ul>
  </nav>
</header>
<h1 class="titre">
  <?php echo $title; ?>	
</h1>

<main>
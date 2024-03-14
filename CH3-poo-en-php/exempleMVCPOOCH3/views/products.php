<?php $this->title = 'Mon E-Commerce - Produits'; ?>
<?php foreach ($products as $product): ?>
<!-- Boucle sur chaque produit dans le tableau d'objets Product $products -->
    <article>
        <!-- Balise <article> pour chaque produit -->  
        <a href="index.php?action=product&id=<?= $product->getId(); ?>">
         <!-- Lien vers la page de détails du produit avec son identifiant -->
  
            <h2>
              <?php echo $product->getTitre() . ' (' . $product->getPrix(); ?> €)
            </h2>
        </a>
        <p>par <?php echo $product->getFabricant() ?></p>
    </article>
    <hr />
    <!-- Ligne de séparation entre chaque produit -->
<?php endforeach ?>


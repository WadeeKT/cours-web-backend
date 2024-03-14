<?php $this->title = 'Mon E-Commerce - ' . $product->getTitre(); ?>

<article>
    <header>
        <h2>
          <?php echo $product->getTitre() . ' (' . $product->getPrix(); ?> €)
        </h2>
        <p>par <?php echo $product->getFabricant() ?></p>
    </header>
    <p><?php echo $product->getDescriptif(); ?></p>
</article>
<hr />

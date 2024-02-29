<?php $title = 'Mon E-Commerce - ' . "Supprimer"; ?>

<?php ob_start() ?>
<h2>Supprimer un produit</h2>
<form method="post" action="index.php?action=supprimer">
    <label>Id du produit à supprimer : </label>
    <input type="text" name="id">
    <input type="submit" name="btnSupprimer" value="Supprimer">
</form>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
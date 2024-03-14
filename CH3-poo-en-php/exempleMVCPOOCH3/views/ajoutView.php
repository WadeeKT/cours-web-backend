<?php $this->title="Ajout produit"; ?>

<form method="post" action="index.php?action=ajout">
            <label>Titre : </label>
            <input type="text" name="titre"><BR>
            <label>Descriptif : </label>
            <input type="text" name="descriptif"><BR>
            <label>Stock : </label>
            <input type="text" name="stock"><BR>
            <label>Prix : </label>
            <input type="text" name="prix"><BR>
            <label>Fabriquant : </label>
            <input type="text" name="fabricant"><BR>
            <input type="submit" name="btnAjout" value="Ajouter">
</form>


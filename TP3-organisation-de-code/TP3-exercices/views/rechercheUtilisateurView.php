<?php $title="Recherche Utilisateur"; ?>
<?php $style="public/recherche.css"; ?>
<?php ob_start(); ?>

<h1>Recherche utilisateurs</h1>
<form action="index.php?action=recherche" method="post">
    <label for="login">Login</label>
    <input type="text" name="login" id="login">
    <input name="recherche-submit" type="submit" value="Rechercher login">
</form>
<form action="index.php?action=recherche" method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom">
    <input name="recherche-submit" type="submit" value="Rechercher nom">
</form>
<form action="index.php?action=recherche" method="post">
    <label for="categorie">Catégorie</label>
    <select name="categorie" id="categorie">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
    <input name="recherche-submit" type="submit" value="Rechercher catégorie">
</form>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout.php'); ?>
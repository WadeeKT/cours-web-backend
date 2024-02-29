<?php $title="Ajout Utilisateur"; ?>
<?php $style="public/ajout.css"; ?>
<?php ob_start(); ?>

<h1>Ajout d'un utilisateur</h1>
<form action="index.php?action=ajout" method="post">
    <div>
        <label for="login">Login :</label>
        <input required type="text" name="login" id="login">
    </div>
    <div>
        <label for="mdp">Mot de passe :</label>
        <input required type="password" name="mdp" id="mdp">
    </div>
    <div>
        <label for="nom">Nom :</label>
        <input required type="text" name="nom" id="nom">
    </div>
    <div>
        <label for="categorie">Catégorie :</label>
        <select name="categorie" id="categorie">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <input name="ajout-submit" id="bouton-submit" type="submit" value="Enregistrer">
</form>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout.php'); ?>
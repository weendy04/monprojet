<?php
ob_start();
?>
<div class="container">
    <form method="post" action="<?=$action?>">
        <?php if(isset($utilisateur)):?>
        <input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
        <?php endif?>
        <div class="form-group">
            <label for="email">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="email" name="email" value=<?php if(isset($utilisateur)) { echo $utilisateur['email']; }?>>
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="mdp" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" >
        </div>
        <div class="form-group">
            <label for="passwordconfirm">Confirmation du mot de passe</label>
            <input type="mdp" class="form-control" id="passwordconfirm" name="passwordconfirm" placeholder="Confirmation du mot de passe" >
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>

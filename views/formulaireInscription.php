<?php
ob_start();
?>
<div class="container">
	<form method="post">
		<?php if(isset($utilisateur)):?>
        <input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
        <?php endif?>
	  <div class="form-group row">
		<label for="nom" class="col-sm-2 col-form-label">Nom</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="nom" name="nom" required>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="prenom" name="prenom" required>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
		  <input type="email" class="form-control" id="email" name="email" required>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="mdp" class="col-sm-2 col-form-label">Mot de passe</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control" id="mdp" name="mdp" required>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="mdpVerif" class="col-sm-2 col-form-label">Mot de passe vérification</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control" id="mdpVerif" name="mdpVerif" required>
		</div>
	  </div>
	  <div class="form-group row">
		<div class="col-sm-10">
		  <button type="submit" class="btn btn-primary">Inscription</button>
		</div>
	  </div>
	</form>
</div>
<?php
$title = 'S\'inscrire';
$content = ob_get_clean();
include 'includes/layout.php';
?>


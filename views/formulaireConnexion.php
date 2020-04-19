<?php ob_start() ?>
<div class="container">
	<form method="post">
	  <div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
		  <input type="email" class="form-control" id ="email" name="email">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="mdp" class="col-sm-2 col-form-label">Mot de passe</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control" id ="mdp" name="mdp">
		</div>
	  </div>
	  <div class="form-group row">
		<div class="col-sm-10">
		  <button type="submit" class="btn btn-primary">Se connecter</button>
		</div>
	  </div>
    </form>
</div>
<?php
$title = 'Se connecter';
$content = ob_get_clean();
include 'includes/layout.php'
?>

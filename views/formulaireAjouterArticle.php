<?php
ob_start();
?>
<div class="container">
	<form method="post" enctype="multipart/form-data">
		<?php if(isset($article)):?>
		<input type="hidden" name="idArticle" value=<?=$article['idArticle']?>>
		<?php endif?>
	  <div class="form-group row">
		<label for="nomArticle" class="col-sm-2 col-form-label">Nom</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="nomArticle" name="nomArticle" required>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="prixArticle" class="col-sm-2 col-form-label">Prix</label>
		<div class="col-sm-10">
		  <input type="number" class="form-control" id="prixArticle" step ='0.05' min = 1 name="prixArticle" required>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="descriptionArticle" class="col-sm-2 col-form-label">description</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="descriptionArticle" name="descriptionArticle" required>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="nomImageArticle" class="col-sm-2 col-form-label">Nom de l'image + type (ex: image.jpg)</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="nomImageArticle" name="nomImageArticle" required>
		</div>
	  </div>
	  <div class="form-group row">
		<div class="col-sm-10">
		  <button type="submit" class="btn btn-primary">Ajouter</button>
		</div>
	  </div>
	</form>
</div>
<?php
$title = 'Ajout d\'article';
$content = ob_get_clean();
include 'includes/layout.php';
?>


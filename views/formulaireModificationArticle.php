<?php
ob_start();
?>
<div class="container">
	<form method="post">
		<input type="hidden" name="idArticle" value=<?=$article['idArticle']?>>

	  <div class="form-group row">
		<label for="nomArticle" class="col-sm-2 col-form-label">Nom</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="nomArticle" name="nomArticle" required value=<?=$article['nomArticle']?>>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="prixArticle" class="col-sm-2 col-form-label">Prix</label>
		<div class="col-sm-10">
		  <input type="number" class="form-control" id="prixArticle"  required name="prixArticle" value=<?=$article['prixArticle']?>>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="descriptionArticle" class="col-sm-2 col-form-label">description</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="descriptionArticle" name="descriptionArticle" required value="<?=str_replace("-"," ", $article['descriptionArticle'])?>">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="nomImageArticle" class="col-sm-2 col-form-label">Nom de l'image + type (ex: image.jpg)</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="nomImageArticle" name="nomImageArticle" required value=<?=$article['nomImageArticle']?>>
		</div>
	  </div>
	  <div class="form-group row">
		<div class="col-sm-10">
		  <button type="submit" class="btn btn-primary">Modifier</button>
		</div>
	  </div>
	</form>
</div>
<?php
$title = 'Modification de l\'article';
$content = ob_get_clean();
include 'includes/layout.php';
?>


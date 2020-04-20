<?php
ob_start();
?>
<div class="container">
	<form method ='post'>
	<?php if(isset($idEnTeteCommande)):?>
        <input type="hidden" name="idEnTeteCommande" value=<?=$idEnTeteCommande['idEnTeteCommande']?>>
	<?php endif?>
	  <div class="form-row align-items-center">
		<div class="col-auto my-1">
		  <label class="mr-sm-2 sr-only" for="idStatut">Statut</label>
		  <select class="custom-select mr-sm-2" id="idStatut">
			<option selected>Statut...</option>
			<option value="1">En cours</option>
			<option value="2">En attente</option>
			<option value="3">Envoyer</option>
		  </select>
		</div>
		<div class="col-auto my-1">
		  <button type="submit" class="btn btn-primary">Modifier</button>
		</div>
	  </div>
	</form>
</div>
<?php
$title = 'Modification du statut de la commande';
$content = ob_get_clean();
include 'includes/layout.php';
?>


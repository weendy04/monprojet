<?php
ob_start();
?>
<?php if(!empty($_SESSION['idUtilisateur'])):?>
	<?php if(!empty($articles) ):?>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Article</th>
					<th scope="col">Prix</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($articles as $article):?>
					<tr>
						<th scope="row"><?=$article['idArticle']?></th>
						<td><?=$article['nomArticle']?></td>
						<td><?=$article['prixArticle']?></td>
						<td>
							 <div class="row">			
								<form method ='post' action="retirerArticlePanier">
								<input type="hidden" name="idPanier" value=<?=$article['idPanier']?>>
								<button class="btn btn-outline-danger" type="submit">Retirer</button>
							</form>
							</div>
						</td>
					</tr>
				<?php endforeach ?>
				<tr> <!-- tr même structure-->
					<th></th>
					<th>Prix total</th>
					<th><?=$prixTotal['prixTotal']?></th>
					<th>
						 <div class="row">
							<a class="btn btn-outline-primary" href="/commande">Commander</a>
						</div>
					</th>
				</tr>	
			</tbody>
		</table>
	<?php else: ?>
	Votre panier est vide.
	<?php endif ?>
<?php else:?>
Veillez-vous connecter pour remplir votre panier, merci.
<?php endif ?>


<?php
$title = 'Panier';
$content = ob_get_clean();
include 'includes/layout.php';
?>

<?php if ($article['isActive'] == 1):?>	
	<div class="container">	
		<div class="card bg-light">
			<form method="post" action="article">
				<img class="card-img-top" src="/images/<?=$article['nomImageArticle']?>" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title"><?=$article['nomArticle']?></h5>
					<p class="card-text"><?=$article['descriptionArticle']?></p>
					<span class="badge badge-pill badge-info"><?=$article['prixArticle']?> €</span>
				</div>
				<div class="card-footer container">
					<div class="row">
							<input type="hidden" name="idArticle" value=<?=$article['idArticle']?>>
							<button class="col btn btn-info add_cart" type="submit">Détail</button>
					</div>
				</div>	
			</form>
				<form method="post" action="panierAjouter">
					<input type="hidden" name="idArticle" value=<?=$article['idArticle']?>>
					<button class="col btn btn-info add_cart">Ajouter au panier</button>
				</form>		
		</div>
	</div>
<?php endif ?>

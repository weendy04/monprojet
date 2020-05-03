<?php if ($article['isActive'] == 1):?>	
	<div class="container">	
		<div class="card bg-light">
			<img class="card-img-top" src="/images/<?=$article['nomImageArticle']?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?=str_replace("-"," ", $article['nomArticle'])?></h5>
				<p class="card-text"><?=str_replace("-"," ", $article['descriptionArticle'])?></p>
				<span class="badge badge-pill badge-info"><?=$article['prixArticle']?> €</span>
			</div>
			<div class="card-footer container">
				<a href="<?= ROOT_PATH.'article/'.$article['urlArticle'] ?>" class="col btn btn-info add_cart">Voir le détail</a>
			</div>	
			<div class="card-footer container">
				<a href="<?= ROOT_PATH.'panier/'.$article['idArticle'].'/ajouter' ?>" class="col btn btn-info add_cart">Ajouter au panier</a>
			</div>	
		</div>
	</div>
<?php endif ?>
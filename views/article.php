<?php
ob_start();
?>
<div class="container">
    <h3>Prix: </h3>
	 <div><?=$article['prixArticle']?> €</div>
	</br>
    <div><img class="card-img-top" src="/images/<?=$article['nomImageArticle']?>" alt="Card image cap"></div>
	<h3>Description</h3>
    <div><?=$article['descriptionArticle']?></div>
</div>
</br>
<button class="btn btn-info add_cart" idArticle="<?= $article['idArticle']?>">Ajouter au panier</button>
<?php
$title = $article['nomArticle'];
$content = ob_get_clean();
include 'views/includes/layout.php';
?> 


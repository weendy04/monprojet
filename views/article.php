<?php
ob_start();
?>
<div class="container">
<table class="table">
	<thead>
		<tr>
			<th scope="col">Article</th>
			<th scope="col">Prix</th>
			<th></th>
		</tr>
	</thead>
	<tr>
		<td><?=$article['nomArticle']?></td>
		<td><?=$article['prixArticle']?> €</td>
		<td></td>
	</tr>
		<tr> 
			<th>Desciption</th>
			<th></th>
			<th></th>
		</tr> 
	<tr>
		<td><?=str_replace("-"," ", $article['descriptionArticle'])?></td>
		<td><img class="card-img-top" src="/images/<?=$article['nomImageArticle']?>" alt="Card image cap"><td>
		<td>
			<a href="<?= ROOT_PATH.'panier/'.$article['idArticle'].'/ajouter' ?>" class="col btn btn-info add_cart">Ajouter au panier</a>
		<td>
	</tr>
</table>
<?php
$title = 'Détail article';
$content = ob_get_clean();
include 'includes/layout.php';
?> 

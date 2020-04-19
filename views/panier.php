<?php
ob_start();
?>
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
						<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?=$article['idArticle']?>">
							Retirer
						</button>
						<?php include 'retirerArticlePanier.php' ?>
					</div>
				</td>
			</tr>
			
        <?php endforeach ?>
		<button type="button" class="btn btn-outline-Success"> Commander </button>
    </tbody>
</table>
<?php
$title = 'Panier';
$content = ob_get_clean();
include 'includes/layout.php';
?>

<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Article</th>
            <th scope="col">Prix</th>
            <th scope="col">Description</th>
            <th scope="col">ImageArticle</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($articles as $article):?>	
			<?php if ($article['isActive'] == 1):?>	
			<tr>
				<th scope="row"><?=$article['idArticle']?></th>
				<td><?=$article['nomArticle']?></td>
				<td><?=$article['prixArticle']?></td>
				<td><?=str_replace("_"," ", $article['descriptionArticle'])?></td>
				<td><?=$article['nomImageArticle']?></td>
				<td>
					 <div class="row">
							<form method ='post' action="formulaireModificationArticle">
								<input type="hidden" name="idArticle" value=<?=$article['idArticle']?>>
								<button class="btn btn-outline-success" type="submit">Modifier</button> 
							</form>	
							<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?=$article['idArticle']?>">
							Désactiver
						</button>
						<?php include 'adminDesactiverArticle.php' ?>
						
					</div>
				</td>
			</tr>
			 <?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Gestion des articles';
$content = ob_get_clean();
include 'includes/layout.php';
?>

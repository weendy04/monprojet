<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Article</th>
			<th scope="col">Prix unitaire</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($commandes as $commande):?>
			<tr>
				<td><?=$commande['nomArticle']?></td>
				<td><?=$commande['prixArticle']?></td>
				
			</tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Détails commande';
$content = ob_get_clean();
include 'includes/layout.php';
?>

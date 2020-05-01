<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Statut</th>
			<th scope="col">Prix total</th>
			<th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($commandes as $commande):?>
				<tr>
					<th scope="row"><?=$commande['idEnTeteCommande']?></th>
					<td><?=$commande['nomStatut']?></td>
					<td><?=$commande['prixTotal']?></td>
					<td><?=$commande['dateCommande']?></td>
					<td>
						<div class="row">
							<a href="<?= ROOT_PATH.'detailsCommande/'.$commande['idEnTeteCommande']?>" class="col btn btn-info add_cart">Détail</a> 
						</div>
					</td>
				</tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Gestion des commandes';
$content = ob_get_clean();
include 'includes/layout.php';
?>

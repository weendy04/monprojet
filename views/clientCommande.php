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
							<form method ='post' action="detailsCommandes">
									<input type="hidden" name="idEnTeteCommande" value=<?=$commande['idEnTeteCommande']?>>
									<button class="btn btn-outline-primary" type="submit">Détail</button>
							</form>	
							 
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

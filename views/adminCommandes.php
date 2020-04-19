<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">article</th>
            <th scope="col">Statut</th>
			<th scope="col">Prix total</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($commandes as $commande):?>
		
			<tr>
				<th scope="row"><?=$commande['idEnTeteCommande']?></th>
				<td><?=$commande['prenom']?> <?=$commande['nom']?></td>
				<td><?=$commande['nomStatut']?></td>
				<td><?//=$commande['Prix total']?></td>
				<td>
					<div class="row">
						<?php if($commande['idStatut'] != 3):?>		
							<form method ='get' action="commandeStatut">
								<input type="hidden" name="idStatut" value=<?=$commande['idStatut']?>>
								<button class="btn btn-outline-success" type="submit">Modifier statut</button>
							</form>
						<?php endif ?>
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

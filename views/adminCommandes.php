<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Statut</th>
			<th scope="col">Prix total</th>
			<th scope="col">Date</th>
            <th scope="col">Statut</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($commandes as $commande):?>
		
			<tr>
				<th scope="row"><?=$commande['idEnTeteCommande']?></th>
				<td><?=$commande['prenom']?> <?=$commande['nom']?></td>
				<td><?=$commande['nomStatut']?></td>
				<td><?=$commande['prixTotal']?></td>
				<td><?=$commande['dateCommande']?></td>
				<td>
					<div class="row">
						<?php if($commande['idStatut'] != 3):?>	 
							<?php if($commande['idStatut'] != 1):?>	 
								<form method ='post' action="statut">
									<input type="hidden" name="idEnTeteCommande" value=<?=$commande['idEnTeteCommande']?>>
									<input type="hidden" name="idStatut" value="1">
									<button class="btn btn-outline-success" type="submit">En cours</button>
								</form>
							<?php endif ?>
							<?php if($commande['idStatut'] != 2):?>	 
								<form method ='post' action="statut">
									<input type="hidden" name="idEnTeteCommande" value=<?=$commande['idEnTeteCommande']?>>
									<input type="hidden" name="idStatut" value="2">
									<button class="btn btn-outline-success" type="submit">En attente</button>
								</form>
							<?php endif ?>
							<form method ='post' action="statut">
								<input type="hidden" name="idEnTeteCommande" value=<?=$commande['idEnTeteCommande']?>>
								<input type="hidden" name="idStatut" value="3">
								<button class="btn btn-outline-success" type="submit">Envoyé</button>
							</form>
						<?php endif ?>
					</div>
				</td>
				<td>
					<form method ='post' action="detailsCommandes">
						<input type="hidden" name="idEnTeteCommande" value=<?=$commande['idEnTeteCommande']?>>
						<button class="btn btn-outline-primary" type="submit">Détail</button>
					</form>	 
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

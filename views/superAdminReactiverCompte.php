<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nom</th>
            <th scope="col">prenom</th>
            <th scope="col">email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($utilisateurs as $utilisateur):?>
			<?php if($utilisateur['isActive'] == 0):?>
				<tr>
					<th scope="row"><?=$utilisateur['idUtilisateur']?></th>
					<td><?=$utilisateur['nom']?></td>
					<td><?=$utilisateur['prenom']?></td>
					<td><?=$utilisateur['email']?></td>
					<td>
						 <div class="row">
							<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal<?=$utilisateur['idUtilisateur']?>">
								Réactiver
							</button>
							<?php include 'superAdminReactiverCompteUtilisateur.php' ?>
						</div>
					</td>
				</tr>
			<?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Gestion des clients désactivés';
$content = ob_get_clean();
include 'includes/layout.php';
?>

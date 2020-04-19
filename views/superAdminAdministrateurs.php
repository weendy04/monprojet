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
            <th scope="col">role</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($utilisateurs as $utilisateur):?>
			<?php if($utilisateur['idRole'] != 3 and $utilisateur['isActive'] == 1):?>
				<tr>
					<th scope="row"><?=$utilisateur['idUtilisateur']?></th>
					<td><?=$utilisateur['nom']?></td>
					<td><?=$utilisateur['prenom']?></td>
					<td><?=$utilisateur['email']?></td>
					<td><?=$utilisateur['idRole']?></td>
					<td>
						<div class="row">
							<?php if($_SESSION['idUtilisateur'] != $utilisateur['idUtilisateur']):?>
								<form >
									<input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
								</form>
								<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?=$utilisateur['idUtilisateur']?>">
									Supprimer
								</button>
								<?php include 'superAdminDesactiverAdmin.php' ?>
							<?php endif ?>
						</div>
					</td>
				</tr>
			<?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Gestion des administrateurs';
$content = ob_get_clean();
include 'includes/layout.php';
?>

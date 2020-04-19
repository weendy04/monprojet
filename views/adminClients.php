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
			<?php if($utilisateur['idRole'] == 3 and $utilisateur['isActive'] == 1):?>
				<tr>
					<th scope="row"><?=$utilisateur['idUtilisateur']?></th>
					<td><?=$utilisateur['nom']?></td>
					<td><?=$utilisateur['prenom']?></td>
					<td><?=$utilisateur['email']?></td>
					<td>
						 <div class="row">
							<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal<?=$utilisateur['idUtilisateur']?>">
								grader
							</button>
							<?phpinclude 'grader.php' ?>
							<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?=$utilisateur['idUtilisateur']?>">
								Supprimer
							</button>
							<?php include 'adminDesactiverClient.php' ?>
						</div>
					</td>
				</tr>
			<?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Gestion des clients';
$content = ob_get_clean();
include 'includes/layout.php';
?>

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
            <th scope="col">Promouvoir</th>
            <th scope="col">Désactiver</th>
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
						<form method ='post' action="role">
							<input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
							<input type="hidden" name="idRole" value="2">
							<button class="btn btn-outline-success" type="submit">Admin</button>
						</form>
					</td>
					<td>
						<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?=$utilisateur['idUtilisateur']?>">
							Désactiver
						</button>
						<?php include 'adminDesactiverClient.php' ?>
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

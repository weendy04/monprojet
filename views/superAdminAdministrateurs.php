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
			<th scope="col">Promouvoir</th>
            <th scope="col">Retrograder</th>
			<th scope="col">Désactiver</th>
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
					<?php if($_SESSION['idUtilisateur'] != $utilisateur['idUtilisateur']):?>
						<td>		
											
							<?php  if($utilisateur['idRole'] == 2):?>
								<!-- Promouvoir un utilisateur au grade supérieur -->		
								<form method ='post' action="role">
									<input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
									<input type="hidden" name="idRole" value="1">
									<button class="btn btn-outline-success" type="submit">Super admin</button>
								</form>
							<?php endif ?>
						</td>
						<td>
							<div class="row">
								<!-- Retrograder un super admin en admin -->
								<?php  if($utilisateur['idRole'] == 1):?>
									<form method ='post' action="role">
										<input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
										<input type="hidden" name="idRole" value="2">
										<button class="btn btn-outline-success" type="submit">Admin</button>
									</form>
								<?php endif ?>
								<!-- Retrograder un admin en client -->
								<form method ='post' action="role">
									<input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
									<input type="hidden" name="idRole" value="3">
									<button class="btn btn-outline-success" type="submit">Client</button>
								</form>
							</div>
						</td>
						<td>
							<!-- Désactive un utilisateur -->
							<form>
								<input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
							</form>
							<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?=$utilisateur['idUtilisateur']?>">
								Désactiver
							</button>
							<?php include 'superAdminDesactiverAdmin.php' ?>
						</td>
					<?php endif ?>
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

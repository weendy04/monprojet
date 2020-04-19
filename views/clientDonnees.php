<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
			<th scope="col">nom</th>
			<th scope="col">Prenom</th>
            <th scope="col">email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
			<td><?=$_SESSION['nom']?></td>
			<td><?=$_SESSION['prenom']?></td>
            <td><?=$_SESSION['email']?></td>
            <td>
                <div class="row">
					<a class="btn btn-outline-success" href="/formulaireModification">Modifier</a>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?= $_SESSION['idUtilisateur']?>">
                        Supprimer
                    </button>
                    <?php include 'clientSuppression.php' ?>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<?php
$title = 'Mes données';
$content = ob_get_clean();
include 'includes/layout.php';
?>
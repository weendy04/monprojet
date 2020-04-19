<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $utilisateur):?>
        <tr>
            <th scope="row"><?=$utilisateur['idUtilisateur']?></th>
            <td><?=$utilisateur['email']?></td>
            <td>
                <div class="row">
                    <form action="utilisateur">
                        <input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
                        <button class="btn btn-outline-success" type="submit">Editer</button>
                    </form>
                    <?php if($_SESSION['email'] != $utilisateur['email']):?>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?= $utilisateur['idUtilisateur']?>">
                        Supprimer
                    </button>
                    <?php include 'includes/delete_model.php' ?>
                    <?php endif ?>
                </div>
            </td>

        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Gestion des utilisateurs';
$content = ob_get_clean();
include 'includes/layout.php';
?>

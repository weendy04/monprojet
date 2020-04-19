<div class="modal fade" id="modal<?=$utilisateur['idUtilisateur']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Désactiver l'administrateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			Voulez-vous vraiment désactiver le compte admin <?=$utilisateur['idUtilisateur']?>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <form method="post" action="superAdminDesactiverAdmin">
            <input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
            <button class="btn btn-outline-danger" type="submit">Désactiver</button>
        </form>
      </div>

    </div>
  </div>
</div>
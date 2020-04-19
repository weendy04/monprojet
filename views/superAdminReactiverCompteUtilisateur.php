<div class="modal fade" id="modal<?=$utilisateur['idUtilisateur']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Réactivé l'utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			Voulez-vous vraiment réactiver le compte <?=$utilisateur['idUtilisateur']?>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <form method="post" action="superAdminReactiverCompteUtilisateur">
            <input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
            <button class="btn btn-outline-success" type="submit">Réactivé</button>
        </form>
      </div>

    </div>
  </div>
</div>
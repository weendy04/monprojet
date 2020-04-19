<div class="modal fade" id="modal<?= $utilisateur['idUtilisateur']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Monter de grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment monter de grade l'utilisateur ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="grader">
            <input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
            <button class="btn btn-outline-success" type="submit">Monter de grade</button>
        </form>
      </div>
    </div>
  </div>
</div>
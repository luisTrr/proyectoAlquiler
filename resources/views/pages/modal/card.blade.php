<div class="modal fade" id="Modalcard" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title" id="myModalLabel">DETALLES</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" name="id" value="{{ $publicacion->id }}">
          Aqui abra mas detalles de la publicacion...
        <p id="valor.id"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <div class="mx-4"></div>
        <!-- <button type="button" class="btn btn-danger eliminar" data-publicacion-id="{{ $publicacion->id }}">Eliminar</button> -->
      </div>
    </div>
  </div>
</div>
<script>
  var valorId = document.getElementById("id").value;

  document.getElementById("valor.id").innerText = "El valor del input es: " + valorId;
</script>

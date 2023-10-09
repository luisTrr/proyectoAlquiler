<div class="modal fade" id="Modaldelete" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Eliminar Publicación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="publicacionIdText"></p>
                <p id="mensajeEliminar"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="eliminarBtn" type="button" class="btn btn-success" data-publicacion-id="{{ $publicacion->id }}" onclick="eliminarPublicacion()">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script>
    
    function eliminarPublicacion() {
      var id = $('#eliminarBtn').data('publicacion-id')
        console.log('id publicacion:', id);
        // Enviar la solicitud DELETE para eliminar la publicación
        fetch(`/eliminar-publicacion`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Publicación eliminada correctamente:', data.message);
            $('#mensajeEliminar').text('Publicación eliminada correctamente').addClass('text-success').removeClass('text-danger');
        })
        .catch(error => {
            console.error('Error al eliminar la publicación:', id);
            $('#mensajeEliminar').text('Error al eliminar la publicación').addClass('text-danger').removeClass('text-success');
        });
    }
</script>

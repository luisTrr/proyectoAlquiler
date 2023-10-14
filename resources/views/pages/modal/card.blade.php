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
        <div id="detallePublicacion">
            <!-- Detalles de la publicación se cargarán aquí -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script>
    function mostrarDetalles(id) {
        fetch(`/ver/${id}/detalles`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            const publicacion = data.publicacion;
            const detalleHtml = `
                <img src="${publicacion.imagen}" class="card-img-top" alt="Imagen de la publicación">
                <p><strong>Título:</strong> ${publicacion.titulo}</p>
                <p><strong>Descripción:</strong> ${publicacion.descripcion}</p>
                <p><strong>Dirección:</strong> ${publicacion.direccion}</p>
                <p><strong>Precio:</strong> ${publicacion.precio}</p>
                <p><strong>Celular:</strong> ${publicacion.celular}</p>
                <!-- Agrega más detalles según tu estructura de datos -->
            `;
            document.getElementById('detallePublicacion').innerHTML = detalleHtml;
            $('#Modalcard').modal('close');
        })
        .catch(error => console.error('Error:', error));
    }
</script>


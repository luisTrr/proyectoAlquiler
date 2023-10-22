<div class="modal fade" id="Modaldelete" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title" id="myModalLabel">Eliminar Publicacion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if (isset($publicacion))
        ¿Estás seguro de que deseas eliminar esta publicación?
        @else
        <p>La publicación no se encontró o no está definida.</p>
        @endif
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <div class="mx-4"></div>
        @if (isset($publicacion))
        <button type="button" class="btn btn-danger eliminar" data-publicacion-id="{{ $publicacion->id }}">Eliminar</button>
        @endif
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const eliminarBotones = document.querySelectorAll('.eliminar');
    eliminarBotones.forEach(boton => {
        boton.addEventListener('click', function() {
            const publicacionId = this.dataset.publicacionId;
            
            // if (confirm('¿Estás seguro de que quieres eliminar esta publicación?')) {
            fetch(`/eliminar-publicacion/${publicacionId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    //alert(data.message);
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
            // }
        });
    });
});
</script>

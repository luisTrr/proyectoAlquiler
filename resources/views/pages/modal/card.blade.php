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
                    @foreach($publicaciones as $publicacion)
                      <tr>
                        <td>{{ $publicacion->id }}</td>
                        <td>{{ $publicacion->titulo }}</td>
                        <td>{{ $publicacion->direccion }}</td>
                        <td>{{ $publicacion->precio }}</td>
                      </tr>
                    @endforeach 
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
            const publicaciones = data.publicacion;
        })
        .catch(error => console.error('Error:', error));
    }
</script>


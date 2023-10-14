<div class="modal fade" id="Modalupdate" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title" id="myModalLabel">Editar Publicacion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('actualizar-publicacion') }}" method="POST" enctype="multipart/form-data">
        @method('PUT') <!-- Add this line to simulate a PUT request -->
        @csrf <!-- Add CSRF token for Laravel -->
        <input type="hidden" id="id" name="id" value="{{ $publicacion->id }}">
          <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" id="descripcion" name="descripcion" class="form-control">
          </div>
          <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" id="direccion" name="direccion" class="form-control">
          </div>
          <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control">
          </div>
          <!-- <div class="form-group">
              <label for="usuario_id">Usuario</label>
              <select id="usuario_id" name="usuario_id" class="form-control" required>
                  @foreach ($user as $OPC)
                      <option value="{{ $OPC->id }}">{{ $OPC->username }}</option>
                  @endforeach
              </select>
          </div> -->
          <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control">
          </div>
          <div class="form-group">
              <label for="opciones_alquiler_id">Opciones de Alquiler</label>
              <select id="opciones_alquiler_id" name="opciones_alquiler_id" class="form-control" required>
                  @foreach ($opcionesAlquiler as $OPC)
                      <option value="{{ $OPC->id }}">{{ $OPC->nombre_opcion }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="alquiler_anticretico_id">Opciones de Alquiler</label>
              <select id="alquiler_anticretico_id" name="alquiler_anticretico_id" class="form-control" required>
                  @foreach ($alquilerAnticretico as $OPC)
                      <option value="{{ $OPC->id }}">{{ $OPC->id }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="celular">Celular</label>
            <input type="number" id="celular" name="celular" class="form-control">
          </div>
          <!-- <div class="form-group">
            <h5>Recursos Disponibles</h5>
            <label for="luz">Luz</label>
            <input type="checkbox" id="luz" name="luz" class="form-check-label">  
          </div>
          <div class="form-group">
            <label for="agua">Agua</label>
            <input type="checkbox" id="agua" name="agua" class="form-check-label">
          </div>
          <div class="form-group">
            <label for="wifi">WiFi</label>
            <input type="checkbox" id="wifi" name="wifi" class="form-check-label">
          </div>--> 
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="editar">Editar</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- <script>
  document.getElementById('editar').addEventListener('click', function() {
    window.location.href = 'publicacion';
  });
</script> -->
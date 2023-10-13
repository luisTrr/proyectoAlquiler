<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title" id="myModalLabel">Crear Publicacion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('crear-publicacion') }}" method="POST" enctype="multipart/form-data">
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
              <label for="alquiler_anticretico_id">Alquiler o Anticretico</label>
              <select id="alquiler_anticretico_id" name="alquiler_anticretico_id" class="form-control" required>
                  @foreach ($alquilerAnticretico as $OPC)
                      <option value="{{ $OPC->id }}">{{ $OPC->id }}</option>
                  @endforeach
              </select>
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
          </div> -->
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" id="guardar">Guardar</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- <script>
  Handler para cuando se muestra el modal
  $('#Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var user = JSON.parse(button.data('user'));
    var opcionesAlquiler = JSON.parse(button.data('opciones-alquiler'));
    var alquilerAnticretico = JSON.parse(button.data('alquiler-anticretico'));

    console.log(user);
    console.log(opcionesAlquiler);
    console.log(alquilerAnticretico);

    Haz lo que necesites con las variables aquí dentro
  });

  Handler para el botón "Guardar"
</script> -->
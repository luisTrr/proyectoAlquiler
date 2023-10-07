<!-- <div class="container" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
                  <form>
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
                      <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control">
                      </div>
                      <div class="form-group">
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
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Atras</button>
                          <button type="button" class="btn btn-success" id="guardar">Guardar</button>
                      </div>
                  </form>
              </div>
<script>
  document.getElementById('guardar').addEventListener('click', function() {
    window.location.href = 'dashboard';
  });
</script> -->
<!-- resources/views/modal.blade.php -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Crear Publicacion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
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
          <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control">
          </div>
          <div class="form-group">
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
          </div>
                      <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Atras</button>
                          <button type="button" class="btn btn-success" id="guardar">Guardar</button>
                      </div> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardar">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById('guardar').addEventListener('click', function() {
    window.location.href = 'publicacion';
  });
</script>
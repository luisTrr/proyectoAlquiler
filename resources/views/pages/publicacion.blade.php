@extends('layouts.app')

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Publicaciones'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Crear Publicacion</h4>
                </div>
                <div class="container">
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
                      <button class="btn btn-success" type="button" id="guardar">Guardar</button>
                  </form>
              </div>
            </div>
        </div>
    </div>
  <script>
      document.getElementById('guardar').addEventListener('click', function() {
          window.location.href = 'dashboard'; // Reemplaza 'otra_vista.html' con la URL de la vista a la que deseas redirigir.
      });
  </script>
@endsection

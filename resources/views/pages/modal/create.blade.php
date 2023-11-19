<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog modal-lg" role="document">
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
            <!-- <a href="{{ route('mapa') }}" target="_blank"><i class="fa fa-map-marker text-success"></i></a> -->
            <div class="row">
              <div class="col-md-6">
                    <label for="longitud">Longitud</label>
                    <input type="text" id="longitud" name="longitud" class="form-control">
                </div>
              <div class="col-md-6">
                    <label for="latitud">Latitud</label>
                    <input type="text" id="latitud" name="latitud" class="form-control">
                </div>
              </div>
            </div>

              <div class="col-md-12">
                <div id="mapa" style="width: 100%; height: 400px;"></div>
              </div>
          </div>
          <div class="row mt-4 mx-4">
          <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control">
          </div>
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
                      <option value="{{ $OPC->id }}">{{ $OPC->nombreAlquiler }}</option>
                  @endforeach
              </select>
          </div>
          <!-- <div class="form-group">
              <label for="alquiler_anticretico_id">Alquiler o Anticretico:</label>
              <select id="alquiler_anticretico_id" name="alquiler_anticretico_id" class="form-control" required>
                  <option value="0">Alquiler</option>
                  <option value="1">Anticretico</option>
              </select>
          </div> -->
          <div class="form-group">
            <label for="celular">Celular</label>
            <input type="number" id="celular" name="celular" class="form-control">
          </div>

          <div class="form-group">
              <label>El precio incluye:</label><br>
              <input type="checkbox" name="recursos[luz]" value="1"> Luz<br>
              <input type="checkbox" name="recursos[agua]" value="1"> Agua<br>

              <label>Recursos adicionales (Se pagan aparte):</label><br>
              <input type="checkbox" name="recursos[aguaCaliente]" value="1"> Agua Caliente<br>
              <input type="checkbox" name="recursos[wifi]" value="1"> WiFi<br>
              <input type="checkbox" name="recursos[gasDomiciliario]" value="1"> Gas Domiciliario<br>
              
              <label>Permitir mascotas:</label><br>
              <input type="checkbox" name="recursos[mascotas]" value="1"> Mascotas<br>
              
              <label>Es residencia Adventista:</label><br>
              <input type="checkbox" name="recursos[residenciaAdventista]" value="1"> Residencia Adventista<br>
              
              <label>Se pide hora de llegada:</label><br>
              <input type="checkbox" name="recursos[horaDeLlegada]" value="1"> Hora de Llegada<br>
          </div>
          </div>          

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" id="guardar">Guardar</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<script>
    function iniciarMapa(){
      var latitud = -17.387444;
      var longitud = -66.317731;

      coordenadas = {
        lng: longitud,
        lat: latitud
      }

      generarMapa(coordenadas);
    }

    function generarMapa(coordenadas){
      var mapa = new google.maps.Map(document.getElementById('mapa'),
      {
        zoom: 15,
        center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
      });

      marcador = new google.maps.Marker({
        map: mapa,
        draggable: true,
        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
      });

      marcador.addListener('dragend',function(event){
        document.getElementById("latitud").value = this.getPosition().lat();
        document.getElementById("longitud").value = this.getPosition().lng();
      })
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>
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
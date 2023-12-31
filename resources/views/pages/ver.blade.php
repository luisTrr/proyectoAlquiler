<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DETALLES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- <link href="assets/css/nucleo-svg.css" rel="stylesheet" /> -->
    <!-- CSS Files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    /* body {
      background-color: black;
    } */
    .mx-n2 {
        margin: -0.5rem;
    }
    .custom-card{
      max-width: 5rem;
      height: 5rem;
      margin: 0.2
    }
    .custom-icon{
      font-size: 1.5rem;
    }
    .custom-card-body{
      padding: 0.2rem;
    }
    .custom-title{
      font-size: 1.2rem;
    }
    .card {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      margin-bottom: 20px;
      border: none;
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s;
    }

    /* .card:hover {
      transform: scale(1.20);
    } */
    .card-body {
      background-color: #ffffff;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
    }

    .card-title {
      font-size: 1.5em;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
    }

    .btn-back {
      background-color: #3498db;
      color: #fff;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn-back:hover {
      background-color: #2980b9;
    }

    .form-group {
      margin-bottom: 10px;
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    ul li {
      margin-bottom: 5px;
    }
  </style>
</head>
<body>

<!-- <div class="container"> -->
  <div class="row row-cols-2">
    <div class="col-4 mb-4">
      <div class="card">
        <img src="{{ asset('storage/imagenesPublicacion/' . basename($publicacion->imagen)) }}" class="card-img-top" alt="Imagen de la publicación">
        <div class="card-body">
          <div class="form-group">
            <strong class="card-title">Título:</strong>
            {{ $publicacion->titulo }}
          </div>
          <br>
          <div class="form-group">
            <strong>Descripción:</strong>
            {{ $publicacion->descripcion }}
          </div>
          <br>
          <div class="form-group">
            <strong>Dirección:</strong>
            {{ $publicacion->direccion }}
          </div>
          <br>
          <div class="form-group">
            <strong>Precio:</strong>
            {{ $publicacion->precio }}
          </div>
          <br>
          <div class="form-group">
            <strong>Celular:</strong>
            {{ $publicacion->celular }}
            <a href="https://wa.me/591{{ $publicacion->celular }}?text=Hola me intersa la publicacion" target="_blank"><i class="fa fa-whatsapp text-success"></i></a>
          </div>
          <br>
          <div class="form-group">
            <strong>Nombre Opción:</strong>
            {{ $publicacion->opcionesAlquiler->nombre_opcion }}
          </div>
          <br>
          <div class="form-group">
            <strong>Estado:</strong>
            {{ $publicacion->alquilerAnticretico->nombreAlquiler }}
          </div>
          
        </div>
        <div class="col-12 d-flex justify-content-center">
          <a href="{{ url()->previous() }}" class="btn btn-primary btn-back">Atrás</a>
        </div>
      </div>
    </div>
    <div class="col-8 mb-8">
      <div class="col-md-12">
        <div id="mapa" style="width: 100%; height: 390px;"></div>
      </div>
      <div class="form-group">
            <strong>El precio incluye:</strong>
            <div class="row">
              <div class="col-md-4">
                <div class="card custom-card mx-2 mb-2 bg-dark">
                  <div class="card-header mx-2 p-2 text-center">
                    @if ($recursos[0]->luz)
                    <div class="custom-icon bg-success shadow text-center border-radius-lg">
                      <i class="fas fa-lightbulb opacity-10"></i>
                    @else
                    <div class="custom-icon bg-danger shadow text-center border-radius-lg">
                      <i class="fas fa-lightbulb opacity-10"></i>
                    @endif
                    </div>
                    </div>
                      <h6 class="text-center mb-0 custom-title text-light">Luz</h6>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card custom-card mx-2 mb-2 bg-dark">
                  <div class="card-header mx-2 p-2 text-center">
                  @if ($recursos[0]->agua)
                  <div class="custom-icon bg-success shadow text-center border-radius-lg">
                    <i class="fas fa-tint opacity-10"></i>
                  @else
                  <div class="custom-icon bg-danger shadow text-center border-radius-lg">
                    <i class="fas fa-tint-slash opacity-10"></i>
                  @endif
                  </div>
                </div>
                  <h6 class="text-center mb-0 custom-title text-light">Agua</h6>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <strong>Recursos adicionales (Se pagan aparte):</strong>
            <div class="row">
              <div class="col-md-4">
                <div class="card custom-card mx-2 mb-2 bg-dark">
                  <div class="card-header mx-2 p-2 text-center">
                    @if ($recursos[0]->aguaCaliente)
                    <div class="custom-icon bg-success shadow text-center border-radius-lg">
                      <i class="fa fa-shower opacity-10"></i>
                    @else
                    <div class="custom-icon bg-danger shadow text-center border-radius-lg">
                      <i class="fa fa-shower opacity-10"></i>
                    @endif
                    </div>
                  </div>
                  <h6 class="text-center mb-0 custom-title text-light">Caliente</h6>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card custom-card mx-2 mb-2 bg-dark">
                  <div class="card-header mx-2 p-2 text-center">
                  @if ($recursos[0]->wifi)
                  <div class="custom-icon bg-success shadow text-center border-radius-lg">
                    <i class="fa fa-wifi opacity-10"></i>
                  @else
                  <div class="custom-icon bg-danger shadow text-center border-radius-lg">
                    <i class="fa fa-wifi opacity-10"></i>
                  @endif
                      </div>
                  </div>
                  <h6 class="text-center mb-0 custom-title text-light">Wifi</h6>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card custom-card mx-2 mb-2 bg-dark">
                  <div class="card-header mx-2 p-2 text-center">
                  @if ($recursos[0]->gasDomiciliario)
                  <div class="custom-icon bg-success shadow text-center border-radius-lg">
                    <i class="fas fa-gas-pump opacity-10"></i>
                  @else
                  <div class="custom-icon bg-danger shadow text-center border-radius-lg">
                    <i class="fas fa-gas-pump opacity-10"></i>
                  @endif
                  </div>
                  </div>
                  <h6 class="text-center mb-0 custom-title text-light">Gas</h6>
                  </div>
              </div>
            </div>
          </div>
          <div class="row row-cols-3">
          <div class="form-group">
            <strong>Permiten mascotas:</strong>
            <div class="row">
              <div class="col-md-3">
                <div class="card custom-card mx-2 mb-2 bg-dark">
                  <div class="card-header mx-2 p-2 text-center">
                  @if ($recursos[0]->mascotas)
                  <div class="custom-icon bg-success shadow text-center border-radius-lg">
                    <i class="fas fa-dog opacity-10"></i>
                  @else
                  <div class="custom-icon bg-danger shadow text-center border-radius-lg">
                    <i class="fas fa-dog opacity-10"></i>
                  @endif
                  </div>
                  </div>
                    <h6 class="text-center mb-0 custom-title text-light">Mascota</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <strong>Es Residencia Adventista:</strong>
            <div class="row">
              <div class="col-md-3">
                <div class="card custom-card mx-2 mb-2 bg-dark">
                  <div class="card-header mx-2 p-2 text-center">
                  @if ($recursos[0]->residenciaAdventista)
                  <div class="custom-icon bg-success shadow text-center border-radius-lg">
                    <i class="fas fa-home opacity-10"></i>
                  @else
                  <div class="custom-icon bg-danger shadow text-center border-radius-lg">
                    <i class="fas fa-home opacity-10"></i>
                  @endif
                  </div>
                  </div>
                    <h6 class="text-center mb-0 custom-title text-light">Casa</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <strong>Se pide hora de llegada:</strong>
            <div class="row">
              <div class="col-md-3">
                <div class="card custom-card mx-2 mb-2 bg-dark">
                  <div class="card-header mx-2 p-2 text-center">
                  @if ($recursos[0]->horaDeLlegada)
                  <div class="custom-icon bg-success shadow text-center border-radius-lg">
                    <i class="fa fa-clock-o opacity-10"></i>
                  @else
                  <div class="custom-icon bg-danger shadow text-center border-radius-lg">
                    <i class="fa fa-clock-o opacity-10"></i>
                  @endif
                  </div>
                  </div>
                    <h6 class="text-center mb-0 custom-title text-light">Hora</h6>
                </div>
              </div>
            </div>
          </div>
          </div>
          
    </div>
  </div>
<!-- </div> -->
<script>
    function iniciarMapa(){
      var latitud = {{ $publicacion->latitud }};
      var longitud = {{ $publicacion->longitud }};

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
        draggable: false,
        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
      });

      marcador.addListener('dragend',function(event){
        document.getElementById("latitud").value = this.getPosition().lat();
        document.getElementById("longitud").value = this.getPosition().lng();
      })
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>
</body>
</html>

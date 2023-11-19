@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Mapa'])
  <div class="row mt-4 mx-4">
    <div class="col-md-6">
      <div class="form-group">
        <label for="latitud">Latitud</label>
        <input type="text" id="latitud" class="form-control">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="longitud">Longitud</label>
        <input type="text" id="longitud" class="form-control">
      </div>
    </div>
  </div>

  <div class="row mt-4 mx-4">
    <div class="col-md-12">
      <div id="mapa" style="width: 100%; height: 700px;"></div>
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
        document.getElementById("longitud").value = this.getPosition().lat();
      })
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>

  @include('layouts.footers.auth.footer')

@endsection
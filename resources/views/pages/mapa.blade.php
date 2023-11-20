@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Mapa'])
    <div class="row mt-4 mx-4">
        <div class="col-md-12">
            <div id="mapa" style="width: 100%; height: 800px;"></div>
        </div>
    </div>

    <script>
    function cargarMapaScript() {
        return new Promise(function(resolve, reject) {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?callback=iniciarMapa';
            script.onload = resolve;
            script.onerror = reject;
            document.body.appendChild(script);
        });
    }

    function iniciarMapa() {
        var mapa = new google.maps.Map(document.getElementById('mapa'), {
            zoom: 15,
            center: new google.maps.LatLng(-17.387444, -66.317731),
        });

        // Obtener ubicación actual del usuario
        obtenerUbicacionActual(function(ubicacion) {
            var miUbicacion = {
                lat: ubicacion.coords.latitude,
                lng: ubicacion.coords.longitude
            };

            // Crear marcador para la ubicación actual
            var miMarcador = new google.maps.Marker({
                position: miUbicacion,
                map: mapa,
                title: 'Mi Ubicación',
                icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Cambiar a azul
            });
        });

        @foreach($publicaciones as $publicacion)
            @if($publicacion->estado == 1)
                var latitud_{{ $publicacion->id }} = {{ $publicacion->latitud }};
                var longitud_{{ $publicacion->id }} = {{ $publicacion->longitud }};
                var coordenadas_{{ $publicacion->id }} = {
                    lat: latitud_{{ $publicacion->id }},
                    lng: longitud_{{ $publicacion->id }},
                };
                var detalles_{{ $publicacion->id }} = {
                    titulo: '{{ $publicacion->titulo }}',
                    precio: '{{ $publicacion->precio }}',
                    celular: '{{ $publicacion->celular }}'
                };
                generarMapa(mapa, coordenadas_{{ $publicacion->id }}, detalles_{{ $publicacion->id }}, {{ $publicacion->id }});
            @endif
        @endforeach
    }

    function obtenerUbicacionActual(callback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(callback, function(error) {
                console.error('Error al obtener la ubicación:', error);
            });
        } else {
            console.error('La geolocalización no es compatible con este navegador.');
        }
    }

    function generarMapa(mapa, coordenadas, detalles, publicacionId) {
        var marcador = new google.maps.Marker({
            map: mapa,
            draggable: false,
            position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng),
        });

        // Agregar información adicional al marcador
        marcador.set('detalles', detalles);

        // Inicializar infoWindow fuera del evento para que pueda cerrarse más tarde
        var infoWindow = new google.maps.InfoWindow();

        // Agregar evento para mostrar ventana de información al pasar el ratón
        marcador.addListener('mouseover', function() {
            var contenido = '<strong>' + detalles.titulo + '</strong><br>' +
                            'Precio: ' + detalles.precio + '<br>' +
                            'Celular: ' + detalles.celular;

            infoWindow.setContent(contenido);
            infoWindow.open(mapa, marcador);
        });

        // Agregar evento de clic al marcador
        marcador.addListener('click', function() {
            // Obtener la URL con el ID de la publicación
            var url = '{{ route("ver", ":id") }}'.replace(':id', publicacionId);
            
            // Redirigir a la URL
            window.location.href = url;
        });

        // Agregar evento para cerrar ventana de información al quitar el ratón
        marcador.addListener('mouseout', function() {
            infoWindow.close();
        });
    }

    cargarMapaScript().then(function() {
        iniciarMapa();
    }).catch(function(error) {
        console.error('Error al cargar la API de Google Maps:', error);
    });
</script>





    @include('layouts.footers.auth.footer')
@endsection

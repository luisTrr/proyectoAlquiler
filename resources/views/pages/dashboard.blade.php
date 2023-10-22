@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Publicaciones'])
    <div class="container-fluid">
        <div class="card">

            <div class="card-header">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#" onclick="showTab(0)">
                            <i class="fa fa-align-justify"></i> Todos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#" onclick="showTab(1)">
                            <i class="fa fa-home"></i> Casas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#" onclick="showTab(2)">
                            <i class="fa fa-home"></i> Departamentos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#" onclick="showTab(3)">
                            <i class="fa fa-home"></i> Garzonier
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#" onclick="showTab(4)">
                            <i class="fa fa-home"></i> Cuartos
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
            <div id="tab0" class="tab-content">
                <div class="row">
                        @if (session('successMessage'))
                            <div class="alert alert-success">
                                {{ session('successMessage') }}
                            </div>
                        @endif

                        @if (session('errorMessage'))
                            <div class="alert alert-danger">
                                {{ session('errorMessage') }}
                            </div>
                        @endif
                        @foreach($publicaciones as $publicacion)
                        <div class="col-12 d-flex justify-content-center">
                            <div class="card mb-4 w-70 h-20">
                                <img src="{{ asset('storage/imagenesPublicacion/' . basename($publicacion->imagen)) }}" class="card-img-top" alt="Imagen de la publicación">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{ $publicacion->titulo }}</h5>
                                    <p class="card-text">{{ $publicacion->precio }} Bs</p>
                                    @if (Auth::check() && Auth::user()->hasGuardedPublication($publicacion->id))
                                        <a type="button" class="btn btn-primary" href="{{ route('ver',$publicacion->id) }}">Detalles</a>
                                        <a type="button" class="btn btn-danger" href="{{ route('eliminarGuardado', $publicacion->id) }}">Eliminar Guardado</a>
                                    @else
                                        <a type="button" class="btn btn-primary" href="{{ route('ver',$publicacion->id) }}">Detalles</a>
                                        <a type="button" class="btn btn-success" href="{{ route('guardarPublicacion', $publicacion->id) }}">Guardar</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                <div id="tab1" class="tab-content">
                    <h1>Casas</h1>
                    <div class="row ">
                        @foreach($publicaciones as $publicacion)
                        @if($publicacion->opciones_alquiler_id == 4)
                        <div class="col-12 d-flex justify-content-center">            
                                <div class="card mb-4 w-70 h-20">
                                <img src="{{ asset('storage/imagenesPublicacion/' . basename($publicacion->imagen)) }}" class="card-img-top" alt="Imagen de la publicación">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">{{ $publicacion->titulo }}</h5>
                                        <p class="card-text">{{ $publicacion->precio }} Bs</p> 
                                        <a type="button" class="btn btn-primary" href="{{ route('ver',$publicacion->id) }}">Detalles</a>
                                        <a href="#" class="btn btn-success">Guardar</a>
                                    </div>
                                </div>    
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

                <div id="tab2" class="tab-content">
                    <h1>Departamentos</h1>
                    <div class="row ">
                        @foreach($publicaciones as $publicacion)
                        @if($publicacion->opciones_alquiler_id == 2)
                        <div class="col-12 d-flex justify-content-center">            
                                <div class="card mb-4 w-70 h-20">
                                <img src="{{ asset('storage/imagenesPublicacion/' . basename($publicacion->imagen)) }}" class="card-img-top" alt="Imagen de la publicación">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">{{ $publicacion->titulo }}</h5>
                                        <p class="card-text">{{ $publicacion->precio }} Bs</p> 
                                        <a type="button" class="btn btn-primary" href="{{ route('ver',$publicacion->id) }}">Detalles</a>
                                        <a href="#" class="btn btn-success">Guardar</a>
                                    </div>
                                </div>    
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

                <div id="tab3" class="tab-content">
                    <h1>Garzoniers</h1>
                    <div class="row ">
                        @foreach($publicaciones as $publicacion)
                        @if($publicacion->opciones_alquiler_id == 3)
                        <div class="col-12 d-flex justify-content-center">            
                                <div class="card mb-4 w-70 h-20">
                                <img src="{{ asset('storage/imagenesPublicacion/' . basename($publicacion->imagen)) }}" class="card-img-top" alt="Imagen de la publicación">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">{{ $publicacion->titulo }}</h5>
                                        <p class="card-text">{{ $publicacion->precio }} Bs</p> 
                                        <a type="button" class="btn btn-primary" href="{{ route('ver',$publicacion->id) }}">Detalles</a>
                                        <a href="#" class="btn btn-success">Guardar</a>
                                    </div>
                                </div>    
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

                <div id="tab4" class="tab-content">
                    <h1>Cuartos</h1>
                    <div class="row ">
                        @foreach($publicaciones as $publicacion)
                        @if($publicacion->opciones_alquiler_id == 1)
                        <div class="col-12 d-flex justify-content-center">            
                                <div class="card mb-4 w-70 h-20">
                                <img src="{{ asset('storage/imagenesPublicacion/' . basename($publicacion->imagen)) }}" class="card-img-top" alt="Imagen de la publicación">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">{{ $publicacion->titulo }}</h5>
                                        <p class="card-text">{{ $publicacion->precio }} Bs</p> 
                                        <a type="button" class="btn btn-primary" href="{{ route('ver',$publicacion->id) }}">Detalles</a>
                                        <a href="#" class="btn btn-success">Guardar</a>
                                    </div>
                                </div>    
                        </div>
                        @endif
                        @endforeach
                    </div>

                </div>


            </div>

        </div>
    </div>
@include('pages.modal.card')
@include('layouts.footers.auth.footer')
@endsection
<script>
    function showTab(tabIndex) {
        for (let i = 0; i <= 4; i++) {
            document.getElementById('tab' + i).style.display = 'none';
        }
        document.getElementById('tab' + tabIndex).style.display = 'block';
    }
</script>


    <!-- <script src="./assets/js/plugins/chartjs.min.js"></script> -->
    
    <!-- <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script> -->

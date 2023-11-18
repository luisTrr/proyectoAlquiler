@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Estado'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Estado Publicacion
            </div>

                <div class="table-responsive">
                  <table class="table table-striped table-hover text-center" id="dataTable-1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Direccion</th>
                        <th>Estado</th>
                        <th width="280px">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($publicaciones as $publicacion)
                            <tr>
                                <td>{{ $publicacion->id }}</td>
                                <td>{{ $publicacion->titulo }}</td>
                                <td>{{ $publicacion->direccion }}</td>
                                <td>
                                    @if($publicacion->estado == 1)
                                        Habilitado
                                    @else
                                        Inhabilitado
                                    @endif
                                </td>
                                <td>
                                    @if ($publicaciones->count() > 0)
                                        <a href="{{ route('activarPublicacion',$publicacion->id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                                        <a href="{{ route('desactivarPublicacion',$publicacion->id) }}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach                        
                    </tbody>

                  </table>
                </div>
            </div>
        </div>
    </div>
  @include('layouts.footers.auth.footer')

@endsection


@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Publicaciones'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Publicacion
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modal" 
                        data-user="{{ json_encode($user )}}"
                        data-opciones-alquiler="{{ json_encode($opcionesAlquiler) }}" 
                        data-alquiler-anticretico="{{ json_encode($alquilerAnticretico) }}">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button>
            </div>

                <div class="container text-center">
                  <table class="table datatables" id="dataTable-1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th width="280px">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($publicaciones as $publicacion)
                      <tr>
                        <td>{{ $publicacion->id }}</td>
                        <td>{{ $publicacion->titulo }}</td>
                        <td>{{ $publicacion->descripcion }}</td>
                        <td>{{ $publicacion->precio }}</td>
                        <td>
                          <a type="button" class="btn btn-success" data-toggle="modal" data-target="#Modalread"><i class="fa fa-eye"></i></a>
                          <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modalupdate"><i class="fa fa-pencil"></i></a>
                          <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modaldelete"
                            data-publicacion-id="{{ $publicacion->id }}">
                            <i class="fa fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    @endforeach                        
                    </tbody>
                  </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Ant</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Sig</a></li>
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
  @include('pages.modal.create')
  @include('pages.modal.read')
  @include('pages.modal.update')
  @include('pages.modal.delete')
  @include('layouts.footers.auth.footer')
@endsection

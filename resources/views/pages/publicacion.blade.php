@extends('layouts.app')

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Publicaciones'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Publicacion
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modal">
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
                      <tr>
                        <td>1</td>
                        <td>Casa</td>
                          <td>Casa 300m2 4 cuartos y 2 baños</td>
                          <td>1500 Bs</td>
                          <td>
                            <a type="button" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                            <a type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                          </td>
                      </tr>                                            
                    </tbody>
                  </table>
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
    </div>
  <script>
      document.getElementById('guardar').addEventListener('click', function() {
          window.location.href = 'dashboard'; // Reemplaza 'otra_vista.html' con la URL de la vista a la que deseas redirigir.
      });
  </script>
  @include('pages.modal.create')
@endsection

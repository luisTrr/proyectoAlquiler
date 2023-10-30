@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Publicaciones'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Usuarios
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modal">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button>
            </div>

                <div class="table-responsive">
                  <table class="table table-striped table-hover text-center" id="dataTable-1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th width="280px">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $usuarios)
                      <tr>
                        <td>{{ $usuarios->id }}</td>
                        <td>{{ $usuarios->username }}</td>
                        <td>{{ $usuarios->lastname }}</td>
                        <td>{{ $usuarios->email }}</td>
                        <td>
                          
                          @if ($user->count() > 0)
                                <a href="" class="btn btn-success"  data-toggle="modal" data-target="#Modalupdate{{ $usuarios->id }}"><i class="fa fa-pencil"></i></a>

<!-- Modal UPDATE -->

<!-- Modal UPDATE -->



<!-- MODAL CREATE -->

<!-- MODAL CREATE -->

                                <a type="button" class="btn btn-danger" onclick="setEditModalId('{{ $usuarios->id }}')" data-toggle="modal" data-target="#Modaldelete"><i class="fa fa-trash"></i></a>
<!-- MODAL DELETE -->

<!-- MODAL DELETE -->            


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


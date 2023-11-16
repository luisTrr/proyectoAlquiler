
@php
    use Collective\Html\FormFacade as Form;
@endphp
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
                                <a href="" class="btn btn-success"  data-toggle="modal" data-target="#Modalupdate{{ $usuarios->id }}" data-roles="{{ json_encode($roles )}}"><i class="fa fa-pencil"></i></a>

<!-- Modal UPDATE -->
<div class="modal fade" id="Modalupdate{{ $usuarios->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title" id="myModalLabel">Asignar Rol a Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card">
        <div class="card-header">
        <p>{{$usuarios->username}}</p>
        </div>
        <div class="card-body">
          <h5>ROLES</h5>
          
          <form method="POST" action="{{ route('asignarRolUsuario', $usuarios) }}">
              @csrf
              @method('PUT')

              @foreach ($roles as $role)
              <div>
                  <label>
                      <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="mr-1" {{ $usuarios->hasAnyRole($role->id) ? 'checked' : '' }}>
                      {{ $role->name }}
                  </label>
              </div>
              @endforeach

              <button type="submit" class="btn btn-primary mt-3">Asignar Roles</button>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>
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


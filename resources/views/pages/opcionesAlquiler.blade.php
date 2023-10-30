@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Publicaciones'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Opciones Alquiler
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modal">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button>
            </div>

                <div class="table-responsive">
                  <table class="table table-striped table-hover text-center" id="dataTable-1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre de la Opcion</th>
                        <th width="280px">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($opciones as $opcion)
                      <tr>
                        <td>{{ $opcion->id }}</td>
                        <td>{{ $opcion->nombre_opcion }}</td>
                        <td>
                          
                          @if ($opciones->count() > 0)
                                <a href="" class="btn btn-success"  data-toggle="modal" data-target="#Modalupdate{{ $opcion->id }}"><i class="fa fa-pencil"></i></a>

<!-- Modal UPDATE -->

<!-- Modal UPDATE -->



<!-- MODAL CREATE -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title" id="myModalLabel">Crear Opcion Alquiler</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('crearOpcionAlquiler') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="titulo">Nombre Opcion</label>
            <input type="text" id="nombre_opcion" name="nombre_opcion" class="form-control">
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
<!-- MODAL CREATE -->

                                <a type="button" class="btn btn-danger" onclick="setEditModalId('{{ $opcion->id }}')" data-toggle="modal" data-target="#Modaldelete"><i class="fa fa-trash"></i></a>
<script>
    function setEditModalId(id) {

        const eliminarButton = document.querySelector('.eliminar');
        eliminarButton.dataset.opcionid = id;
    }
</script>
<!-- MODAL DELETE -->
<div class="modal fade" id="Modaldelete" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title" id="myModalLabel">Eliminar Publicacion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if (isset($opcion))
        ¿Estás seguro de que deseas eliminar esta publicación?
        @else
        <p>La publicación no se encontró o no está definida.</p>
        @endif
      </div>
      
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <div class="mx-4"></div>
        @if (isset($opcion))
        <button type="button" class="btn btn-danger eliminar" data-opcion-id="{{ $opcion->id }}">Eliminar</button>
        @endif
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const eliminarBotones = document.querySelectorAll('.eliminar');
    eliminarBotones.forEach(boton => {
        boton.addEventListener('click', function() {
            const opcionid = this.dataset.opcionid;
            
            // if (confirm('¿Estás seguro de que quieres eliminar esta publicación?')) {
            fetch(`/eliminar_opcion/${opcionid}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    //alert(data.message);
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
            // }
        });
    });
});
</script>
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


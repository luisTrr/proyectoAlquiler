@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Publicaciones'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Publicaciones UAB
                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modal" 
                        data-user="{{ json_encode($user )}}"
                        data-opciones-alquiler="{{ json_encode($opcionesAlquiler) }}" 
                        data-alquiler-anticretico="{{ json_encode($alquilerAnticretico) }}">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button> -->
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
                        <th width="280px">Habilitar Publicacion</th>
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
                          <!-- <a type="button" class="btn btn-success" onclick="mostrarDetalles({{ $publicacion->id }})" data-toggle="modal" data-target="#Modalcard"><i class="fa fa-eye"></i></a> -->
                          <!-- <a type="button" class="btn btn-success" data-toggle="modal" data-target="#Modalread"><i class="fa fa-eye"></i></a> -->
                          @if ($publicaciones->count() > 0)
                                <a href="" class="btn btn-success"  data-toggle="modal" data-target="#Modalupdate{{ $publicacion->id }}"><i class="fa fa-pencil"></i></a>

<!-- Modal UPDATE -->
<div class="modal fade" id="Modalupdate{{ $publicacion->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title" id="myModalLabel">Editar Publicacion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        @if (isset($publicacion))
            <form action="{{ route('actualizar-publicacion') }}" method="POST" enctype="multipart/form-data">
            @method('PUT') <!-- Add this line to simulate a PUT request -->
            @csrf <!-- Add CSRF token for Laravel -->
            <input type="hidden" id="id" name="id" value="{{ $publicacion->id }}">
              <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ $publicacion->titulo }}" >
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" rows="4" value="{{ $publicacion->descripcion }}">
              </div>
              <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ $publicacion->direccion }}">
              </div>
              <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" class="form-control" value="{{ $publicacion->precio }}">
              </div>
              <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="opciones_alquiler_id">Opciones de Alquiler</label>
                  <select id="opciones_alquiler_id" name="opciones_alquiler_id" class="form-control" required>
                      @foreach ($opcionesAlquiler as $OPC)
                          <option value="{{ $OPC->id }}">{{ $OPC->nombre_opcion }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="alquiler_anticretico_id">Alquiler o Anticretico</label>
                  <select id="alquiler_anticretico_id" name="alquiler_anticretico_id" class="form-control" required>
                      @foreach ($alquilerAnticretico as $OPC)
                          <option value="{{ $OPC->id }}">{{ $OPC->nombreAlquiler }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="celular">Celular</label>
                <input type="number" id="celular" name="celular" class="form-control" value="{{ $publicacion->celular }}">
              </div>
              <div class="form-group">

                  <label>El precio incluye:</label><br>
                  <input type="checkbox" name="recursos[luz]" value="1"> Luz<br>
                  <input type="checkbox" name="recursos[agua]" value="1"> Agua<br>

                  <label>Recursos adicionales (Se pagan aparte):</label><br>
                  <input type="checkbox" name="recursos[aguaCaliente]" value="1"> Agua Caliente<br>
                  <input type="checkbox" name="recursos[wifi]" value="1"> WiFi<br>
                  <input type="checkbox" name="recursos[gasDomiciliario]" value="1"> Gas Domiciliario<br>
                  
                  <label>Permitir mascotas:</label><br>
                  <input type="checkbox" name="recursos[mascotas]" value="1"> Mascotas<br>
                  
                  <label>Es residencia Adventista:</label><br>
                  <input type="checkbox" name="recursos[residenciaAdventista]" value="1"> Residencia Adventista<br>
                  
                  <label>Se pide hora de llegada:</label><br>
                  <input type="checkbox" name="recursos[horaDeLlegada]" value="1"> Hora de Llegada<br>
              </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="editar">Editar</button>
          </div>
            </form>
          @else
              <p>El usuario no tiene ninguna publicación para editar.</p>
          @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal UPDATE -->
                                
                                <a type="button" class="btn btn-danger" onclick="setDeleteModalId('{{ $publicacion->id }}')" data-toggle="modal" data-target="#Modaldelete"><i class="fa fa-trash"></i></a>
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
                <!-- <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">Ant</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Sig</a></li>
                  </ul>
                </nav> -->
            </div>
        </div>
    </div>
  @include('pages.modal.create')
  @include('pages.modal.delete')
  @include('layouts.footers.auth.footer')

@endsection
<script>
    function setEditModalId(id) {
        document.getElementById('id').value = id;

        const eliminarButton = document.querySelector('.eliminar');
        eliminarButton.dataset.publicacionId = id;
    }
</script>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const eliminarBotones = document.querySelectorAll('.eliminar');

        eliminarBotones.forEach(boton => {
            boton.addEventListener('click', function() {
                const publicacionId = this.dataset.publicacionId;

                if (confirm('¿Estás seguro de que quieres eliminar esta publicación?')) {
                    fetch(`/eliminar-publicacion/${publicacionId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            location.reload();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        });
    });
</script> -->

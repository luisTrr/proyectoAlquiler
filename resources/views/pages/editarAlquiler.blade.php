@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Publicaciones'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Publicaciones UAB
                
            </div>

                <div class="table-responsive">
                  <table class="table table-striped table-hover text-center" id="dataTable-1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th>Info Usuario</th>
                        <th width="280px">Opciones</th>
                        <th width="280px">Habilitar Publicacion</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($publicaciones as $publicacion)
                      <tr>
                        <td>{{ $publicacion->id }}</td>
                        <td>{{ $publicacion->titulo }}</td>
                        <td>
                            @if($publicacion->estado == 1)
                                Habilitado
                            @else
                                Inhabilitado
                            @endif
                        </td>
                        <td>
                            @if ($publicaciones->count() > 0)
                                <a href="" class="btn btn-success"  data-toggle="modal" data-target="#ModalinfoUsuario{{ $publicacion->id }}"><i class="fa fa-eye"></i></a>
                            @endif
                        </td>
                        <td>
                          <!-- <a type="button" class="btn btn-success" onclick="mostrarDetalles({{ $publicacion->id }})" data-toggle="modal" data-target="#Modalcard"><i class="fa fa-eye"></i></a> -->
                          <!-- <a type="button" class="btn btn-success" data-toggle="modal" data-target="#Modalread"><i class="fa fa-eye"></i></a> -->
                          @if ($publicaciones->count() > 0)
                                <a href="" class="btn btn-success"  data-toggle="modal" data-target="#Modalupdate{{ $publicacion->id }}"><i class="fa fa-pencil"></i></a>
<!-- Modal INFOUSUARIO -->
<div class="modal fade" id="ModalinfoUsuario{{ $publicacion->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title" id="myModalLabel">INFORMACION DEL USUARIO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Nombre:</strong> {{ $publicacion->usuario->firstname }} {{ $publicacion->usuario->lastname }}</p>
        <p><strong>Email:</strong> {{ $publicacion->usuario->email }}</p>
        <p><strong>Ciudad:</strong> {{ $publicacion->usuario->city }}</p>
        <p><strong>Direccion:</strong> {{ $publicacion->usuario->address }}</p>
        <p><strong>Celular:</strong> {{ $publicacion->usuario->postal }} <a href="https://wa.me/591{{ $publicacion->usuario->postal }}?text=Me comunico para verificar tu publicacion" target="_blank"><i class="fa fa-whatsapp text-success"></i></a></p>
      </div>
    </div>
 </div>
</div>
<!-- Modal INFOUSUARIO -->
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
                <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" value="{{ $publicacion->imagen }}">
              </div>
              <div class="form-group">
                  <label for="opciones_alquiler_id">Opciones de Alquiler</label>
                  <select id="opciones_alquiler_id" name="opciones_alquiler_id" class="form-control" required>
                      @foreach ($opcionesAlquiler as $OPC)
                          <option value="{{ $OPC->id }}" @if($publicacion->opciones_alquiler_id == $OPC->id) selected @endif>{{ $OPC->nombre_opcion }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="alquiler_anticretico_id">Alquiler o Anticretico</label>
                  <select id="alquiler_anticretico_id" name="alquiler_anticretico_id" class="form-control" required>
                      @foreach ($alquilerAnticretico as $OPC)
                          <option value="{{ $OPC->id }}" @if($publicacion->alquiler_anticretico_id == $OPC->id) selected @endif>{{ $OPC->nombreAlquiler }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="celular">Celular</label>
                <input type="number" id="celular" name="celular" class="form-control" value="{{ $publicacion->celular }}">
              </div>
              <div class="form-group">
                  <label>El precio incluye:</label><br>
                  <input type="checkbox" name="recursos[luz]" value="1" @if($publicacion->recursos->contains('luz', 1)) checked @endif> Luz<br>
                  <input type="checkbox" name="recursos[agua]" value="1" @if($publicacion->recursos->contains('agua', 1)) checked @endif> Agua<br>

                  <label>Recursos adicionales (Se pagan aparte):</label><br>
                  <input type="checkbox" name="recursos[aguaCaliente]" value="1" @if($publicacion->recursos->contains('aguaCaliente', 1)) checked @endif> Agua Caliente<br>
                  <input type="checkbox" name="recursos[wifi]" value="1" @if($publicacion->recursos->contains('wifi', 1)) checked @endif> WiFi<br>
                  <input type="checkbox" name="recursos[gasDomiciliario]" value="1" @if($publicacion->recursos->contains('gasDomiciliario', 1)) checked @endif> Gas Domiciliario<br>

                  <label>Permitir mascotas:</label><br>
                  <input type="checkbox" name="recursos[mascotas]" value="1" @if($publicacion->recursos->contains('mascotas', 1)) checked @endif> Mascotas<br>

                  <label>Es residencia Adventista:</label><br>
                  <input type="checkbox" name="recursos[residenciaAdventista]" value="1" @if($publicacion->recursos->contains('residenciaAdventista', 1)) checked @endif> Residencia Adventista<br>

                  <label>Se pide hora de llegada:</label><br>
                  <input type="checkbox" name="recursos[horaDeLlegada]" value="1" @if($publicacion->recursos->contains('horaDeLlegada', 1)) checked @endif> Hora de Llegada<br>
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
    function setDeleteModalId(id) {
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

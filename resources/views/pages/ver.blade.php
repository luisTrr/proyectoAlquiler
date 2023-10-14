<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DETALLES</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      body {
        background-color: black;
      }
    </style>
</head>
<body>
<div class="container">
  <div class="row mt-4 mx-4">
    <div class="col-12 d-flex justify-content-center">   
      <div class="card mb-4 w-100 h-20" style="width: 18rem;">
        <img src="{{ asset('storage/imagenesPublicacion/' . basename($publicacion->imagen)) }}" class="card-img-top" alt="...">
        <div class="card-body">
                            
          <div class="form-group">
              <strong>Titulo:</strong>
              {{ $publicacion->titulo }}
          </div>
          <div class="form-group">
              <strong>Descripcion:</strong>
              {{ $publicacion->descripcion }}
          </div>
          <div class="form-group">
              <strong>Direccion:</strong>
              {{ $publicacion->direccion }}
          </div>
          <div class="form-group">
              <strong>Precio:</strong>
              {{ $publicacion->precio }}
          </div>
          <div class="form-group">
              <strong>Celular:</strong>
              {{ $publicacion->celular }}
          </div>
          <div class="form-group">
              <strong>Nombre Opcion:</strong>
              {{ $publicacion->opcionesAlquiler->nombre_opcion }}
          </div>
          <div class="form-group">
            <strong>Estado:</strong>
            {{ $publicacion->alquilerAnticretico->estadoPublicacion }}
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mb-4">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Atras</a>
      </div>
    </div>
</div>
</body>
</html>
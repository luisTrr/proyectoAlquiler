<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DETALLES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    
    .card {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      margin-bottom: 20px;
      border: none;
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s;
    }

    .card:hover {
      transform: scale(1.20);
    }
    .card-body {
      background-color: #ffffff;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
    }

    .card-title {
      font-size: 1.5em;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
    }

    .btn-back {
      background-color: #3498db;
      color: #fff;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn-back:hover {
      background-color: #2980b9;
    }

    .form-group {
      margin-bottom: 10px;
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    ul li {
      margin-bottom: 5px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">   
      <div class="card">
        <img src="{{ asset('storage/imagenesPublicacion/' . basename($publicacion->imagen)) }}" class="card-img-top" alt="Imagen de la publicación">
        <div class="card-body">
          <div class="form-group">
            <strong class="card-title">Título:</strong>
            {{ $publicacion->titulo }}
          </div>
          <div class="form-group">
            <strong>Descripción:</strong>
            {{ $publicacion->descripcion }}
          </div>
          <div class="form-group">
            <strong>Dirección:</strong>
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
            <strong>Nombre Opción:</strong>
            {{ $publicacion->opcionesAlquiler->nombre_opcion }}
          </div>
          <div class="form-group">
            <strong>Estado:</strong>
            {{ $publicacion->alquilerAnticretico->nombreAlquiler }}
          </div>
          <div class="form-group">
            <strong>El precio incluye:</strong>
            <ul>
              <li>
                Luz: 
                @if ($recursos[0]->luz)
                  <i class="fas fa-check text-success"></i> Disponible
                @else
                  <i class="fas fa-times text-danger"></i> No Disponible
                @endif
              </li>
              <li>
                Agua: 
                @if ($recursos[0]->agua)
                  <i class="fas fa-check text-success"></i> Disponible
                @else
                  <i class="fas fa-times text-danger"></i> No Disponible
                @endif
              </li>
            </ul>    
          </div>
          <div class="form-group">
            <strong>Recursos adicionales (Se pagan aparte):</strong>
            <ul>
              <li>
                Agua Caliente: 
                @if ($recursos[0]->aguaCaliente)
                  <i class="fas fa-check text-success"></i> Disponible
                @else
                  <i class="fas fa-times text-danger"></i> No Disponible
                @endif
              </li>
              <li>
                Wifi: 
                @if ($recursos[0]->wifi)
                  <i class="fas fa-check text-success"></i> Disponible
                @else
                  <i class="fas fa-times text-danger"></i> No Disponible
                @endif
              </li>
              <li>
                Gas Domiciliario: 
                @if ($recursos[0]->gasDomiciliario)
                  <i class="fas fa-check text-success"></i> Disponible
                @else
                  <i class="fas fa-times text-danger"></i> No Disponible
                @endif
              </li>
            </ul>        
          </div>
          <div class="form-group">
            <strong>Permiten mascotas:</strong>
            <ul>
              <li>
                Mascotas: 
                @if ($recursos[0]->mascotas)
                  <i class="fas fa-check text-success"></i> Disponible
                @else
                  <i class="fas fa-times text-danger"></i> No Disponible
                @endif
              </li>
            </ul>
          </div>
          <div class="form-group">
            <strong>Es Residencia Adventista:</strong>
            <ul>
              <li>
                Residencia Adventista: 
                @if ($recursos[0]->residenciaAdventista)
                  <i class="fas fa-check text-success"></i> Disponible
                @else
                  <i class="fas fa-times text-danger"></i> No Disponible
                @endif
              </li>
            </ul>
          </div>
          <div class="form-group">
            <strong>Se pide hora de llegada:</strong>
            <ul>
              <li>
                Hora de Llegada: 
                @if ($recursos[0]->horaDeLlegada)
                  <i class="fas fa-check text-success"></i> Disponible
                @else
                  <i class="fas fa-times text-danger"></i> No Disponible
                @endif
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-back">Atrás</a>
      </div>
    </div>
</div>

</body>
</html>

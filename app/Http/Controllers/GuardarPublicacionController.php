<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guardarPublicacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GuardarPublicacionController extends Controller
{
    public function guardarPublicacion($id)
{
    // Obtener el usuario autenticado
    $usuario = Auth::user();

    // Crear la nueva instancia de guardarPublicacion
    $guardar = guardarPublicacion::create(['publicacion_id' => $id]);

    // Asociar la publicación guardada con el usuario a través de la relación
    $usuario->guardar_publicacions()->attach($guardar->id);
}

}

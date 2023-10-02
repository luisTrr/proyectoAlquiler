<?php

namespace App\Http\Controllers;
use App\Models\publicaciones;
use App\Models\Opciones_alquiler;
use App\Models\alquiler_anticretico;
use App\Models\Recursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PublicacionesController extends Controller
{
    // public function index(){
    //     $publicaciones = publicaciones::all();
    //     return ['publicaciones'=>$publicaciones];
    // }
    public function index()
    {
        $publicaciones = Publicaciones::all();

        if ($publicaciones->isEmpty()) {
            return response()->json(['message' => 'No hay publicaciones disponibles'], 404);
        }

        return response()->json(['publicaciones' => $publicaciones], 200);
    }
    public function create()
    {
        $recursos = Recursos::all();
        $opcionesAlquiler = Opciones_alquiler::all();
        $alquilerAnticretico = alquiler_anticretico::all();
        return ['recursos'=>$recursos, 'opcionesAlquiler'=>$opcionesAlquiler, 'alquilerAnticretico'=>$alquilerAnticretico];
    }
//     public function crearPublicacion(Request $request)
// {
//     // Validar los datos enviados desde el formulario
//         $request->validate([
//             'titulo' => 'required|max:100',
//             'descripcion' => 'required',
//             'direccion' => 'required|max:200',
//             'precio' => 'required|numeric|min:0',
//             //'imagen' => 'required|max:191',
//             'opciones_alquiler_id' => 'required|exists:opcionesAlquiler,id',
//             'alquiler_anticretico_id' => 'required|exists:alquilerAnticretico,id',
//         ]);

//         $usuario_id = Auth::id();

//         // Crear la nueva publicación
//         $publicacion = Publicaciones::create([
//             'titulo' => $request->titulo,
//             'descripcion' => $request->descripcion,
//             'direccion' => $request->direccion,
//             'precio' => $request->precio,
//             'usuario_id' => $usuario_id,
//             'imagen' => $request->imagen,
//             'opciones_alquiler_id' => $request->opciones_alquiler_id,
//             'alquiler_anticretico_id' => $request->alquiler_anticretico_id,
//         ]);

//         // Asociar recursos a la publicación
//         if ($request->has('recursos')) {
//             $publicacion->recursos()->attach($request->recursos);
//         }

//         // Responder con un JSON que contenga información sobre la publicación creada
//         return response()->json(['message' => 'Publicación creada exitosamente', 'publicacion' => $publicacion], 201);
//     }
public function crearPublicacion(Request $request)
{
    // Validar los datos enviados desde el formulario
    $request->validate([
        'titulo' => 'required|max:100',
        'descripcion' => 'required',
        'direccion' => 'required|max:200',
        'precio' => 'required|numeric|min:0',
        'usuario_id' => 'required|exists:users,id',
        //'imagen' => 'required|max:191',
        'opciones_alquiler_id' => 'required|exists:opciones_alquiler,id',
        'alquiler_anticretico_id' => 'required|exists:alquiler_anticretico,id',
    ]);

    // $usuario_id = Auth::id();
    // if (!$usuario_id) {
    //     return response()->json(['message' => 'No se pudo obtener el usuario autenticado', 'usuario'=> $usuario_id], 500);
    // }

    // Crear la nueva publicación
    $publicacion = Publicaciones::create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'direccion' => $request->direccion,
        'precio' => $request->precio,
        'usuario_id' => $request->usuario_id,
        'imagen' => $request->imagen,
        'opciones_alquiler_id' => $request->opciones_alquiler_id,
        'alquiler_anticretico_id' => $request->alquiler_anticretico_id,
    ]);

    // Asociar recursos a la publicación
    if ($request->has('recursos')) {
        $publicacion->recursos()->attach($request->recursos);
    }

    // Responder con un JSON que contenga información sobre la publicación creada
    return response()->json(['message' => 'Publicación creada exitosamente', 'publicacion' => $publicacion], 201);
}
public function actualizarPublicacion(Request $request)
{
    // Validar los datos enviados desde el formulario
    $request->validate([
        'id' => 'required|exists:publicaciones,id',
        'titulo' => 'required|max:100',
        'descripcion' => 'required',
        'direccion' => 'required|max:200',
        'precio' => 'required|numeric|min:0',
        'usuario_id' => 'required|exists:users,id',
        'opciones_alquiler_id' => 'required|exists:opciones_alquiler,id',
        'alquiler_anticretico_id' => 'required|exists:alquiler_anticretico,id',
    ]);

    $usuario_id = Auth::id();
    $id = $request->id;

    // Buscar la publicación por ID
    $publicacion = Publicaciones::find($id);

    if (!$publicacion) {
        return response()->json(['message' => 'Publicación no encontrada'], 404);
    }

    // Actualizar la publicación con los nuevos datos
    $publicacion->update([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'direccion' => $request->direccion,
        'precio' => $request->precio,
        'usuario_id' => $request->usuario_id,
        'imagen' => $request->imagen,
        'opciones_alquiler_id' => $request->opciones_alquiler_id,
        'alquiler_anticretico_id' => $request->alquiler_anticretico_id,
    ]);

    // Actualizar recursos asociados a la publicación
    if ($request->has('recursos')) {
        $publicacion->recursos()->sync($request->recursos);
    }

    // Responder con un JSON que contenga información sobre la publicación actualizada
    return response()->json(['message' => 'Publicación actualizada exitosamente', 'publicacion' => $publicacion], 200);
}
public function eliminarPublicacion(Request $request)
{
    // Validar los datos enviados desde el formulario
    $request->validate([
        'id' => 'required|exists:publicaciones,id',
    ]);

    $id = $request->id;

    // Buscar la publicación por ID
    $publicacion = Publicaciones::find($id);

    if (!$publicacion) {
        return response()->json(['message' => 'Publicación no encontrada'], 404);
    }

    // Eliminar la publicación
    $publicacion->delete();

    return response()->json(['message' => 'Publicación eliminada exitosamente'], 200);
}

    
}

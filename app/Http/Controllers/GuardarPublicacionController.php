<?php

namespace App\Http\Controllers;
use App\Models\publicaciones;
use App\Models\Opciones_alquiler;
use App\Models\alquiler_anticretico;
use App\Models\User;
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
        return redirect()->back()->with('successMessage', 'La publicación se ha guardado correctamente.');
    }
    public function eliminarGuardado($id)
    {
        // Obtener el usuario autenticado
        $usuario = Auth::user();

        // Buscar la instancia de guardarPublicacion por publicación_id
        $guardar = $usuario->guardar_publicacions()->where('publicacion_id', $id)->first();

        // Eliminar la relación
        if ($guardar) {
            $usuario->guardar_publicacions()->detach($guardar->id);
            guardarPublicacion::find($guardar->id)->delete();
            return redirect()->back()->with('successMessage', 'La publicación se ha eliminado de tus guardados.');
        }

        return redirect()->back()->with('errorMessage', 'La publicación no se encontraba en tus guardados.');
    }
    public function index()
    {
        $usuario_id = Auth::id();
        $usuario = User::find($usuario_id); 
        $publicaciones = Publicaciones::all();
        $guardados = $usuario->guardar_publicacions()->get();
        //$guardados = guardarPublicacion::all();
        //$recursos = Recursos::all();
        $opcionesAlquiler = Opciones_alquiler::all();
        $alquilerAnticretico = alquiler_anticretico::all();
        return view('pages.tables', compact('publicaciones','guardados','opcionesAlquiler','alquilerAnticretico'));
    }

}

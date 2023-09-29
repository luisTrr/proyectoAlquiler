<?php

namespace App\Http\Controllers;
use App\Models\publicaciones;
use App\Models\Opciones_alquiler;
use App\Models\alquiler_anticretico;
use App\Models\Recursos;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function index(){
        $publicaciones = publicaciones::all();
        return ['publicaciones'=>$publicaciones];
    }

    public function create()
    {
        $recursos = Recursos::all();
        $opcionesAlquiler = Opciones_alquiler::all();
        $alquilerAnticretico = alquiler_anticretico::all();
        return ['recursos'=>$recursos, 'opcionesAlquiler'=>$opcionesAlquiler, 'alquilerAnticretico'=>$alquilerAnticretico];
    }

    public function store(Request $request)
{
    // Validación de datos
    $request->validate([
        'titulo' => 'required|max:100',
        'descripcion' => 'required',
        'direccion' => 'required|max:200',
        'precio' => 'required|numeric|min:0',
        // ... Otras validaciones ...
    ]);

    DB::beginTransaction();

    try {
        // Crear la nueva publicación
        $publicacion = Publicaciones::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'direccion' => $request->direccion,
            'precio' => $request->precio,
            'opciones_alquiler_id' => $request->opciones_alquiler_id,
            // ... Otros campos ...
        ]);

        // Asociar recursos a la publicación
        if ($request->has('recursos')) {
            $publicacion->recursos()->attach($request->recursos);
        }

        DB::commit();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación creada exitosamente');
    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->withInput()->withErrors(['error' => 'Error en la transacción: ' . $e->getMessage()]);
    }
}

}

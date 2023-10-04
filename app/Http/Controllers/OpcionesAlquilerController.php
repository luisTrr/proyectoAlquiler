<?php

namespace App\Http\Controllers;
use App\Models\Opciones_alquiler;
use Illuminate\Http\Request;

class OpcionesAlquilerController extends Controller
{
    public function index()
    {
        $opciones = Opciones_alquiler::all();
        return response()->json(['opciones' => $opciones], 200);
    }
    public function crearOpcionAlquiler(Request $request)
    {
        $request->validate([
            'nombre_opcion' => 'required|max:50'
        ]);

        $opcion = Opciones_alquiler::create([
            'nombre_opcion' => $request->nombre_opcion
        ]);

        return response()->json(['message' => 'Opción de alquiler creada exitosamente', 'opcion' => $opcion], 201);
    }

    public function actualizarOpcionAlquiler(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:opciones_alquiler,id',
            'nombre_opcion' => 'required|max:50'
        ]);

        $opcion = Opciones_alquiler::find($request->id);

        if (!$opcion) {
            return response()->json(['message' => 'Opción de alquiler no encontrada'], 404);
        }

        $opcion->nombre_opcion = $request->nombre_opcion;
        $opcion->save();

        return response()->json(['message' => 'Opción de alquiler actualizada exitosamente', 'opcion' => $opcion], 200);
    }

    public function eliminarOpcionAlquiler(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:opciones_alquiler,id',
        ]);

        $opcion = Opciones_alquiler::find($request->id);

        if (!$opcion) {
            return response()->json(['message' => 'Opción de alquiler no encontrada'], 404);
        }

        $opcion->delete();

        return response()->json(['message' => 'Opción de alquiler eliminada exitosamente'], 200);
    }
}

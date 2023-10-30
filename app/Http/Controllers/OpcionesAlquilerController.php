<?php

namespace App\Http\Controllers;
use App\Models\Opciones_alquiler;
use Illuminate\Http\Request;

class OpcionesAlquilerController extends Controller
{
    public function index()
    {
        $opciones = Opciones_alquiler::all();
        return view('pages.opcionesAlquiler', compact('opciones'));
    }
    public function crearOpcionAlquiler(Request $request)
    {
        $request->validate([
            'nombre_opcion' => 'required|max:50'
        ]);

        $opcion = Opciones_alquiler::create([
            'nombre_opcion' => $request->nombre_opcion
        ]);

        return redirect()->route('opciones_alquiler');
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

    public function eliminarOpcionAlquiler($id)
    {

        $opcion = Opciones_alquiler::find($id);

        if (!$opcion) {
            return response()->json(['success' => true, 'message' => 'Opcion de alquiler no encontrada.']);
        }

        $opcion->delete();

        return response()->json(['success' => true, 'message' => 'Opcion de alquier eliminada exitosamente.']);
    }
}


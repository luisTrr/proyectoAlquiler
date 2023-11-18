<?php

namespace App\Http\Controllers;
use App\Models\publicaciones;
use App\Models\Opciones_alquiler;
use App\Models\alquiler_anticretico;
use App\Models\Recursos;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PublicacionesController extends Controller
{
    // public function index(){
    //     $publicaciones = publicaciones::all();
    //     return ['publicaciones'=>$publicaciones];
    // }
    public function editarAdmin(){
        //$user = Auth::user();
        $publicaciones = publicaciones::all();
        foreach ($publicaciones as $publicacion) {
            $usuario = User::find($publicacion->usuario_id);
            $publicacion->usuario = $usuario;
        }
        $opcionesAlquiler = Opciones_alquiler::all();
        $alquilerAnticretico = alquiler_anticretico::all();
        return view('pages.editarAlquiler', compact('publicaciones','opcionesAlquiler','alquilerAnticretico'));
    }
    public function index()
    {
        $user = Auth::user();
        $publicaciones = $user->publicaciones;
        $opcionesAlquiler = Opciones_alquiler::all();
        $alquilerAnticretico = alquiler_anticretico::all();
        return view('pages.publicacion', compact('publicaciones','user','opcionesAlquiler','alquilerAnticretico'));
    }
    // public function create()
    // {
        
    //     //return ['recursos'=>$recursos, 'opcionesAlquiler'=>$opcionesAlquiler, 'alquilerAnticretico'=>$alquilerAnticretico];
    //     return view('pages.modal.create', compact('recursos', 'opcionesAlquiler', 'alquilerAnticretico'));
    // }
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
        'imagen' => 'required|max:191',
        'opciones_alquiler_id' => 'required|exists:opciones_alquiler,id',
        'alquiler_anticretico_id' => 'required|exists:alquiler_anticretico,id',
        'celular' => 'required|numeric|min:7',
    ]);

    $usuario_id = Auth::id();

    if ($request->hasFile('imagen')) {
        // Guardar la imagen en la carpeta 'uploads' dentro de la carpeta 'public'
        $imagenPath = $request->file('imagen')->store('imagenesPublicacion', 'public');

        // Asignar la ruta de la imagen a la propiedad 'imagen'
        $imagenUrl = asset('storage/' . $imagenPath); // Genera la URL de la imagen
    } else {
        $imagenUrl = null; // Opcional: si no hay imagen, puedes asignar null o una ruta por defecto
    }

    // Crear la nueva publicación
    $publicacion = Publicaciones::create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'direccion' => $request->direccion,
        'precio' => $request->precio,
        'usuario_id' => $usuario_id,
        'imagen' => $imagenUrl,
        'opciones_alquiler_id' => $request->opciones_alquiler_id,
        'alquiler_anticretico_id' => $request->alquiler_anticretico_id,
        'celular' => $request->celular,
    ]);

    // Crear un nuevo recurso con los valores proporcionados
    $recurso = Recursos::create($request->input('recursos', []));

    // Asociar el recurso a la publicación
    $publicacion->recursos()->attach($recurso->id);

    // Responder con un JSON que contenga información sobre la publicación creada
    return redirect()->route('ver-publicacion');
}

public function actualizarPublicacion(Request $request)
{
    //dd($request->input('recursos', []));
    // Validar los datos enviados desde el formulario
    $request->validate([
        'id' => 'required|exists:publicaciones,id',
        'titulo' => 'required|max:100',
        'descripcion' => 'required',
        'direccion' => 'required|max:200',
        'precio' => 'required|numeric|min:0',
        'imagen' => 'required|max:191',
        //'usuario_id' => 'required|exists:users,id',
        'opciones_alquiler_id' => 'required|exists:opciones_alquiler,id',
        'alquiler_anticretico_id' => 'required|exists:alquiler_anticretico,id',
        'celular' => 'required|numeric|min:7',
    ]);

    $usuario_id = Auth::id();
    if ($request->hasFile('imagen')) {
        // Guardar la imagen en la carpeta 'uploads' dentro de la carpeta 'public'
        $imagenPath = $request->file('imagen')->store('imagenesPublicacion', 'public');

        // Asignar la ruta de la imagen a la propiedad 'imagen'
        $imagenUrl = asset('storage/' . $imagenPath); // Genera la URL de la imagen
    } else {
        $imagenUrl = null; // Opcional: si no hay imagen, puedes asignar null o una ruta por defecto
    }
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
        'usuario_id' => $usuario_id,
        'imagen' => $imagenUrl,
        'opciones_alquiler_id' => $request->opciones_alquiler_id,
        'alquiler_anticretico_id' => $request->alquiler_anticretico_id,
        'celular' => $request->celular,
    ]);

    // Obtén los nombres de los recursos disponibles
    $recursosDisponibles = [
        'aguaCaliente', 'wifi', 'gasDomiciliario', 'mascotas', 
        'luz', 'agua', 'residenciaAdventista', 'horaDeLlegada'
    ];

    // Inicializa un array con todos los recursos y establece su valor en "0"
    $recursos = array_fill_keys($recursosDisponibles, '0');

    // Recorre los datos del request y actualiza los valores correspondientes a "1"
    foreach ($request->input('recursos', []) as $recurso => $valor) {
        if (array_key_exists($recurso, $recursos)) {
            $recursos[$recurso] = $valor;
        }
    }

    // Muestra los datos actualizados
    //dd($recursos);

    // Resto de tu lógica
    $recursosIds = $publicacion->recursos()->pluck('recurso_id')->toArray();
    Recursos::whereIn('id', $recursosIds)->update($recursos);
    
    return redirect()->route('ver-publicacion');
}
// public function eliminarPublicacion(Request $request)
// {
    // Validar los datos enviados desde el formulario
    // $request->validate([
    //     'id' => 'required|exists:publicaciones,id',
    // ]);

    // $id = $request->id;

    // // Buscar la publicación por ID
    // $publicacion = Publicaciones::find($id);

    // if (!$publicacion) {
    //     return response()->json(['message' => 'Publicación no encontrada'], 404);
    // }

    // Eliminar la publicación
//     $publicacion->delete();

//     return response()->json(['message' => 'Publicación eliminada exitosamente'], 200);
// }
public function eliminarPublicacion($id)
{
    $publicacion = Publicaciones::find($id);

    if ($publicacion) {
        $publicacion->delete();
        return response()->json(['success' => true, 'message' => 'Publicación eliminada exitosamente.']);
    } else {
        return response()->json(['success' => false, 'message' => 'No se pudo encontrar la publicación.'], 404);
    }
}

    public function BuscarPublicacion(Request $request, $idOpcionesAlquiler)
    {
        // Resto del código para obtener datos según idAlmacen...
        $publicaciones = Publicaciones::where('opciones_alquiler_id', $idOpcionesAlquiler)->get();

        //return view('inventario', ['publicaciones' => $publicaciones]);
        return view('pages.dashboard', compact('publicaciones'));
    }
    public function asignarRol(){
        $user = User::all();
        $roles = Role::all();
        return view('pages.asignarRoles', compact('user','roles'));
    }
    public function asignarRolUsuario(Request $request, string $id){
        $user = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('asignarRol');
    }
    public function estadoPublicacion(){
        $user = Auth::user();
        $publicaciones = publicaciones::all();
        return view('pages.estado-publicacion', compact('publicaciones','user'));
    }
    public function activarPublicacion($id)
    {
        try {
            // Encuentra la publicación por su ID
            $publicacion = publicaciones::findOrFail($id);

            // Cambia el estado a 1
            $publicacion->estado = 1;

            // Guarda los cambios en la base de datos
            $publicacion->save();

            // Puedes agregar un mensaje de éxito o redireccionar a otra página
            return redirect()->route('editar-publicacion')->with('success', 'Estado de la publicación cambiado correctamente.');
        } catch (\Exception $e) {
            // Puedes manejar errores aquí, por ejemplo, redireccionar con un mensaje de error
            return redirect()->route('editar-publicacion')->with('error', 'Error al cambiar el estado de la publicación.');
        }
    }
    public function desactivarPublicacion($id)
    {
        try {
            // Encuentra la publicación por su ID
            $publicacion = publicaciones::findOrFail($id);

            // Cambia el estado a 0
            $publicacion->estado = 0;

            // Guarda los cambios en la base de datos
            $publicacion->save();

            // Puedes agregar un mensaje de éxito o redireccionar a otra página
            return redirect()->route('editar-publicacion')->with('success', 'Estado de la publicación cambiado correctamente.');
        } catch (\Exception $e) {
            // Puedes manejar errores aquí, por ejemplo, redireccionar con un mensaje de error
            return redirect()->route('editar-publicacion')->with('error', 'Error al cambiar el estado de la publicación.');
        }
    }
   
}
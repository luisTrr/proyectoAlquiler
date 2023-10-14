<?php

namespace App\Http\Controllers;
use App\Models\publicaciones;
use App\Models\Opciones_alquiler;
use App\Models\alquiler_anticretico;
use App\Models\Recursos;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    
    public function index()
    {
        $publicaciones = Publicaciones::all();
        //$recursos = Recursos::all();
        $opcionesAlquiler = Opciones_alquiler::all();
        $alquilerAnticretico = alquiler_anticretico::all();
        return view('pages.dashboard', compact('publicaciones','opcionesAlquiler','alquilerAnticretico'));
    }
    public function ver(Request $request, $id){
        // Obtén la publicación con el ID proporcionado
        $publicacion = Publicaciones::findOrFail($id);
        $opcionesAlquiler = Opciones_alquiler::all();
        $alquilerAnticretico = alquiler_anticretico::all();
        return view('pages.ver', compact('publicacion','opcionesAlquiler','alquilerAnticretico'));
        // return response()->json(['publicacion' => $publicacion]);
    }
    // public function CrearPublicacion()
    //     {
    //         $publicacionesController = new PublicacionesController();
    //         $create = $publicacionesController->create();
    //         return view('pages.dashboard', compact('create'));
    //     }

    // // public function CrearPublicacion(Request $request){
    // //     $publicacionesController = new PublicacionesController();
    // //     $response = $publicacionesController->create($request);
    // //     //return view('pages.user-management', compact('index'));
    // //     return redirect()->route('CrearPublicacion')->with('message', $response->getData()->message);
    // // }
    // public function store(Request $request)
    // {
    //     $publicacionesController = new PublicacionesController();
    //     $response = $publicacionesController->store($request);

    //     return redirect()->route('home')->with('message', $response->getData()->message);
    // }
}

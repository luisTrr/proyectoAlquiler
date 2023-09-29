<?php

namespace App\Http\Controllers;

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
        $publicacionesController = new PublicacionesController();
        $index = $publicacionesController->index();
        return view('pages.dashboard', compact('index'));
    }
    public function CrearPublicacion()
        {
            $publicacionesController = new PublicacionesController();
            $create = $publicacionesController->create();
            return view('pages.dashboard', compact('create'));
        }

    // public function CrearPublicacion(Request $request){
    //     $publicacionesController = new PublicacionesController();
    //     $response = $publicacionesController->create($request);
    //     //return view('pages.user-management', compact('index'));
    //     return redirect()->route('CrearPublicacion')->with('message', $response->getData()->message);
    // }
    public function store(Request $request)
    {
        $publicacionesController = new PublicacionesController();
        $response = $publicacionesController->store($request);

        return redirect()->route('home')->with('message', $response->getData()->message);
    }
}

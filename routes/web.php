<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;            
use App\Http\Controllers\PublicacionesController; 
use App\Http\Controllers\OpcionesAlquilerController;  
use App\Http\Controllers\GuardarPublicacionController;              

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
	Route::get('/create', [HomeController::class, 'create'])->name('create');
	Route::get('/ver/{id}', [HomeController::class, 'ver'])->name('ver');
	Route::post('/store', [HomeController::class, 'store'])->name('store');
	//PUBLICACIONES
	Route::get('/buscarPublicacion/{idOpcionesAlquiler}', [PublicacionesController::class, 'BuscarPublicacion'])->name('BuscarPublicacion');
	Route::get('/publicaciones-disponibles', [PublicacionesController::class, 'cards'])->name('publicaciones-disponibles');
	Route::get('/ver-publicacion', [PublicacionesController::class, 'index'])->name('ver-publicacion');
	Route::post('/crear-publicacion', [PublicacionesController::class, 'crearPublicacion'])->name('crear-publicacion');
	Route::put('/actualizar-publicacion', [PublicacionesController::class, 'actualizarPublicacion'])->name('actualizar-publicacion');
	Route::delete('/eliminar-publicacion/{id}', [PublicacionesController::class, 'eliminarPublicacion'])->name('eliminar-publicacion');
	//OPCIONES ALQUILER
	Route::get('opciones_alquiler', [OpcionesAlquilerController::class, 'index']);
	Route::post('opciones_alquiler', [OpcionesAlquilerController::class, 'crearOpcionAlquiler']);
	Route::put('opciones_alquiler', [OpcionesAlquilerController::class, 'actualizarOpcionAlquiler']);
	Route::delete('opciones_alquiler', [OpcionesAlquilerController::class, 'eliminarOpcionAlquiler']);
	//GUARDAR PUBLICACION
	Route::get('/guardar/{id}', [GuardarPublicacionController::class, 'guardarPublicacion'])->name('guardarPublicacion');
	Route::get('/eliminar/{id}', [GuardarPublicacionController::class, 'eliminarGuardado'])->name('eliminarGuardado');
	Route::get('tables', [GuardarPublicacionController::class, 'index'])->name('tables');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
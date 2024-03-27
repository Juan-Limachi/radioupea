<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PortadaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IntegranteController;

use App\Http\Controllers\TestController;
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

Route::get('/', [PortadaController::class, 'welcome'])->name('welcome');
Route::get('/portadaProgramas', [PortadaController::class, 'portadaProgramas'])->name('portadaProgramas');
Route::get('/portadaNoticias/{categoria}', [PortadaController::class, 'portadaNoticias'])->name('portadaNoticias');



Route::middleware('auth', 'verified')->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
    Route::get('/nuevoUsuario', [UserController::class, 'nuevoUsuario'])->name('nuevoUsuario');
    Route::post('/guardarNuevoUsuario', [UserController::class, 'guardarNuevoUsuario'])->name('guardarNuevoUsuario');
    Route::get('/editarUsuario/{id?}', [UserController::class, 'editarUsuario'])->name('editarUsuario');
    Route::post('/guardarEditarUsuario', [UserController::class, 'guardarEditarUsuario'])->name('guardarEditarUsuario');
    Route::get('/eliminarUsuario/{id?}', [UserController::class, 'eliminarUsuario'])->name('eliminarUsuario');
    Route::get('/restablecerCredenciales/{id?}', [UserController::class, 'restablecerCredenciales'])->name('restablecerCredenciales');
    Route::get('/activarUsuario/{id?}', [UserController::class, 'activarUsuario'])->name('activarUsuario');
});


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/integrantes', [IntegranteController::class, 'index'])->name('integrantes');
    Route::get('/nuevoIntegrante', [IntegranteController::class, 'nuevoIntegrante'])->name('nuevoIntegrante');
    Route::post('/guardarNuevoIntegrante', [IntegranteController::class, 'guardarNuevoIntegrante'])->name('guardarNuevoIntegrante');
    Route::get('editarIntegrante/{id_int?}', [IntegranteController::class, 'editarIntegrante'])->name('editarIntegrante');
    Route::post('/guardarEditarIntegrante', [IntegranteController::class, 'guardarEditarIntegrante'])->name('guardarEditarIntegrante');
    Route::get('/eliminarIntegrante/{id_int?}', [IntegranteController::class, 'eliminarIntegrante'])->name('eliminarIntegrante');

});


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias');
    Route::get('/nuevaNoticia', [NoticiaController::class, 'nuevaNoticia'])->name('nuevaNoticia');
    Route::post('/guardarNuevaNoticia', [NoticiaController::class, 'guardarNuevaNoticia'])->name('guardarNuevaNoticia');
    Route::get('/editarNoticia/{id_not?}', [NoticiaController::class, 'editarNoticia'])->name('editarNoticia');
    Route::post('/guardarEditarNoticia', [NoticiaController::class, 'guardarEditarNoticia'])->name('guardarEditarNoticia');
    Route::get('/eliminarNoticia/{id_not?}', [NoticiaController::class, 'eliminarNoticia'])->name('eliminarNoticia');
});


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/programas', [ProgramaController::class, 'index'])->name('programas');
    Route::get('/nuevoPrograma', [ProgramaController::class, 'nuevoPrograma'])->name('nuevoPrograma');
    Route::post('/guardarNuevoPrograma', [ProgramaController::class, 'guardarNuevoPrograma'])->name('guardarNuevoPrograma');
    Route::get('/editarPrograma/{id_not?}', [ProgramaController::class, 'editarPrograma'])->name('editarPrograma');
    Route::post('/guardarEditarPrograma', [ProgramaController::class, 'guardarEditarPrograma'])->name('guardarEditarPrograma');
    Route::get('/eliminarPrograma/{id_pro?}', [ProgramaController::class, 'eliminarPrograma'])->name('eliminarPrograma');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::post("save",[TestController::class, 'save'])->name("save");
// Route::get("test",[TestController::class, 'index'])->name("index");

require __DIR__ . '/auth.php';

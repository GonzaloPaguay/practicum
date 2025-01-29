<?php

use App\Http\Controllers\CategoryController;


use App\Http\Controllers\CitaMedicaController;
use App\Http\Controllers\EnfermedadController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\PacientesController;

use App\Models\Cliente;
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

//Route::get('/', function () {
//    return view('home');
//})->name('home');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//Route::get('/','App\http\Controllers\EnfermedadControler@index');

Route::resource('/cliente', ClienteController::class);
Route::resource('/medicos', MedicosController::class);
Route::resource('/citas_medicas', CitaMedicaController::class);
Route::resource('/especialidades', EspecialidadController::class);
Route::resource('/enfermedades', EnfermedadController::class);
Route::resource('/pacientes', PacientesController::class);

//Route::get('/','App\http\Controllers\EnfermedadControler@index');

//Route::resource('/citas_medicas', CitaMedicaController::class);
//Route::resource('/enfermedades', EnfermedadController::class)->parameters(['enfermedades' => 'enfermedad']);

//Route::resource('/enfermedades', EnfermedadController::class);

//Route::get('/create',[CategoryController::class,'guardar']);

//Route::get('/','App\http\Controllers\UsuarioController@index');




//Route::resource('citas_medicas', CitaMedicaController::class);
//Route::resource('enfermedades', EnfermedadController::class)->parameters(['enfermedades' => 'enfermedad']);







//Route::get('/', function () {
//    return view('/citas_medicas/create');
//});



require __DIR__.'/auth.php';

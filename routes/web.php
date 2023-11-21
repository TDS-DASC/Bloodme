<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

//Welcome
Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboardRuta');

Route::get('/usuarios', function () {
    return view('usuarios');
})->name('usuariosRuta');

Route::get('/campañas', function () {
    return view('campañas');
})->name('campañasRuta');

Route::get('/unidadesMedicas', function () {
    return view('unidades');
})->name('unidadesRuta');

Route::get('/prueba', function () {
    return view('saludoPlantilla');
});

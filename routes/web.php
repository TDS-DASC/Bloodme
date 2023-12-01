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

Route::get('/admin', function () {
    return view('adminDashboard');
})->name('adminDashboardRuta');

Route::get('/adminUsuarios', function () {
    return view('adminUsuarios');
})->name('adminUsuariosRutas');

Route::get('/adminCampañas', function () {
    return view('adminCampañas');
})->name('adminCampañasRutas');

Route::get('/adminCitas', function () {
    return view('adminCitas');
})->name('adminCitasRutas');
/*
Route::get('/adminDonantes', function () {
    return view('adminDonantes');
})->name('adminDonantesRutas');
*/
Route::get('/adminUnidades', function () {
    return view('adminUnidades');
})->name('adminUnidadesRutas');







Route::get('/', function () {
    return view('nuevoLogin');
})->name('loginHome'); // LOGIN NUEVO

Route::get('/registrar', function () {
    return view('registrarUsuario');
})->name('registrarRutas'); // REGISTAR CUENTA NUEVA

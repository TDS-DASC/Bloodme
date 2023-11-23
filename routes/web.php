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


Route::get('/prueba', function () {
    return view('saludoPlantilla');
});

Route::get('/', function () {
    return view('login');
})->name('login');



/** ------- RUTAS VIEJAS ----------*/
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





Route::get('/usuario', function () {
    return view('mainUsuarios');
})->name('usuariosMainRuta');

Route::get('/agendarDonatorio', function () {
    return view('registrarDonatorio');
})->name('agendarDonatorioRuta');

Route::get('/agendarCita', function () {
    return view('agendarCita');
})->name('agendarCitaRuta');


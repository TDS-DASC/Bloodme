<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Controladores ------------------------------------
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
//       -----------------------------------------------------------//


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Login ----------------------------------
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
// -----------------------------------------------------//

//Usuarios -------------------------------
Route::get('user/{id}', [UserController::class, 'showid']); // Muestra usuario por ID
Route::get('userrs/{input}/{looking}', ['UserController@showByInput']);
Route::get('users/', [UserController::class, 'showall']); // muestra todos los usuarios

Route::put('users/{id}', 'UserController@updateWID'); //UPDATE al usuario, ID se entrega mediante el link
Route::put('users/', 'UserController@update'); //UPDATE al usuario, ID se entrega por el request
Route::delete('users/{id}','UserController@delete');  //BORRAR USUARIO POR REQUEST
Route::delete('users/{id}','UserController@deleteWID');  //BORRAR USUARIO POR ID

// ----------------------------------------------------//

//Campañas -------------------------------
Route::get('campaigns/{id}', 'CampaignController@showid'); //Muestra campaña por su ID
Route::get('campaigns/', [CampaignController::class, 'showall']); //Muestra todas las camapañas

// ----------------------------------------------------//

//Donaciones -------------------------------
//Programadas
Route::get('showallDates', [DonationController::class, 'showallDates']);
//Donadas
Route::get('showallDonations', [DonationController::class, 'showallDonations']);
// ----------------------------------------------------//

//EjemploX -------------------------------
// ----------------------------------------------------//

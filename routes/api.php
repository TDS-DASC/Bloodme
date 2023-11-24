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
Route::get('users/{input}/{looking}', [UserController::class, 'showByInput']);
Route::get('users/', [UserController::class, 'showall']); // muestra todos los usuarios

Route::put('users/{id}', [UserController::class, 'updateWID']); //UPDATE al usuario, ID se entrega mediante el link
Route::put('users/', [UserController::class, 'update']); //UPDATE al usuario, ID se entrega por el request
Route::delete('users/',[UserController::class, 'delete']);  //BORRAR USUARIO POR REQUEST -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW
Route::delete('users/{id}',[UserController::class, 'deleteWID']);  //BORRAR USUARIO POR ID -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW

// ----------------------------------------------------//

//Campañas -------------------------------

Route::get('campana/{id}', [CampaignController::class, 'showid']);
Route::get('campaigns/{input}/{looking}', [CampaignController::class, 'showByInput']);
Route::get('campaigns/', [CampaignController::class, 'showall']); // muestra todos los usuarios

Route::put('campaigns/{id}', [CampaignController::class, 'updateWID']); //UPDATE al usuario, ID se entrega mediante el link
Route::put('campaigns/', [CampaignController::class, 'update']); //UPDATE al usuario, ID se entrega por el request
Route::delete('campaigns/',[CampaignController::class, 'delete']);  //BORRAR USUARIO POR REQUEST -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW
Route::delete('campaigns/{id}',[CampaignsController::class, 'deleteWID']);  //BORRAR USUARIO POR ID -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW

// ----------------------------------------------------//

//Donaciones -------------------------------
//Programadas
Route::get('showallDates', [DonationController::class, 'showallDates']);
//Donadas
Route::get('showallDonations', [DonationController::class, 'showallDonations']);
// ----------------------------------------------------//

//EjemploX -------------------------------
// ----------------------------------------------------//

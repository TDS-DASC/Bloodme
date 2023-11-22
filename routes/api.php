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
Route::get('showUser/{id}', [UserController::class, 'show']);
Route::get('showallUsers', [UserController::class, 'showall']);
// ----------------------------------------------------//

//Campañas -------------------------------
Route::get('showallCampaigns', [CampaignController::class, 'showall']);
// ----------------------------------------------------//

//Donaciones -------------------------------
//Programadas
Route::get('showallDates', [DonationController::class, 'showallDates']);
//Donadas
Route::get('showallDonations', [DonationController::class, 'showallDonations']);
// ----------------------------------------------------//

//EjemploX -------------------------------
// ----------------------------------------------------//

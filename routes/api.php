<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Controladores ------------------------------------
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonationDateController;
use App\Http\Controllers\CampaignMedicalUnitController;
use App\Http\Controllers\MedicalUnitController;
//use App\Models\Donation;

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

Route::group(['middleware'=> ['auth:sanctum']],function(){
    Route::post('logout', [AuthController::class, 'logout']);
});

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
Route::post('campaign/', [CampaignController::class, 'create']);

Route::get('campaign/{id}', [CampaignController::class, 'showid']);
Route::get('campaigns/{input}/{looking}', [CampaignController::class, 'showByInput']);
Route::get('campaigns/', [CampaignController::class, 'showall']); // muestra todas las campañas

Route::put('campaigns/{id}', [CampaignController::class, 'updateWID']); //UPDATE al CAMPAÑAS, ID se entrega mediante el link
Route::put('campaigns/', [CampaignController::class, 'update']); //UPDATE A LAS CAMPAÑAS, ID se entrega por el request
Route::delete('campaigns/',[CampaignController::class, 'delete']);  //BORRAR CAMPAÑAS POR REQUEST -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW
Route::delete('campaigns/{id}',[CampaignsController::class, 'deleteWID']);  //BORRAR CAMPAÑAS POR ID -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW

// ----------------------------------------------------//

//Donaciones -------------------------------
//Programadas
Route::post('donationdate/', [DonationDateController::class, 'create']);
Route::get('donationdate/{id}', [DonationDateController::class, 'showid']);
Route::get('donationsdate/{input}/{looking}', [DonationDateController::class, 'showByInput']);
Route::get('donationsdate/', [DonationDateController::class, 'showall']); // muestra todos las DONACIONES PROGRAMADAS

Route::put('donationsdate/{id}', [DonationDateController::class, 'updateWID']); //UPDATE A LA DONACION PROGRAMADA, ID se entrega mediante el link
Route::put('donationsdate/', [DonationDateController::class, 'update']); //UPDATE A LA DONACION PROGRAMADA, ID se entrega por el request
Route::delete('donationsdate/',[DonationDateController::class, 'delete']);  //BORRAR DONACIONES PROGRAMADAS POR REQUEST -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW
Route::delete('donationsdate/{id}',[DonationDateController::class, 'deleteWID']);  //BORRAR DONACIONES PROGRAMADAS POR ID -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW


//Donadas
Route::post('donation/', [DonationController::class, 'create']);

Route::get('donation/{id}', [DonationController::class, 'showid']);
Route::get('donations/{input}/{looking}', [DonationController::class, 'showByInput']);
Route::get('donations/', [DonationController::class, 'showall']); // muestra todos las DONACIONES

Route::put('donations/{id}', [DonationController::class, 'updateWID']); //UPDATE A LA DONACION, ID se entrega mediante el link
Route::put('donations/', [DonationController::class, 'update']); //UPDATE A LA DONACION, ID se entrega por el request
Route::delete('donations/',[DonationController::class, 'delete']);  //BORRAR DONACIONES POR REQUEST -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW
Route::delete('donations/{id}',[DonationController::class, 'deleteWID']);  //BORRAR DONACIONES POR ID -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW
// ----------------------------------------------------//


//CampaignMedicalUnit -------------------------------
Route::post('cmedicalunit/', [CampaignMedicalUnitController::class, 'create']);

Route::get('cmedicalunit/{id}', [CampaignMedicalUnitController::class, 'showid']);
Route::get('cmedicalunits/{input}/{looking}', [CampaignMedicalUnitController::class, 'showByInput']);
Route::get('cmedicalunits/', [CampaignMedicalUnitController::class, 'showall']); // muestra todos las mcunits

Route::put('cmedicalunits/{id}', [CampaignMedicalUnitController::class, 'updateWID']); //UPDATE A LA mcunits, ID se entrega mediante el link
Route::put('cmedicalunits/', [CampaignMedicalUnitController::class, 'update']); //UPDATE A LA mcunits, ID se entrega por el request
Route::delete('cmedicalunits/',[CampaignMedicalUnitController::class, 'delete']);  //BORRAR mcunits POR REQUEST -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW
Route::delete('cmedicalunits/{id}',[CampaignMedicalUnitController::class, 'deleteWID']);  //BORRAR mcunits POR ID -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW
// ----------------------------------------------------//

//MedicalUnits -------------------------------
Route::post('medunit/', [MedicalUnitController::class, 'create']);

Route::get('medunit/{id}', [MedicalUnitController::class, 'showid']);
Route::get('medunits/{input}/{looking}', [MedicalUnitController::class, 'showByInput']);
Route::get('medunits/', [MedicalUnitController::class, 'showall']); // muestra todos las DONACIONES

Route::put('medunits/{id}', [MedicalUnitController::class, 'updateWID']); //UPDATE A LA DONACION, ID se entrega mediante el link
Route::put('medunits/', [MedicalUnitController::class, 'update']); //UPDATE A LA DONACION, ID se entrega por el request
Route::delete('medunits/',[MedicalUnitController::class, 'delete']);  //BORRAR DONACIONES POR REQUEST -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW
Route::delete('medunits/{id}',[MedicalUnitController::class, 'deleteWID']);  //BORRAR DONACIONES POR ID -- NO DISPONIBLE -- LIMPIAR REFERENCIAS O LIMPIAR TABLA/ROW
// ----------------------------------------------------//


//EjemploX -------------------------------
// ----------------------------------------------------//

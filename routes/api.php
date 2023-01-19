<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::get('/equipments', [EquipmentController::class, 'index']);
Route::get('/equipments/{id}', [EquipmentController::class, 'show']);
Route::get('/equipments/search/{name}', [EquipmentController::class, 'search']);
Route::post('/login', [AuthController::class, 'login']);


//Protected Routes


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/equipments', [EquipmentController::class, 'store']);
    Route::put('equipments/{id}', [EquipmentController::class, 'update']);
    Route::delete('equipments/{id}', [EquipmentController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

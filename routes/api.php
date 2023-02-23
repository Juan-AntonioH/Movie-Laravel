<?php

use App\Http\Controllers\Api\DirectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MovieController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', [LoginController::class, 'login']);
Route::apiResource('movies',MovieController::class);
Route::get('movies/{id}/actors',[MovieController::class,'actors']);
Route::get('movies/{id}/directors',[MovieController::class,'directors'])->middleware('role:admin');
Route::apiResource('directors',DirectorController::class);


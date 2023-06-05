<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\AdministradorController;
use App\Http\Controllers\v1\SecurityController;
use App\Http\Controllers\v1\UsersController;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/...', function () {
    return $ request->user();
});

*/

Route::middleware(['auth:api'])->group(function () {

});

Route::post('/v1/seguridad/login',[SecurityController::class,'login']);
Route::post('/v1/users',[UsersController::class,'users']);
Route::get('/v1/administrador',[AdministradorController::class,'getAll']);
Route::get('/v1/administrador/{id}',[AdministradorController::class,'getItem']);
Route::post('/v1/administrador',[AdministradorController::class,'store']);
Route::put('/v1/administrador',[AdministradorController::class,'putUpdate']);
Route::patch('/v1/administrador',[AdministradorController::class,'patchUpdate']);
Route::delete('/v1/administrador/{id}',[AdministradorController::class,'delete']);


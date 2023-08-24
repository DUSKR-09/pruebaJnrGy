<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\UsuarioAPIController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('/usuarios/create', [UsuarioAPIController::class, 'store']);
Route::post('/usuarios/update/{id}', [UsuarioAPIController::class, 'update']);

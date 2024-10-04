<?php

use App\Http\Controllers\GameController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{id}', [GameController::class, 'show']);
Route::post('/games/create', [GameController::class, 'store']);
Route::put('/games/update/{id}', [GameController::class, 'update']);
Route::delete('/games/{id}', [GameController::class, 'destroy']);
Route::get('/games/genre/{genreId}', [GameController::class, 'getGamesByGenre']);

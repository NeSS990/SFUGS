<?php

use Api\ApiGameController;
use App\Http\Controllers\Api\ApiTournamentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiRegisterController;
use App\Http\Controllers\Api    \ApiLoginController;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiAuthController;


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

Route::get('/games/{gameId}/tournaments', [ApiTournamentController::class, 'getTournamentsByGame']);
Route::get('/tournaments/{tournamentId}', [ApiTournamentController::class, 'show']);
Route::get('/user/{userId}/tournaments', [ApiUserController::class, 'getUserTournaments']);
Route::apiResources([
    'games'=>ApiGameController::class,
    'tournaments'=>ApiTournamentController::class,
]);
Route::post('/tournaments/{tournamentId}/participation', [ApiTournamentController::class, 'createParc']);
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/user', [ApiAuthController::class, 'user']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

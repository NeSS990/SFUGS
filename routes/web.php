<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/tournament/create-parc', 'TournamentController@post')->name('create-parc');
Route::get('/', 'WelcomeController@index');
Route::get('/user', 'UserController@index')->name('user');
Route::get('/genres','GenreController@index');
Route::get('/genres/create','GenreController@create');
Route::get('/genres/update','GenreController@update');
Route::get('/genres/delete','GenreController@delete');
Route::get('tournament/{id}', 'TournamentController@show')->name('tournament.show');
Route::resource('tournaments', 'TournamentController');
Route::resource('games','GameController');
Route::post('/update-record', 'TournamentController@post2')->name('update.record');
Auth::routes();

Route::middleware(['role:admin'])->prefix('admin_panel')->group( function(){
    Route::get('/', [App\Http\Controllers\admin\HomeController::class, 'index'])->name('homeAdmin');
});



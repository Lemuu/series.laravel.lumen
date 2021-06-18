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
Route::get('series', 'SeriesController@index')
    ->name('series.index');

Route::get('series/create', 'SeriesController@create')
    ->name('series.create')
    ->middleware('series.auth');

Route::post('series/create', 'SeriesController@store')
    ->name('series.store')
    ->middleware('series.auth');

Route::delete('series/{id}', 'SeriesController@destroy')
    ->name('series.destroy')
    ->middleware('series.auth');

Route::post('series/{id}/editName', 'SeriesController@editName')
    ->name('series.editName')
    ->middleware('series.auth');

Route::get('series/seasons/{serieId}', 'SeasonsController@index')
    ->name('series.seasons.index');
    
Route::get('series/seasons/episodes/{seasonId}', 'EpisodesController@index')
    ->name('series.seasons.episodes.index');
    
Route::post('series/seasons/episodes/{seasonId}/watch', 'EpisodesController@watch')
    ->name('series.seasons.episodes.watch')
    ->middleware('series.auth');

Route::get('/join', 'JoinController@index')
    ->name('join');

Route::post('/join', 'JoinController@login')
    ->name('join.login');

Route::get('/registrar', 'RegisterController@index')
    ->name('registrar');

Route::post('/registrar', 'RegisterController@store')
    ->name('registrar.store');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/join');
});
    
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

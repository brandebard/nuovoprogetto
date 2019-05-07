<?php
use App\Models\Album;
use App\Models\Photo;
use App\User;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tables', function () {
    return view('tables');
});

Route::get('/tables', 'Controller@visualizzaAlbum');

Route::get('/chart', function () {
    return view('chart');
});

Route::get('/albums', 'AlbumsController@index');
Route::get('/albums/{id}/delete', 'AlbumsController@delete');
Route::get('/albums/{id}/edit', 'AlbumsController@edit');
Route::patch('/albums/{id}', 'AlbumsController@store');


Route::get('/chart', 'StatisticController@retriveStatistic');


Route::get('/photos', function() {
return Photo::all();
});

Route::get('/users', 'UtentiController@show');
Route::get('/users/{id}/delete', 'UtentiController@delete');
Route::get('/users/{id}/edit', 'UtentiController@edit');
Route::patch('/users/{id}', 'UtentiController@store');
Route::post('/users/insert', 'UtentiController@insert');

Route::get('/inserisciutente', function () {
    return view('inserisciutente');
});

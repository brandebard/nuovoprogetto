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
Route::get('/chart', 'StatisticController@retriveStatistic');


Route::get('/photos', function() {
return Photo::all();
});

Route::get('/users', function() {
return User::all();
});

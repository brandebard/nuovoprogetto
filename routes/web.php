<?php
use App\Models\Album;
use App\Models\Photo;
use App\User;



Route::get('/movies', 'MoviesController@findMovie');


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/tables', function () {
    return view('tables');
});

Route::get('/cercafilm', function () {
    return view('cercafilm');
});


Route::get('/tables', 'Controller@visualizzaAlbum');

Route::get('/chart', function () {
    return view('chart');
});

Route::get('/albums', 'AlbumsController@index');
Route::get('/home', 'AlbumsController@index');
Route::get('/albums/{id}/delete', 'AlbumsController@delete');
Route::get('/albums/{id}/edit', 'AlbumsController@edit');
Route::patch('/albums/{id}', 'AlbumsController@store');
Route::get('/albums/{id}/images', 'AlbumsController@viewImages');

Route::get('/chart', 'StatisticController@retriveStatistic');


Route::get('/photos', function() {
return Photo::all();
});
Route::get('/albums/{id}/deletephotos', 'AlbumsController@deletephotos');



Route::get('/users', 'UtentiController@show');
Route::get('/users/{id}/delete', 'UtentiController@delete');
Route::get('/users/{id}/edit', 'UtentiController@edit');
Route::patch('/users/{id}', 'UtentiController@store');
Route::post('/users/insert', 'UtentiController@insert');

Route::get('/inserisciutente', function () {
    return view('inserisciutente');
});

Route::get('usernoalbums',function(){
return DB::table('users as u')->leftJoin('albums as a','a.user_id','u.id')
->select('name','email','u.id')->whereNull('a.album_name')
->get();
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

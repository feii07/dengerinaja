<?php

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

//Member
Route::get('/members','MemberController@all');
Route::get('/members/{id}','MemberController@show');
Route::post('/members','MemberController@store');
Route::put('/members/{id}','MemberController@update');
Route::delete('/members/{id}','MemberController@delete');
Route::get('/login/{id}','MemberController@login');

//Artist
Route::get('/artists','ArtistController@all');
Route::get('/artists/{id}','ArtistController@show');
Route::post('/artists','ArtistController@store');
Route::put('/artists/{id}','ArtistController@update');
Route::delete('/artists/{id}','ArtistController@delete');

//Song
Route::get('/songs','SongController@all');
Route::get('/songs/{id}','SongController@show');
Route::post('/songs','SongController@store');
Route::put('/songs/{id}','SongController@update');
Route::delete('/songs/{id}','SongController@delete');

//Sub
Route::get('/subs','SubController@all');
Route::get('/subs/{id}','SubController@show');
Route::post('/subs','SubController@store');
Route::put('/subss/{id}','SubController@update');
Route::delete('/subs/{id}','SubController@delete');

//Comment
Route::get('/comment','CommentController@all');
Route::get('/comment/{id}','CommentController@show');
Route::post('/comment','CommentController@store');
Route::put('/comment/{id}','CommentController@update');
Route::delete('/comment/{id}','CommentController@delete');

//Genre
Route::get('/genres','GenreController@all');

//Sub
Route::get('/sub','SubController@all');
Route::get('/sub/{id}','SubController@show');
Route::post('/sub','SubController@store');
Route::put('/sub/{id}','SubController@update');
Route::delete('/sub/{id}','SubController@delete');
Route::delete('/sub/{id}/{genre}','SubController@deleteGenre');
<?php

use Illuminate\Http\Request;

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


// Api Index
Route::get('/', function(){
    return response()->json(['message' => 'Funny API', 'status' => 'Connected']);
});


// Api Videos
Route::resource('video', 'VideosController', ['except' => ['create', 'edit']]);


// Api Playlists
Route::resource('playlist', 'PlaylistsController', ['except' => ['create', 'edit']]);


// Se a rota não existir
Route::fallback(function(){
    return response()->json(['message' => 'Page Not Found. If error persists, contact contato@betacoding.com.br'], 404);
});

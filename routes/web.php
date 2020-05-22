<?php

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

Route::get('/', function () {
	return redirect("/home");
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Characters
Route::resource("characters", "CharacterController")->middleware("auth");

// Rooms
Route::resource("rooms", "RoomController")->middleware("auth");

// Messages
Route::get("/messages/{roomId}/fetch", "ChatMessageController@index")->middleware("auth");
Route::post("/messages/{roomId}/store", "ChatMessageController@store")->middleware("auth");

Route::post("/rooms/{id}/addCharacter", "RoomController@addCharacter")->middleware("auth");

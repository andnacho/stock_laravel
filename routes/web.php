<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{user:email}', function(\App\User $user) {
   return $user;
});

Route::get('/test', function() {

	return "saludos";
});

Route::get('/test2', function() {


	return \App\User::all();
});

Route::get('/item/{product}', fn($product) => Http::get("https://api.mercadolibre.com/sites/MCO/search?q={$product}")->json());

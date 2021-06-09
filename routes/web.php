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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//category
Route::resource('category', App\Http\Controllers\CategoryController::class)->middleware('auth');
Route::resource('food', App\Http\Controllers\FoodController::class)->middleware('auth');;
Route::get('/', [App\Http\Controllers\FoodController::class, 'listFood']);
Route::get('/detail/{id}', [App\Http\Controllers\FoodController::class, 'view'])->name('food.view');

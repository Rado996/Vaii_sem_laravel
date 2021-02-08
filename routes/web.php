<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuItemController;
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

//defaultna stranka
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/menu_items', 'MenuItemController@index');

Route::get('/menu_items', [MenuItemController::class, 'index']);
Route::get('/menu_items/add', [MenuItemController::class, 'add']);
//Route::post('/menu_items/add', [MenuItemController::class, 'add_item']);
Route::get('/menu_items/edit', [MenuItemController::class, 'edit']);




<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhotoController;
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
Route::get('/menu_items', [MenuItemController::class, 'index'])->name('menu_items.index');
Route::get('/menu_items/add', [MenuItemController::class, 'add']);
Route::post('/menu_items/add', [MenuItemController::class, 'add_item']);
Route::patch('/menu_items/{menuItem}/update', [MenuItemController::class, 'edit_item'])->name('item.edit_item');
Route::get('/menu_items/{menuItem}/edit', [MenuItemController::class, 'edit'])->name('item_edit');
Route::delete('/menu_items/{menuItem}/delete', [MenuItemController::class, 'delete'])->name('item_delete');

Route::get('/Photos', [PhotoController::class, 'index'])->name('photos.index');
Route::get('/Photos/add', [PhotoController::class, 'add'])->name('photos.add');
Route::post('/Photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::get('/Photos/{id}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
Route::patch('/Photos/{id}/update', [PhotoController::class, 'update'])->name('photos.update');
Route::delete('/Photos/{id}/delete', [PhotoController::class, 'delete'])->name('photos.delete');

Route::get('/Comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/Comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::patch('/Comments/update/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::get('/Comments/delete/{comment}', [CommentController::class, 'destroy'])->name('comments.delete');













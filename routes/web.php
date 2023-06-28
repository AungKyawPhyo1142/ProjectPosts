<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/',[PostController::class,'mainPage'])->name('posts#mainPage');

Route::post('posts/create',[PostController::class,'inputData'])->name('posts#inputData');
Route::post('posts/update/{id}',[PostController::class,'updateData'])->name('posts#updateData');

Route::get('posts/delete/{id}',[PostController::class,'deleteData'])->name('posts#deleteData');

Route::get('posts/show/{id}',[PostController::class,'showData'])->name('posts#showData');

Route::get('posts/edit/{id}',[PostController::class,'editPage'])->name('posts#editPage');

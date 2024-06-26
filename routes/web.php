<?php

use App\Http\Controllers\FormController;
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

Route::get('/insert-data',[FormController::class,'create'])->name('insert.data');
Route::post('/submit-data',[FormController::class,'store'])->name('store');
Route::get('/',[FormController::class,'show'])->name('show.data');
Route::get('/edit-data/{id}',[FormController::class,'edit'])->name('edit.data');
Route::put('/update/{data_id}',[FormController::class,'update'])->name('update.data');
Route::get('/delete/{id}',[FormController::class,'destroy'])->name('delete.data');
Route::resource('forms','FormController');


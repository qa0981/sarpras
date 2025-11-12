<?php

use App\Http\Controllers\HomeController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/sarpras', [App\Http\Controllers\SarprasController::class, 'index'])->name('sarpras.index');


Route::resource('pengaduan', \App\Http\Controllers\PengaduanController::class);
Route::resource('sarpras', \App\Http\Controllers\SarprasController::class);

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index']);
});

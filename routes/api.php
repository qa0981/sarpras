<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\SarprasController;
use App\Http\Controllers\PengaduanController;

// =====================
// AUTH
// =====================
=======
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SarprasController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::resource('sarpras', \App\Http\Controllers\SarprasController::class);
Route::resource('pengaduan', \App\Http\Controllers\PengaduanController::class);

Route::get('/sarpras', [SarprasController::class, 'index']);
Route::post('/sarpras', [SarprasController::class, 'store']);

Route::resource('sarpras', SarprasController::class)->parameters([
    'sarpras' => 'id'
]);


>>>>>>> Stashed changes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// =====================
// USER (LOGIN WAJIB)
// =====================
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // USER hanya boleh LIHAT sarpras
    Route::get('/sarpras', [SarprasController::class, 'index']);
    Route::get('/sarpras/{id}', [SarprasController::class, 'show']);

    // USER kirim & lihat pengaduan sendiri
    Route::post('/pengaduan', [PengaduanController::class, 'store']);
    Route::get('/pengaduan', [PengaduanController::class, 'index']);
    Route::get('/pengaduan/{id}', [PengaduanController::class, 'show']);
});

// =====================
// ADMIN ONLY
// =====================
Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {

    // ADMIN CRUD sarpras
    Route::post('/sarpras', [SarprasController::class, 'store']);
    Route::put('/sarpras/{id}', [SarprasController::class, 'update']);
    Route::delete('/sarpras/{id}', [SarprasController::class, 'destroy']);

    // ADMIN kelola pengaduan (status + feedback)
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'update']);
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy']);
});

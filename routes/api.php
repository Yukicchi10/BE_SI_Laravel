<?php

use App\Http\Controllers\API\AuthenticatedControllerM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\MahasiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Siswa
Route::get('/auth/mahasiswas', [MahasiswaController::class, 'index']);
Route::get('/auth/edit-mahasiswa/{id}', [MahasiswaController::class, 'show']);
Route::put('/auth/update-mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/auth/hapus-mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
Route::post('/auth/register-mahasiswa', [MahasiswaController::class, 'register']);

Route::post('/auth/me', [AuthenticatedControllerM::class, 'me']);
Route::post('/auth/login', [AuthenticatedControllerM::class, 'login']);
Route::post('/auth/logout', [AuthenticatedControllerM::class, 'logout']);
Route::post('/auth/refresh', [AuthenticatedControllerM::class, 'refresh']);
//Route::post('/auth/logout', [AuthenticatedControllerMahasiswa::class, 

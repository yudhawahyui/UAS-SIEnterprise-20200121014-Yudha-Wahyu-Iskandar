<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AbsenController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\KontrakController;
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\MatakuliahController;
use App\Http\Controllers\Api\MahasiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| API List :
| http://127.0.0.1:8000/api/mahasiswa
| http://127.0.0.1:8000/api/matakuliah
| http://127.0.0.1:8000/api/jadwal
|
|
*/

Route::resources([
    'mahasiswa' => MahasiswaController::class,
    'matakuliah' => MatakuliahController::class,
    'absen' => AbsenController::class,
    'jadwal' => JadwalController::class,
    'kontrak' => KontrakController::class,
    'semester' => SemesterController::class,
]);

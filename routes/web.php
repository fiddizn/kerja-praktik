<?php

use App\Models\Koordinator;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HasilReviewController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\FormBimbinganController;
use App\Http\Controllers\RegisterSeminarController;
use App\Http\Controllers\Detail_MahasiswaController;
use App\Http\Controllers\List_pendaftaran_ta_1Controller;
use App\Http\Controllers\List_pendaftaran_seminar_ta_1Controller;

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

// Route::get('/', function () {
//     return 'Halaman Login';
// });

// Mahasiswa

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa/pendaftaran-ta-1', [RegisterController::class, 'index']);

Route::post('/mahasiswa/pendaftaran-ta-1', [RegisterController::class, 'store']);

Route::get('/mahasiswa/hasil-review', [HasilReviewController::class, 'index']);

Route::get('/mahasiswa/form-bimbingan', [FormBimbinganController::class, 'index']);

Route::get('/mahasiswa/pendaftaran-seminar-ta-1', [RegisterSeminarController::class, 'index']);

Route::post('/mahasiswa/pendaftaran-seminar-ta-1', [RegisterSeminarController::class, 'store']);

//Koordinator

Route::get('/koordinator', [KoordinatorController::class, 'index']);

Route::get('/koordinator/list-pendaftaran-ta-1', [List_pendaftaran_ta_1Controller::class, 'index']);

Route::get('/koordinator/list-pendaftaran-ta-1/detail-mahasiswa-{pendaftaran_id}', [Detail_MahasiswaController::class, 'index']);

Route::get('/koordinator/list-pendaftaran-seminar-ta-1', [List_pendaftaran_seminar_ta_1Controller::class, 'index']);
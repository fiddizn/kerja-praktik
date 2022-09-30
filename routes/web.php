<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HasilReviewController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\FormBimbinganController;
use App\Http\Controllers\Jadwal_seminarController;
use App\Http\Controllers\Plotting_dosen_pembimbing;
use App\Http\Controllers\RegisterSeminarController;
use App\Http\Controllers\Detail_MahasiswaController;
use App\Http\Controllers\Penilaian_seminarController;
use App\Http\Controllers\ListPendaftaranTA1Controller;
use App\Http\Controllers\Hasil_review_proposalController;
use App\Http\Controllers\List_pendaftaran_ta_1Controller;
use App\Http\Controllers\Plotting_dosen_pengujiController;
use App\Http\Controllers\Plotting_dosen_reviewerController;
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

Route::group(['middleware' => 'auth'], function () {

    // Sesi Mahasiswa

    Route::group(['middleware' => 'role:Mahasiswa'], function () {
        Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

        Route::get('/mahasiswa/pendaftaran-ta-1', [PendaftaranController::class, 'index']);

        Route::post('/mahasiswa/pendaftaran-ta-1', [PendaftaranController::class, 'store']);

        Route::get('/mahasiswa/pendaftaran-ta-1/status', [PendaftaranController::class, 'status']);
    });

    // Sesi Koordinator

    Route::group(['middleware' => 'role:Koordinator'], function () {
        Route::get('/koordinator', [KoordinatorController::class, 'index']);

        Route::resource('/koordinator/list-pendaftaran-ta-1', ListPendaftaranTA1Controller::class);
    });
    Route::group(['middleware' => 'role:Pembimbing 1'], function () {
        Route::get('/pembimbing-1', function () {
            return 'Hallo Pembimbing 1 emailmu adalah ' . auth()->user()->email;
        });
    });
    Route::group(['middleware' => 'role:Pembimbing 2'], function () {
        Route::get('/pembimbing-2', function () {
            return 'Hallo Pembimbing 2 emailmu adalah ' . auth()->user()->email;
        });
    });
    Route::group(['middleware' => 'role:Penguji 1'], function () {
        Route::get('/penguji-1', function () {
            return 'Hallo Penguji 1 emailmu adalah ' . auth()->user()->email;
        });
    });
    Route::group(['middleware' => 'role:Penguji 2'], function () {
        Route::get('/penguji-2', function () {
            return 'Hallo Penguji 2 emailmu adalah ' . auth()->user()->email;
        });
    });
    Route::group(['middleware' => 'role:Admin'], function () {
        Route::get('/admin', function () {
            return 'Hallo Admin emailmu adalah ' . auth()->user()->email;
        });
    });
    Route::group(['middleware' => 'role:TU'], function () {
        Route::get('/tu', function () {
            return 'Hallo TU emailmu adalah ' . auth()->user()->email;
        });
    });
});

// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
// Register

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Login

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout']);

// // Mahasiswa

// Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('auth');



// Route::get('/mahasiswa/hasil-review', [HasilReviewController::class, 'index']);

// Route::get('/mahasiswa/form-bimbingan', [FormBimbinganController::class, 'index']);

// Route::get('/mahasiswa/form-bimbingan/bimbingan-{x}', [FormBimbinganController::class, 'show']);

// Route::post('/mahasiswa/form-bimbingan/bimbingan-{x}', [FormBimbinganController::class, 'store']);

// Route::get('/mahasiswa/pendaftaran-seminar-ta-1', [RegisterSeminarController::class, 'index']);

// Route::post('/mahasiswa/pendaftaran-seminar-ta-1', [RegisterSeminarController::class, 'store']);

// //Koordinator


// Route::resource('/koordinator/list-pendaftaran-ta-1', ListPendaftaranTA1Controller::class);

// Route::get('/koordinator/list-pendaftaran-ta-1/detail-mahasiswa-{pendaftaran_id}/{status}', [Detail_MahasiswaController::class, 'show']);

// Route::get('/koordinator/list-pendaftaran-seminar-ta-1', [List_pendaftaran_seminar_ta_1Controller::class, 'index']);

// Route::get('/koordinator/plotting-dosen-pembimbing', [Plotting_dosen_pembimbing::class, 'index']);

// Route::get('/koordinator/plotting-dosen-pembimbing/{id}', [Plotting_dosen_pembimbing::class, 'show']);

// Route::get('/koordinator/plotting-dosen-reviewer', [Plotting_dosen_reviewerController::class, 'index']);

// Route::get('/koordinator/plotting-dosen-reviewer/{id}', [Plotting_dosen_reviewerController::class, 'show']);

// Route::get('/koordinator/plotting-dosen-penguji', [Plotting_dosen_pengujiController::class, 'index']);

// Route::get('/koordinator/plotting-dosen-penguji/{id}', [Plotting_dosen_pengujiController::class, 'show']);

// Route::get('/koordinator/jadwal-seminar', [Jadwal_seminarController::class, 'index']);

// Route::post('/koordinator/jadwal-seminar', [Jadwal_seminarController::class, 'store']);
// //
// Route::get('/koordinator/hasil-review-proposal', [Hasil_review_proposalController::class, 'index']);

// Route::get('/koordinator/hasil-review-proposal/{id}', [Hasil_review_proposalController::class, 'show']);

// Route::get('/koordinator/penilaian-seminar', [Penilaian_seminarController::class, 'index']);

// Route::get('/koordinator/penilaian-seminar/{id}', [Penilaian_seminarController::class, 'show']);
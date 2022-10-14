<?php

use LDAP\Result;
use App\Models\Pembimbing1;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HasilReviewController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\FormBimbinganController;
use App\Http\Controllers\Jadwal_seminarController;
use App\Http\Controllers\Plotting_dosen_pembimbing;
use App\Http\Controllers\RegisterSeminarController;
use App\Http\Controllers\Detail_MahasiswaController;
use App\Http\Controllers\ProposalReviewedController;
use App\Http\Controllers\Penilaian_seminarController;
use App\Http\Controllers\BimbinganMahasiswaController;
use App\Http\Controllers\ListPendaftaranTA1Controller;
use App\Http\Controllers\Hasil_review_proposalController;
use App\Http\Controllers\List_pendaftaran_ta_1Controller;
use App\Http\Controllers\PlottingDosenReviewerController;
use App\Http\Controllers\Plotting_dosen_pengujiController;
use App\Http\Controllers\Plotting_dosen_reviewerController;
use App\Http\Controllers\PlottingDosenPembimbingController;
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
// Register

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Login

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'store']);

// Logout

Route::post('/logout', [LoginController::class, 'logout']);

// Sesi Login

Route::group(['middleware' => 'auth'], function () {

    // Sesi Mahasiswa

    Route::group(['middleware' => 'role:Mahasiswa'], function () {
        Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
        Route::get('/mahasiswa/pendaftaran-ta-1/status', [PendaftaranController::class, 'status']);
        Route::get('/mahasiswa/pendaftaran-ta-1/status/syarat', [PendaftaranController::class, 'showSyarat']);
        Route::get('/mahasiswa/pendaftaran-ta-1/status/alasan-tidak-lolos', [PendaftaranController::class, 'showAlasan']);
        Route::resource('/mahasiswa/pendaftaran-ta-1', PendaftaranController::class);

        Route::get('/mahasiswa/hasil-review', [ProposalReviewedController::class, 'index']);
        Route::get('/mahasiswa/hasil-review/download-proposal-{id}', [HasilReviewController::class, 'downloadProposalReviewed']);

        // Formulir Bimbingan
        Route::resource('/mahasiswa/form-bimbingan', FormBimbinganController::class);
    });

    // Sesi Koordinator

    Route::group(['middleware' => 'role:Koordinator'], function () {
        Route::get('/koordinator', [KoordinatorController::class, 'index']);

        // Pendaftaran Administrasi TA 1
        Route::resource('/koordinator/list-pendaftaran-ta-1', ListPendaftaranTA1Controller::class);
        Route::get('/koordinator/list-pendaftaran-ta-1/{id}/downloadTagihanUang', [ListPendaftaranTA1Controller::class, 'downloadTagihanUang']);
        Route::get('/koordinator/list-pendaftaran-ta-1/{id}/downloadLunasPembayaran', [ListPendaftaranTA1Controller::class, 'downloadLunasPembayaran']);
        Route::get('/koordinator/list-pendaftaran-ta-1/{id}/downloadBerkasTa1', [ListPendaftaranTA1Controller::class, 'downloadBerkasTa1']);
        Route::get('/koordinator/list-pendaftaran-ta-1/{id}/downloadKhs', [ListPendaftaranTA1Controller::class, 'downloadKhs']);
        Route::get('/koordinator/list-pendaftaran-ta-1/{id}/{kelolosan}', [ListPendaftaranTA1Controller::class, 'keterangan']);
        Route::post('/koordinator/list-pendaftaran-ta-1/{id}', [ListPendaftaranTA1Controller::class, 'edit_keterangan_kelolosan']);

        // Plotting Dosen Pembimbing, Reviewer, Penguji
        Route::resource('/koordinator/plotting-dosen-pembimbing', PlottingDosenPembimbingController::class);
        Route::resource('/koordinator/plotting-dosen-reviewer', PlottingDosenReviewerController::class);

        // Review Proposal
        Route::resource('/koordinator/hasil-review-proposal', HasilReviewController::class);
        Route::get('/koordinator/hasil-review-proposal/{id}/downloadProposalReviewed', [HasilReviewController::class, 'downloadProposalReviewed']);
    });

    // Sesi Dosen

    Route::group(['middleware' => 'role:Dosen'], function () {
        Route::get('/dosen', function () {
            return view('dosen.index', [
                'title' => 'Home',
                'role' => 'Dosen'
            ]);
        });

        // Reviewer 1

        Route::get('/dosen/reviewer-1', [ReviewerController::class, 'index']);
        Route::get('/dosen/reviewer-1/review-proposal', [ReviewerController::class, 'showReviewProposal']);
        Route::get('/dosen/reviewer-1/review-proposal/downloadBerkasTa1-{id}', [ListPendaftaranTA1Controller::class, 'downloadBerkasTa1']);
        Route::get('/dosen/reviewer-1/review-proposal/formReview-{id}', [ReviewerController::class, 'showFormReview']);
        Route::post('/dosen/reviewer-1/review-proposal/formReview-{id}', [ReviewerController::class, 'createFormReview']);

        // Pembimbing 1
        Route::get('/dosen/pembimbing-1/{mahasiswa_id}/bimbingan-{x}', [BimbinganMahasiswaController::class, 'showDetailBimbingan']);
        Route::resource('/dosen/pembimbing-1', BimbinganMahasiswaController::class);
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


// Test
Route::get('/test', function () {
    return view('test');
});
// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);























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
<?php

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Reviewer2Controller;
use App\Http\Controllers\ReviewerP1Controller;
use App\Http\Controllers\HasilReviewController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\FormBimbinganController;
use App\Http\Controllers\JadwalSeminarController;
use App\Http\Controllers\RevisiSeminarController;
use App\Http\Controllers\AjuanPembimbing1Controller;
use App\Http\Controllers\AjuanPembimbing2Controller;
use App\Http\Controllers\KunciPendaftaranController;
use App\Http\Controllers\PenilaianSeminarController;
use App\Http\Controllers\ProposalReviewedController;
use App\Http\Controllers\BimbinganMahasiswaController;
use App\Http\Controllers\ListPendaftaranTA1Controller;
use App\Http\Controllers\PendaftaranSeminarController;
use App\Http\Controllers\PenilaianSeminarP1Controller;
use App\Http\Controllers\PenilaianSeminarP2Controller;
use App\Http\Controllers\PenilaianSeminarR2Controller;
use App\Http\Controllers\BimbinganMahasiswa2Controller;
use App\Http\Controllers\PenilaianSeminarKoorController;
use App\Http\Controllers\PlottingDosenReviewerController;
use App\Http\Controllers\PlottingDosenReviewer2Controller;
use App\Http\Controllers\PlottingDosenPembimbingController;
use App\Http\Controllers\ListPendaftaranSeminarTA1Controller;

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

// TEST ==================================================================================

Route::get('/test', function () {
    return view('test');
});
// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);


// REGISTER ==============================================================================

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// LOGIN ==================================================================================

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'store']);

// LOGOUT ==================================================================================

Route::post('/logout', [LoginController::class, 'logout']);

// SESI LOGIN ==================================================================================

Route::group(['middleware' => 'auth'], function () {

    // SESI MAHASISWA ======================================================================================================

    Route::group(['middleware' => 'role:Mahasiswa'], function () {

        // Pendaftaran Administrasi TA 1

        Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
        Route::get('/mahasiswa/pendaftaran-ta-1/status', [PendaftaranController::class, 'status']);
        Route::get('/mahasiswa/pendaftaran-ta-1/status/syarat', [PendaftaranController::class, 'showSyarat']);
        Route::get('/mahasiswa/pendaftaran-ta-1/status/alasan-tidak-lolos', [PendaftaranController::class, 'showAlasan']);
        Route::get('/mahasiswa/pendaftaran-ta-1-step1', [PendaftaranController::class, 'step1']);
        Route::post('/mahasiswa/pendaftaran-ta-1-step1', [PendaftaranController::class, 'storeStep1']);
        Route::get('/mahasiswa/pendaftaran-ta-1-step2', [PendaftaranController::class, 'step2']);
        Route::post('/mahasiswa/pendaftaran-ta-1-step2', [PendaftaranController::class, 'storeStep2']);
        Route::get('/mahasiswa/pendaftaran-ta-1-step3', [PendaftaranController::class, 'step3']);
        Route::post('/mahasiswa/pendaftaran-ta-1-step3', [PendaftaranController::class, 'storeStep3']);
        Route::get('/mahasiswa/pendaftaran-ta-1-step4', [PendaftaranController::class, 'step4']);
        Route::post('/mahasiswa/pendaftaran-ta-1-step4', [PendaftaranController::class, 'storeStep4']);


        // Download Hasil Review

        Route::get('/mahasiswa/hasil-review', [ProposalReviewedController::class, 'index']);
        Route::get('/mahasiswa/hasil-review/download-proposal-p1-{id}', [HasilReviewController::class, 'downloadProposalReviewedP1']);
        Route::get('/mahasiswa/hasil-review/download-proposal-r1-{id}', [HasilReviewController::class, 'downloadProposalReviewedR1']);


        // Formulir Bimbingan

        Route::resource('/mahasiswa/form-bimbingan', FormBimbinganController::class);
        Route::get('/mahasiswa/form-bimbingan/{x}/edit', [FormBimbinganController::class, 'edit']);
        Route::post('/mahasiswa/form-bimbingan/create', [FormBimbinganController::class, 'store']);


        // Pendaftaran Seminar TA 1

        Route::get('/mahasiswa/pendaftaran-seminar-ta-1/status', [PendaftaranSeminarController::class, 'status']);
        Route::get('/mahasiswa/pendaftaran-seminar-ta-1/status/download', [JadwalSeminarController::class, 'downloadJadwalMahasiswa']);
        Route::get('/mahasiswa/pendaftaran-seminar-ta-1/status/syarat', [PendaftaranSeminarController::class, 'showSyarat']);
        Route::get('/mahasiswa/pendaftaran-seminar-ta-1/status/alasan-tidak-lolos', [PendaftaranSeminarController::class, 'showAlasan']);
        Route::resource('/mahasiswa/pendaftaran-seminar-ta-1', PendaftaranSeminarController::class);

        // Revisi Seminar
        Route::get('/mahasiswa/revisi-seminar', [RevisiSeminarController::class, 'index']);
        Route::get('/mahasiswa/revisi-seminar/create', [RevisiSeminarController::class, 'create']);
        Route::post('/mahasiswa/revisi-seminar/create', [RevisiSeminarController::class, 'store']);
        Route::post('/mahasiswa/revisi-seminar/update', [RevisiSeminarController::class, 'update']);
        Route::get('/mahasiswa/revisi-seminar/downloadFileR1', [RevisiSeminarController::class, 'downloadFileR1']);
        Route::get('/mahasiswa/revisi-seminar/downloadFileR2', [RevisiSeminarController::class, 'downloadFileR2']);
    });

    // SESI KOORDINATOR =================================================================================================================================

    Route::group(['middleware' => 'role:Koordinator'], function () {
        Route::get('/koordinator', [KoordinatorController::class, 'index']);

        // Kunci Pendaftaran Administrasi dan Seminar
        Route::post('/koordinator/list-pendaftaran-ta-1/lock', [KunciPendaftaranController::class, 'lockAdministrasi'])->name('lockAdministrasi');
        Route::post('/koordinator/list-pendaftaran-ta-1/unlock', [KunciPendaftaranController::class, 'unlockAdministrasi'])->name('unlockAdministrasi');;
        Route::post('/koordinator/list-pendaftaran-seminar-ta-1/lock', [KunciPendaftaranController::class, 'lockSeminar'])->name('lockSeminar');
        Route::post('/koordinator/list-pendaftaran-seminar-ta-1/unlock', [KunciPendaftaranController::class, 'unlockSeminar'])->name('unlockSeminar');;


        // Pendaftaran Administrasi TA 1

        Route::get('/koordinator/list-pendaftaran-ta-1/exportPdf', [ListPendaftaranTA1Controller::class, 'exportPdf'])->name('exportPdf');
        Route::get('/koordinator/list-pendaftaran-ta-1/{id}/viewProposal', [ListPendaftaranTA1Controller::class, 'viewProposal'])->name('viewProposal');
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
        Route::resource('/koordinator/plotting-dosen-reviewer2', PlottingDosenReviewer2Controller::class);


        // Review Proposal

        Route::resource('/koordinator/hasil-review-proposal', HasilReviewController::class);
        Route::get('/koordinator/hasil-review-proposal/{id}/downloadProposalReviewedP1', [HasilReviewController::class, 'downloadProposalReviewedP1']);
        Route::get('/koordinator/hasil-review-proposal/{id}/downloadProposalReviewedR1', [HasilReviewController::class, 'downloadProposalReviewedR1']);


        // Pendaftaran Seminar TA 1

        Route::resource('/koordinator/list-pendaftaran-seminar-ta-1', ListPendaftaranSeminarTA1Controller::class);
        Route::get('/koordinator/list-pendaftaran-seminar-ta-1/{id}/downloadTagihanUang', [ListPendaftaranSeminarTA1Controller::class, 'downloadTagihanUang']);
        Route::get('/koordinator/list-pendaftaran-seminar-ta-1/{id}/downloadLunasPembayaran', [ListPendaftaranSeminarTA1Controller::class, 'downloadLunasPembayaran']);
        Route::get('/koordinator/list-pendaftaran-seminar-ta-1/{id}/downloadBerkasTa1', [ListPendaftaranSeminarTA1Controller::class, 'downloadBerkasTa1']);
        Route::get('/koordinator/list-pendaftaran-seminar-ta-1/{id}/downloadKhs', [ListPendaftaranSeminarTA1Controller::class, 'downloadKhs']);
        Route::get('/koordinator/list-pendaftaran-seminar-ta-1/{id}/{kelolosan}', [ListPendaftaranSeminarTA1Controller::class, 'keterangan']);
        Route::post('/koordinator/list-pendaftaran-seminar-ta-1/{id}', [ListPendaftaranSeminarTA1Controller::class, 'edit_keterangan_kelolosan']);


        // Unggah Jadwal Seminar

        Route::get('/koordinator/jadwal-seminar', [JadwalSeminarController::class, 'index']);
        Route::post('/koordinator/jadwal-seminar', [JadwalSeminarController::class, 'store']);
        Route::post('/koordinator/jadwal-seminar/update', [JadwalSeminarController::class, 'update']);
        Route::get('/koordinator/jadwal-seminar/mahasiswa', [JadwalSeminarController::class, 'downloadJadwalMahasiswa']);
        Route::get('/koordinator/jadwal-seminar/dosen', [JadwalSeminarController::class, 'downloadJadwalDosen']);

        // Rilis Penilaian Seminar
        Route::resource('/koordinator/penilaian-seminar', PenilaianSeminarKoorController::class);
        Route::post('/koordinator/penilaian-seminar/{id}/rilis', [PenilaianSeminarKoorController::class, 'setRilis']);
    });

    // SESI DOSEN =====================================================================================================================================================

    Route::group(['middleware' => 'role:Dosen'], function () {
        Route::get('/dosen', function () {
            return view('dosen.index', [
                'title' => 'Home',
                'role' => 'Dosen'
            ]);
        });
        Route::get('/dosen/downloadJadwalSeminar', [JadwalSeminarController::class, 'downloadJadwalDosen']);


        // Reviewer 1

        Route::get('/dosen/reviewer-1', [ReviewerController::class, 'index']);
        Route::get('/dosen/reviewer-1/review-proposal', [ReviewerController::class, 'showReviewProposal']);
        Route::get('/dosen/reviewer-1/review-proposal/downloadBerkasTa1-{id}', [ListPendaftaranTA1Controller::class, 'downloadBerkasTa1']);
        Route::get('/dosen/reviewer-1/review-proposal/formReview-{id}', [ReviewerController::class, 'showFormReview']);
        Route::post('/dosen/reviewer-1/review-proposal/formReview-{id}', [ReviewerController::class, 'createFormReview']);
        Route::resource('dosen/reviewer-1/penilaian-seminar', PenilaianSeminarController::class);
        Route::post('/dosen/reviewer-1/penilaian-seminar/{id}/edit', [PenilaianSeminarController::class, 'update']);
        Route::get('/dosen/reviewer-1/penilaian-seminar/{id}/downloadFile', [PenilaianSeminarController::class, 'downloadFile']);
        Route::get('/dosen/reviewer-1/penilaian-seminar/{id}/downloadFinalProposal', [ListPendaftaranSeminarTA1Controller::class, 'downloadBerkasTa1']);


        // Reviewer 2

        Route::get('/dosen/reviewer-2', [Reviewer2Controller::class, 'index']);
        Route::resource('/dosen/reviewer-2/penilaian-seminar', PenilaianSeminarR2Controller::class);
        Route::post('/dosen/reviewer-2/penilaian-seminar/{id}/edit', [PenilaianSeminarR2Controller::class, 'update']);
        Route::get('/dosen/reviewer-2/penilaian-seminar/{id}/downloadFile', [PenilaianSeminarR2Controller::class, 'downloadFile']);
        Route::get('/dosen/reviewer-2/penilaian-seminar/{id}/downloadFinalProposal', [ListPendaftaranSeminarTA1Controller::class, 'downloadBerkasTa1']);


        // Pembimbing 1

        Route::get('/dosen/pembimbing-1', function () {
            if (auth()->user()->pembimbing1) {
                return view('dosen.pembimbing.index', ['title' => 'Home', 'role' => 'Pembimbing 1']);
            } else {
                return redirect()->back()->with('gagal', 'Maaf, anda tidak terdaftar sebagai Pembimbing 1');
            }
        });

        Route::get('/dosen/pembimbing-1/review-proposal', [ReviewerP1Controller::class, 'index'])->name('review-p1-index');
        Route::get('/dosen/pembimbing-1/review-proposal/downloadBerkasTa1-{id}', [ListPendaftaranTA1Controller::class, 'downloadBerkasTa1'])->name('download-berkas-p1');
        Route::get('/dosen/pembimbing-1/review-proposal/formReview-{id}', [ReviewerP1Controller::class, 'showFormReview'])->name('form-review-p1');
        Route::post('/dosen/pembimbing-1/review-proposal/formReview-{id}', [ReviewerP1Controller::class, 'createFormReview'])->name('create-form-review-p1');

        Route::get('/dosen/pembimbing-1/form-bimbingan/{mahasiswa_id}/bimbingan-{x}', [BimbinganMahasiswaController::class, 'showDetailBimbingan']);
        Route::post('/dosen/pembimbing-1/form-bimbingan/{mahasiswa_id}/bimbingan-{x}', [BimbinganMahasiswaController::class, 'setPersetujuanBimbingan']);
        Route::resource('/dosen/pembimbing-1/form-bimbingan', BimbinganMahasiswaController::class);
        Route::resource('dosen/pembimbing-1/penilaian-seminar', PenilaianSeminarP1Controller::class);
        Route::post('/dosen/pembimbing-1/penilaian-seminar/{id}/edit', [PenilaianSeminarP1Controller::class, 'update']);
        Route::get('/dosen/pembimbing-1/penilaian-seminar/{id}/downloadFile', [PenilaianSeminarP1Controller::class, 'downloadFile']);
        Route::resource('/dosen/pembimbing-1/ajuan-pembimbing-1', AjuanPembimbing1Controller::class);
        Route::post('/dosen/pembimbing-1/ajuan-pembimbing-1/{id}-{ajuanBimbingan}', [AjuanPembimbing1Controller::class, 'update']);
        Route::get('dosen/pembimbing-1/ajuan-pembimbing/{ajuan_pembimbing_1}/downloadBerkasTA1', [AjuanPembimbing1Controller::class, 'downloadBerkasTA1'])->name('ajuan-pembimbing.downloadBerkasTA1');
        Route::get('dosen/pembimbing-1/ajuan-pembimbing/{ajuan_pembimbing_1}/downloadKHS', [AjuanPembimbing1Controller::class, 'downloadKHS'])->name('ajuan-pembimbing.downloadKHS');


        // Pembimbing 2

        Route::get('/dosen/pembimbing-2', function () {
            return view('dosen.pembimbing.index', ['title' => 'Home', 'role' => 'Pembimbing 2']);
        });
        Route::get('/dosen/pembimbing-2/form-bimbingan/{mahasiswa_id}/bimbingan-{x}', [BimbinganMahasiswa2Controller::class, 'showDetailBimbingan']);
        Route::post('/dosen/pembimbing-2/form-bimbingan/{mahasiswa_id}/bimbingan-{x}', [BimbinganMahasiswa2Controller::class, 'setPersetujuanBimbingan']);
        Route::resource('/dosen/pembimbing-2/form-bimbingan', BimbinganMahasiswa2Controller::class);
        Route::resource('dosen/pembimbing-2/penilaian-seminar', PenilaianSeminarP2Controller::class);
        Route::post('/dosen/pembimbing-2/penilaian-seminar/{id}/edit', [PenilaianSeminarP2Controller::class, 'update']);
        Route::get('/dosen/pembimbing-2/penilaian-seminar/{id}/downloadFile', [PenilaianSeminarP2Controller::class, 'downloadFile']);
        Route::resource('/dosen/pembimbing-2/ajuan-pembimbing-2', AjuanPembimbing2Controller::class);
        Route::post('/dosen/pembimbing-2/ajuan-pembimbing-2/{id}-{ajuanBimbingan}', [AjuanPembimbing2Controller::class, 'update']);
        Route::get('dosen/pembimbing-2/ajuan-pembimbing/{ajuan_pembimbing_2}/downloadBerkasTA1', [AjuanPembimbing2Controller::class, 'downloadBerkasTA1'])->name('ajuan-pembimbing.downloadBerkasTA1');
        Route::get('dosen/pembimbing-2/ajuan-pembimbing/{ajuan_pembimbing_2}/downloadKHS', [AjuanPembimbing2Controller::class, 'downloadKHS'])->name('ajuan-pembimbing.downloadKHS');
    });

    // SESI ADMIN =======================================================================================

    Route::group(['middleware' => 'role:Admin'], function () {
        Route::get('/admin', function () {
            return 'Hallo Admin emailmu adalah ' . auth()->user()->email;
        });
    });

    // SESI TU ==========================================================================================

    Route::group(['middleware' => 'role:TU'], function () {
        Route::get('/tu', function () {
            return 'Hallo TU emailmu adalah ' . auth()->user()->email;
        });
    });
});
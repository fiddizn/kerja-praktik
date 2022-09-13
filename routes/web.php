<?php

use App\Http\Controllers\Detail_MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\List_pendaftaran_ta_1Controller;
use App\Models\Pendaftaran;

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

Route::get('/mahasiswa', function () {
    return view('mahasiswa', [
        'title' => 'Home',
        'name' => 'Fahmi Yusron Fiddin',
        'role' => 'Mahasiswa'
    ]);
});

Route::get('/mahasiswa/pendaftaran-ta-1', function () {
    return view('pendaftaran-ta-1', [
        'title' => 'Pendaftaran TA 1',
        'name' => 'Fahmi Yusron Fiddin',
        'role' => 'Mahasiswa'
    ]);
});

Route::get('/mahasiswa/pendaftaran-ta-1/status', function () {
    return view('status-pendaftaran-ta-1', [
        'title' => 'Status Pendaftaran',
        'name' => 'Fahmi Yusron Fiddin',
        'role' => 'Mahasiswa'
    ]);
});

Route::get('/koordinator', function () {
    return view('koordinator', [
        'title' => 'Home',
        'name' => 'Galang Setia Nugroho',
        'role' => 'Koordinator'
    ]);
});

Route::get('/koordinator/list-pendaftaran-ta-1', [List_pendaftaran_ta_1Controller::class, 'index']);

Route::get('/koordinator/list-pendaftaran-ta-1/detail-mahasiswa-{pendaftaran_id}', [Detail_MahasiswaController::class, 'index']);
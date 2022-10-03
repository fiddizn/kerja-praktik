@extends('layouts/main')
@section('container')

<h2 style="text-align:center;">Status Pendaftaran TA 1</h2>

<div class="d-flex justify-content-center mt-5">
    <div class="card w-50 mt-5 " style="background-color:#D9D9D9;">
        <div class=" card-body my-5">
            @if ($status == 'Lolos')
            <h3 class="card-title" style="text-align: center;">Lolos Seleksi Administrasi</h3>
            @elseif ($status == 'Pending')
            <h3 class="card-title" style="text-align: center;">Pending</h3>
            @elseif ($status == 'Lolos Bersyarat')
            <h3 class="card-title" style="text-align: center;">Lolos Bersyarat</h3>
            <p style="text-align:center ;">Perhatikan syaratnya!</p>
            @elseif ($status == 'Tidak Lolos')
            <h3 class="card-title" style="text-align: center;">Tidak Lolos</h3>
            <p style="text-align:center ;">{{ auth()->user()->pendaftaran->keterangan_status }}</p>
            @else
            <h3 class="card-title" style="text-align: center;">Seleksi Administrasi</h3>
            @endif
            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
            <!-- <a href="#" class="btn btn-primary">Button</a> -->
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-5">
    <a href="/mahasiswa" class="btn" style="background-color:#ff8c1a;">Kembali</a>
    @if ($status == 'Lolos Bersyarat')
    <a href="#" class="btn mx-2" style="background-color:#ff8c1a;">Syarat</a>
    @endif
</div>
@endsection
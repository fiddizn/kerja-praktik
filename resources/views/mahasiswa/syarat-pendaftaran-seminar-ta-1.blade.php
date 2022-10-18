@extends('layouts/main')
@section('container')
@if (auth()->user()->pendaftaran->status == 'Lolos Bersyarat')
<h2 class="text-center mb-5">Syarat Maju Tugas Akhir 1</h2>
@elseif (auth()->user()->pendaftaran->status == 'Tidak Lolos')
<h2 class="text-center mb-5">Alasan Tidak Lolos Seleksi Administrasi</h2>
@endif
<div class="row my-3">
    <div class="d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
                {!! $syarat !!}
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-5">
    <a class="btn " href="/mahasiswa/pendaftaran-seminar-ta-1/status" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>


@endsection
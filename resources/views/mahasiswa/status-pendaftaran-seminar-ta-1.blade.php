@extends('layouts/main')
@section('container')

<h2 style="text-align:center;">Status Pendaftaran TA 1</h2>
<div class="row">
    <div class="d-flex justify-content-center mt-5">
        <div class="card w-50 mt-5 " style="background-color:#D9D9D9;">
            <div class=" card-body my-5">
                @if ($status == 'Lolos')
                <h3 class="card-title" style="text-align: center;">Lolos Seleksi Seminar</h3>
                @elseif ($status == 'Pending')
                <h3 class="card-title" style="text-align: center;">Pending</h3>
                <p style="text-align:center ;">Silakan segera hubungi Koordinator TA 1!</p>
                @elseif ($status == 'Lolos Bersyarat')
                <h3 class="card-title" style="text-align: center;">Lolos Bersyarat</h3>
                <p style="text-align:center ;"><b>Perhatikan syaratnya!</b></p>
                @elseif ($status == 'Tidak Lolos')
                <h3 class="card-title" style="text-align: center;">Tidak Lolos</h3>
                @else
                <h3 class="card-title" style="text-align: center;">Seleksi Pendaftaran Seminar</h3>
                @endif
            </div>
        </div>
    </div>
</div>

</div>
<div class="d-flex justify-content-center mt-5">
    <a href="/mahasiswa" class="btn" style="background-color:#ff8c1a;">Kembali</a>
    @if ($status == 'Lolos Bersyarat')
    <a href="/mahasiswa/pendaftaran-seminar-ta-1/status/syarat" class="btn mx-2"
        style="background-color:#ff8c1a;">Syarat</a>
    @elseif ($status == 'Tidak Lolos')
    <a href="/mahasiswa/pendaftaran-seminar-ta-1/status/alasan-tidak-lolos" class="btn mx-2"
        style="background-color:#ff8c1a;">Alasan</a>
    @endif
</div>
@endsection
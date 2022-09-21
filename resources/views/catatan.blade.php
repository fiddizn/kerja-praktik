@extends('layouts/main')
@section('container')
<h2 style="text-align:center;">Seleksi Adiministrasi</h2>
<form action="/koordinator/list-pendaftaran-ta-1" method="GET">
    <div class="row align-items-start mt-2">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim" readonly value="{{ $pendaftaran->nim }}">
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" readonly
                    value="{{ $pendaftaran->mahasiswa->name }}">
            </div>
        </div>
    </div>
    <div class="row g-3 my-3">
        <div class="form-group">
            @if ($status == 'tidak-lolos')
            <label for="keterangan">Mahasiswa di atas dinyatakan tidak lolos seleksi dengan alasan:</label>
            @else
            <label for="keterangan">Mahasiswa di atas dinyatakan lolos seleksi administrasi dengan syarat
                sebagai
                berikut:</label>
            @endif
            <textarea class="form-control mt-2" rows="10" id="keterangan" name="keterangan" id="keterangan"></textarea>
        </div>
    </div>
    <input type="hidden" id="status_pendaftaran" name="status_pendaftaran" value="{{ $status }}">
    <div class="col-12 mt-5">
        <a class="btn" href="/koordinator/list-pendaftaran-ta-1/detail-mahasiswa-{{ $pendaftaran->id }}" role="button"
            style="width: 5rem;background-color:#ff8c1a;">Back</a>
        <button type="submit" class="btn" style="width: 5rem;background-color:#ff8c1a;">Submit</button>
    </div>
</form>

<div style=" height: 100px;">
</div>


@endsection
@extends('layouts/main')
@section('container')
@if (session()->has('ajuanPembimbingNotValid'))
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    {{ session('ajuanPembimbingNotValid') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 style="text-align:center;">Pendaftaran{{$seminar}} Tugas Akhir 1</h2>

<div class="row align-items-start mt-3">
    @if ($seminar == '')
    <form class="row g-3" id="formAdministrasi" action="/mahasiswa/pendaftaran-ta-1-step3" method="POST"
        enctype="multipart/form-data">
        @else
        <form class="row g-3" id="formSeminar" action="/mahasiswa/pendaftaran-seminar-ta-1-step3" method="POST">
            @endif
            @csrf
            <div class="col-md-12">
                <label for="judul_ta1" class="form-label">Judul Proposal</label>
                @if($pendaftaran == null)
                <input type="text" class="form-control error" name="judul_ta1" id="judul_ta1"
                    placeholder="Judul Penelitian">
                @else
                <input type="text" class="form-control error" name="judul_ta1" id="judul_ta1"
                    placeholder="Judul Penelitian" value="{{ $pendaftaran->judul_ta1 }}">
                @endif
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="berkas_ta1" class="form-label">Berkas Proposal</label>
                    <input class="form-control @error('berkas_ta1') is-invalid @enderror" type="file" id="berkas_ta1"
                        name="berkas_ta1">
                    <div id="berkas_ta1" class="invalid-feedback">File harus berupa WORD/PDF!</div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="tagihan_uang" class="form-label">Tagihan Uang Kuliah</label>
                    <input class="form-control @error('tagihan_uang') is-invalid @enderror" type="file"
                        id="tagihan_uang" name="tagihan_uang" required>
                    <div id="tagihan_uang" class="invalid-feedback">File harus berupa WORD/PDF!</div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="lunas_pembayaran" class="form-label">Bukti Lunas Pembayaran</label>
                    <input class="form-control @error('lunas_pembayaran') is-invalid @enderror" type="file"
                        id="lunas_pembayaran" name="lunas_pembayaran" required>
                    <div id="lunas_pembayaran" class="invalid-feedback">File harus berupa JPG/PNG/PDF!</div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <a class="btn " href="/mahasiswa/pendaftaran-ta-1-step2" role="button"
                    style="width: 5rem;background-color:#ff8c1a;">Back</a>
                <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Next</button>
            </div>
            <div style=" height: 100px;">
            </div>
        </form>
    </form>
    <script type="text/javascript" src="/js/validasiPembimbing.js"></script>
    <script type="text/javascript" src="/js/validasijabfun.js"></script>
</div>
@endsection
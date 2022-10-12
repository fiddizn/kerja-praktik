@extends('layouts/main')
@section('container')

<h2 class="text-center">{{ $title }}</h2>
<div class="row align-items-start">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="row mt-2 px-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim" disabled
                    value="{{ $mahasiswa->mahasiswa->nim }}">
            </div>
            <div class="row mt-2 px-3">
                <label for="name" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="name" id="name" disabled
                    value="{{ $mahasiswa->mahasiswa->name }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="row mt-2 px-3">
                <label for="nim" class="form-label">NID</label>
                <input type="number" class="form-control" name="nim" id="nim" disabled
                    value="{{ $mahasiswa->reviewer1->dosen->nid }}">
            </div>
            <div class="row mt-2 px-3"><label for="name" class="form-label">Nama Dosen Reviewer</label>
                <input type="text" class="form-control" name="name" id="name" disabled
                    value="{{ $mahasiswa->reviewer1->dosen->name }}">
            </div>
        </div>
    </div>
    @if ($mahasiswa->pendaftaran->peminatan == 'AIG')
    <div class="row mt-5">
        <div class="col-md-3 my-1">
            <label class="form-label">Kreatifitas <br>(originalitas, unik dan bermanfaat)</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian1 }}">
        </div>
        <div class="col-md-3 my-1">
            <label class="form-label">Perumusan Masalah <br>(focus, jelas dan terarah)</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian2 }}">
        </div>
        <div class="col-md-3 my-1">
            <label class="form-label">Kesesuaian dan kemutakhiran metode penelitian</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian3 }}">
        </div>
        <div class="col-md-3 my-1">
            <label class="form-label">Kontribusi perkembangan ilmu pengetahuan dan teknologi</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian4 }}">
        </div>
        <div class="col-md-3 my-1">
            <label class="form-label">Tinjauan pustaka</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian5 }}">
        </div>
        <div class="col-md-3 my-1">
            <label class="form-label">Pemaparan proposal</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian6 }}">
        </div>
        <div class="col-md-6 px-3">
            <label class="form-label"><b>Hasil Review</b></label>
            <input class="form-control" disabled value="{{ $mahasiswa->hasil_review }}">
        </div>
    </div>
    @else
    <div class="row mt-2">
        <div class="col-md-6 px-3">
            <label class="form-label">Originalitasi Judul Skripsi</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian1 }}">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6 px-3">
            <label class="form-label">Kemampuan dalam menyampaikan abstraksi dan perumusan masalah secara
                sistematis</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian2 }}">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6 px-3">
            <label class="form-label">Kesesuaian Metode Penelitian dengan penelitiannya (Perangkat Lunak / Perangkat
                Lunak bagian dari penelitian)</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian3 }}">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6 px-3">
            <label class="form-label">Kebaruan topik / sub topik(Teori / Konsep / Bahasa Pemrograman / Dll)</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian4 }}">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6 px-3">
            <label class="form-label">Tinjauan pustaka</label>
            <input class="form-control" disabled value="{{ $mahasiswa->penilaian5 }}">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6 px-3">
            <label class="form-label"><b>Hasil Review</b></label>
            <input class="form-control" disabled value="{{ $mahasiswa->hasil_review }}">
        </div>
    </div>
    @endif
    <div class="row mt-5">
        <div class="d-flex justify-content-center">
            <label>Saran Perbaikan / Usulan Judul / DLL</label>
            <div class="card w-100">
                <div class="card-body">
                    {!! $mahasiswa->komentar !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-around mt">
    <div class="input-group my-5" style="width: 30%;">
        <div class="input-group-prepend">
            <a href="/koordinator/hasil-review-proposal/{{ $mahasiswa->pendaftaran->id }}/downloadProposalReviewed"
                class="btn" style="height: 58px; background-color:#ff8c1a;">
                <i class="fa-solid fa-download fa-xl"></i>
                <p><b>DOWNLOAD PROPOSAL (REVIEWED)</b></p>
            </a>
        </div>
    </div>
</div>
<div class="row mt-2">
    <a class="btn" href="/koordinator/hasil-review-proposal" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
<div style=" height: 100px;">
</div>
@endsection
@extends('layouts/main')
@section('container')

<h2 class="text-center">{{ $title }}</h2>
<div class="row align-items-start">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="row mt-2 px-3">
                <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="nim" id="nim" disabled
                        value="{{ $mahasiswa->mahasiswa->nim }}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row mt-2 px-3">
                <label for="name" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="name" disabled
                        value="{{ $mahasiswa->mahasiswa->name }}">
                </div>
            </div>
        </div>
    </div>
    @if ($mahasiswa->pendaftaran->peminatan == 'AIG')
    <table class="table table-sm mt-3">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Aspek Penilaian</th>
                <th scope="col">P1 ({{ $mahasiswa->pembimbing1->dosen->kode }})</th>
                <th scope="col">R1 ({{ $mahasiswa->reviewer1->dosen->kode }})</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td>Kreatifitas (originalitas, unik dan bermanfaat)</td>
                <td>{{ $nilai[$mahasiswa->p1_penilaian1] }}</td>
                <td>{{ $nilai[$mahasiswa->r1_penilaian1] }}</td>
            </tr>
            <tr>
                <td scope="row">2</td>
                <td>Perumusan Masalah (focus, jelas dan terarah)</td>
                <td>{{ $nilai[$mahasiswa->p1_penilaian2] }}</td>
                <td>{{ $nilai[$mahasiswa->r1_penilaian2] }}</td>
            </tr>
            <tr>
                <td scope="row">3</td>
                <td>Kesesuaian dan kemutakhiran metode penelitian</td>
                <td>{{ $nilai[$mahasiswa->p1_penilaian3] }}</td>
                <td>{{ $nilai[$mahasiswa->r1_penilaian3] }}</td>
            </tr>
            <tr>
                <td scope="row">4</td>
                <td>Kontribusi perkembangan ilmu pengetahuan dan teknologi</td>
                <td>{{ $nilai[$mahasiswa->p1_penilaian4] }}</td>
                <td>{{ $nilai[$mahasiswa->r1_penilaian4] }}</td>
            </tr>
            <tr>
                <td scope="row">5</td>
                <td>Tinjauan pustaka</td>
                <td>{{ $nilai[$mahasiswa->p1_penilaian5] }}</td>
                <td>{{ $nilai[$mahasiswa->r1_penilaian5] }}</td>
            </tr>
            <tr>
                <td scope="row">6</td>
                <td>Pemaparan proposal</td>
                <td>{{ $nilai[$mahasiswa->p1_penilaian6] }}</td>
                <td>{{ $nilai[$mahasiswa->r1_penilaian6] }}</td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td><b>Hasil Review</b></td>
                <td><b>{{$mahasiswa->p1_hasil_review }}</b></td>
                <td><b>{{ $mahasiswa->r1_hasil_review }}</b></td>
            </tr>
        </tbody>
    </table>
</div>
@else
<table class="table table-sm mt-3">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Aspek Penilaian</th>
            <th scope="col">P1 ({{ $mahasiswa->pembimbing1->dosen->kode }})</th>
            <th scope="col">R1 ({{ $mahasiswa->reviewer->dosen->kode }})</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">1</td>
            <td>Kreatifitas (originalitas, unik dan bermanfaat)</td>
            <td>{{ $nilai[$mahasiswa->p1_penilaian1] }}</td>
            <td>{{ $nilai[$mahasiswa->r1_penilaian1] }}</td>
        </tr>
        <tr>
            <td scope="row">2</td>
            <td>Kemampuan dalam menyampaikan abstraksi dan perumusan masalah secara sistematis</td>
            <td>{{ $nilai[$mahasiswa->p1_penilaian2] }}</td>
            <td>{{ $nilai[$mahasiswa->r1_penilaian2] }}</td>
        </tr>
        <tr>
            <td scope="row">3</td>
            <td>Kesesuaian Metode Penelitian dengan penelitiannya (Perangkat Lunak / Perangkat Lunak bagian dari
                penelitian)</td>
            <td>{{ $nilai[$mahasiswa->p1_penilaian3] }}</td>
            <td>{{ $nilai[$mahasiswa->r1_penilaian3] }}</td>
        </tr>
        <tr>
            <td scope="row">4</td>
            <td>Kebaruan topik / sub topik (Teori / Konsep / Bahasa Pemrograman / Dll)</td>
            <td>{{ $nilai[$mahasiswa->p1_penilaian4] }}</td>
            <td>{{ $nilai[$mahasiswa->r1_penilaian4] }}</td>
        </tr>
        <tr>
            <td scope="row">5</td>
            <td>Tinjauan pustaka</td>
            <td>{{ $nilai[$mahasiswa->p1_penilaian5] }}</td>
            <td>{{ $nilai[$mahasiswa->r1_penilaian5] }}</td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td><b>Hasil Review</b></td>
            <td><b>{{$mahasiswa->p1_hasil_review }}</b></td>
            <td><b>{{ $mahasiswa->r1_hasil_review }}</b></td>
        </tr>
    </tbody>
</table>
<div class="row mt-2">
</div>
@endif
<!-- <div class="row mt-5">
    <div class="d-flex justify-content-center">
        <label>Saran Perbaikan / Usulan Judul / DLL</label>
        <div class="card w-100">
            <div class="card-body">
                {!! $mahasiswa->komentar !!}
            </div>
        </div>
    </div>
</div> -->

<div class="d-flex justify-content-around mt">
    <div class="input-group my-2" style="width: 30%;">
        <div class="input-group-prepend">
            <a href="/koordinator/hasil-review-proposal/{{ $mahasiswa->id }}/downloadProposalReviewedP1" class="btn"
                style="height: 58px; background-color:#ff8c1a;">
                <i class="fa-solid fa-download fa-xl"></i>
                <p><b>Unduh Proposal (Reviewed by P1)</b></p>
            </a>
        </div>
    </div>
    <div class="input-group my-2" style="width: 30%;">
        <div class="input-group-prepend">
            <a href="/koordinator/hasil-review-proposal/{{ $mahasiswa->id }}/downloadProposalReviewedR1" class="btn"
                style="height: 58px; background-color:#ff8c1a;">
                <i class="fa-solid fa-download fa-xl"></i>
                <p><b>Unduh Proposal (Reviewed by R1)</b></p>
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
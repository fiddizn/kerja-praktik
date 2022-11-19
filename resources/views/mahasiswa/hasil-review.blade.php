@extends('layouts/main')
@section('container')
@if (session()->has('null'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{ session('null') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center">{{ $title }}</h2>
@if (auth()->user()->pendaftaran->peminatan == 'AIG')
<table class="table table-sm mt-3">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Aspek Penilaian</th>
            <th scope="col">Reviewer 1</th>
            <th scope="col">Reviewer 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">1</td>
            <td>Kreatifitas (originalitas, unik dan bermanfaat)</td>
            <td>{{ $nilai[$review->p1_penilaian1] }}</td>
            <td>{{ $nilai[$review->r1_penilaian1] }}</td>
        </tr>
        <tr>
            <td scope="row">2</td>
            <td>Perumusan Masalah (focus, jelas dan terarah)</td>
            <td>{{ $nilai[$review->p1_penilaian2] }}</td>
            <td>{{ $nilai[$review->r1_penilaian2] }}</td>
        </tr>
        <tr>
            <td scope="row">3</td>
            <td>Kesesuaian dan kemutakhiran metode penelitian</td>
            <td>{{ $nilai[$review->p1_penilaian3] }}</td>
            <td>{{ $nilai[$review->r1_penilaian3] }}</td>
        </tr>
        <tr>
            <td scope="row">4</td>
            <td>Kontribusi perkembangan ilmu pengetahuan dan teknologi</td>
            <td>{{ $nilai[$review->p1_penilaian4] }}</td>
            <td>{{ $nilai[$review->r1_penilaian4] }}</td>
        </tr>
        <tr>
            <td scope="row">5</td>
            <td>Tinjauan pustaka</td>
            <td>{{ $nilai[$review->p1_penilaian5] }}</td>
            <td>{{ $nilai[$review->r1_penilaian5] }}</td>
        </tr>
        <tr>
            <td scope="row">6</td>
            <td>Pemaparan proposal</td>
            <td>{{ $nilai[$review->p1_penilaian6] }}</td>
            <td>{{ $nilai[$review->r1_penilaian6] }}</td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td><b>Hasil Review</b></td>
            <td><b>{{$review->p1_hasil_review }}</b></td>
            <td><b>{{ $review->r1_hasil_review }}</b></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td><b>Revisi Proposal</b></td>
            <td><a href="/mahasiswa/hasil-review/revisi-p1" class="btn"
                    style="width:100px; background-color:#ff8c1a;">Revisi</a></td>
            <td><a href="/mahasiswa/hasil-review/revisi-r1" class="btn"
                    style="width:100px; background-color:#ff8c1a;">Revisi</a></td>
        </tr>
    </tbody>
</table>

@else
<table class="table table-sm mt-3">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Aspek Penilaian</th>
            <th scope="col">Reviewer 1</th>
            <th scope="col">Reviewer 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">1</td>
            <td>Kreatifitas (originalitas, unik dan bermanfaat)</td>
            <td>{{ $nilai[$review->p1_penilaian1] }}</td>
            <td>{{ $nilai[$review->r1_penilaian1] }}</td>
        </tr>
        <tr>
            <td scope="row">2</td>
            <td>Kemampuan dalam menyampaikan abstraksi dan perumusan masalah secara sistematis</td>
            <td>{{ $nilai[$review->p1_penilaian2] }}</td>
            <td>{{ $nilai[$review->r1_penilaian2] }}</td>
        </tr>
        <tr>
            <td scope="row">3</td>
            <td>Kesesuaian Metode Penelitian dengan penelitiannya (Perangkat Lunak / Perangkat Lunak bagian dari
                penelitian)</td>
            <td>{{ $nilai[$review->p1_penilaian3] }}</td>
            <td>{{ $nilai[$review->r1_penilaian3] }}</td>
        </tr>
        <tr>
            <td scope="row">4</td>
            <td>Kebaruan topik / sub topik (Teori / Konsep / Bahasa Pemrograman / Dll)</td>
            <td>{{ $nilai[$review->p1_penilaian4] }}</td>
            <td>{{ $nilai[$review->r1_penilaian4] }}</td>
        </tr>
        <tr>
            <td scope="row">5</td>
            <td>Tinjauan pustaka</td>
            <td>{{ $nilai[$review->p1_penilaian5] }}</td>
            <td>{{ $nilai[$review->r1_penilaian5] }}</td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td><b>Hasil Review</b></td>
            <td><b>{{$review->p1_hasil_review }}</b></td>
            <td><b>{{ $review->r1_hasil_review }}</b></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td><b>Revisi Proposal</b></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<div class="row mt-2">
</div>
@endif
<div class="mb-5">
    <a class="btn" href="/mahasiswa" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
</div>
@endsection
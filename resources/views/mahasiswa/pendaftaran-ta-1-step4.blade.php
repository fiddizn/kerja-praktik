@extends('layouts/main')
@section('container')
@if (session()->has('ajuanPembimbingNotValid'))
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    {{ session('ajuanPembimbingNotValid') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 style="text-align:center;">Pendaftaran{{$seminar}}Tugas Akhir 1</h2>

<div class="row align-items-start mt-3">
    <form class="row g-3" id="formAdministrasi" action="/mahasiswa/pendaftaran-ta-1-step4" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="col-md-6 p-2">
            <h6 style="text-align:center;">Pembimbing 1</h6>
            <label for="alt1_p1" class="form-label error">Alternatif 1</label>
            <select type="text" class="form-select" name="alt1_p1" id="alt1_p1">
                <option disabled selected>Pilih.. </option>
                @foreach ($list_p1 as $p1)
                <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                @endforeach
            </select>
            <label for="alt2_p1" class="form-label mt-2">Alternatif 2</label>
            <select type="text" class="form-select" name="alt2_p1" id="alt2_p1">
                <option disabled selected>Pilih.. </option>
                @foreach ($list_p1 as $p1)
                <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                @endforeach
            </select>
            <label for="alt3_p1" class="form-label mt-2 ">Alternatif 3</label>
            <select type="text" class="form-select" name="alt3_p1" id="alt3_p1">
                <option disabled selected>Pilih.. </option>
                @foreach ($list_p1 as $p1)
                <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                @endforeach
            </select>
            <label for="alt4_p1" class="form-label mt-2">Alternatif 4</label>
            <select type="text" class="form-select" name="alt4_p1" id="alt4_p1">
                <option disabled selected>Pilih.. </option>
                @foreach ($list_p1 as $p1)
                <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 p-2">
            <h6 style="text-align:center;">Pembimbing 2</h6>
            <label for="alt1_p2" class="form-label">Alternatif 1</label>
            <select type="text" class="form-select" name="alt1_p2" id="alt1_p2">
                <option disabled selected>Pilih.. </option>
                @foreach ($list_p2 as $p2)
                <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                @endforeach
            </select>
            <label for="alt2_p2" class="form-label mt-2">Alternatif 2</label>
            <select type="text" class="form-select" name="alt2_p2" id="alt2_p2">
                <option disabled selected>Pilih.. </option>
                @foreach ($list_p2 as $p2)
                <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                @endforeach
            </select>
            <label for="alt3_p2" class="form-label mt-2">Alternatif 3</label>
            <select type="text" class="form-select" name="alt3_p2" id="alt3_p2">
                <option disabled selected>Pilih.. </option>
                @foreach ($list_p2 as $p2)
                <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                @endforeach
            </select>
            <label for="alt4_p2" class="form-label mt-2">Alternatif 4</label>
            <select type="text" class="form-select" name="alt4_p2" id="alt4_p2">
                <option disabled selected>Pilih.. </option>
                @foreach ($list_p2 as $p2)
                <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">

        </div>
        <div class="col-12 m-2">
            <a class="btn " href="/mahasiswa/pendaftaran-ta-1-step3" role="button"
                style="width: 5rem;background-color:#ff8c1a;">Back</a>
            <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
        </div>
        <div style=" height: 100px;">
        </div>
    </form>
    </form>
    <script type="text/javascript" src="/js/validasiPembimbing.js"></script>
    <script type="text/javascript" src="/js/validasijabfun.js"></script>
</div>
@endsection
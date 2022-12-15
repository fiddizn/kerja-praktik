@extends('layouts/main')
@section('container')

<h2 class="text-center">{{$title}}</h2>
<form id="form" action="/koordinator/penilaian-seminar/persentase-penilaian/edit" method="post">
    @csrf
    <div class="form-group">
        <label for="administrasi">Administrasi</label>
        <input type="number" class="form-control" id="administrasi" name="administrasi" value="{{ $administrasi }}"
            min="0" max="100">
    </div>
    <div class="form-group">
        <label for="bimbingan">Bimbingan</label>
        <input type="number" class="form-control" id="bimbingan" name="bimbingan" value="{{ $bimbingan }}" min="0"
            max="100">
    </div>
    <div class="form-group">
        <label for="pembimbing">Pembimbing</label>
        <input type="number" class="form-control" id="pembimbing" name="pembimbing" value="{{ $pembimbing }}" min="0"
            max="100">
    </div>
    <div class="form-group">
        <label for="penguji">Penguji</label>
        <input type="number" class="form-control" id="penguji" name="penguji" value="{{ $penguji }}" min="0" max="100">
    </div>
    <div class="col-12 mt-5">
        <a class="btn" href="/koordinator/penilaian-seminar/persentase-penilaian" role="button"
            style="width: 5rem;background-color:#ff8c1a;">Back</a>
        <button type="submit" id="form" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
    </div>
</form>

<script type="text/javascript" src="/js/validasiEditPersentase.js"></script>
@endsection
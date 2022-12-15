@extends('layouts/main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center">{{$title}}</h2>

<div class="form-group">
    <label for="administrasi">Administrasi</label>
    <input type="text" class="form-control" id="administrasi" name="administrasi" value="{{ $administrasi }}%" readonly>
</div>
<div class="form-group">
    <label for="bimbingan">Bimbingan</label>
    <input type="text" class="form-control" id="bimbingan" name="bimbingan" value="{{ $bimbingan }}%" readonly>
</div>
<div class="form-group">
    <label for="pembimbing">Pembimbing</label>
    <input type="text" class="form-control" id="pembimbing" name="pembimbing" value="{{ $pembimbing }}%" readonly>
</div>
<div class="form-group">
    <label for="penguji">Penguji</label>
    <input type="text" class="form-control" id="penguji" name="penguji" value="{{ $penguji }}%" readonly>
</div>
<div class="col-12 mt-5">
    <a class="btn" href="/koordinator/penilaian-seminar" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    <a href="/koordinator/penilaian-seminar/persentase-penilaian/edit" class="btn"
        style="width: 5rem ; background-color:#ff8c1a;">Update</a>
</div>
@endsection
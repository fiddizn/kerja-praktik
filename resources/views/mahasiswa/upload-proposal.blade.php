@extends('layouts/main')
@section('container')
<h2 class="text-center mb-5">{{ $title }}</h2>
<form action="/mahasiswa/upload-proposal" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="judul_ta1" class="form-label">Judul Proposal</label>
        <input class="form-control" type="text" id="judul_ta1" name="judul_ta1" required>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">File Proposal</label>
        <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file" required>
        <div id="file" class="invalid-feedback">File harus berupa WORD/PDF!</div>
    </div>
    <div>
        <a class="btn my-3" href="/mahasiswa" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
        <button class="btn my-3" type="submit" style="background-color:#ff8c1a; width: 6rem;">Submit</button>
    </div>
</form>
@endsection
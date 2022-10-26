@extends('layouts/main')
@section('container')

<h2 class="text-center mb-5">{{ $title }}</h2>
<form action="/mahasiswa/revisi-seminar/update" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="file" class="form-label">Proposal TA 1 yang sudah direvisi</label>
        <input class="form-control" type="file" id="file" name="file">
    </div>
    <div>
        <a class="btn my-3" href="/mahasiswa" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
        <button class="btn my-3" type="submit" style="background-color:#ff8c1a; width: 6rem;">Submit</button>
    </div>
</form>
@endsection
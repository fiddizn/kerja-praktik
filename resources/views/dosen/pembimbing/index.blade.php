@extends('layouts/main')
@section('container')
@if ($role == 'Pembimbing 1')
<a href="#" class="btn btn-primary disabled">Ajuan Pembimbing</a>
<a href="/dosen/pembimbing-1/form-bimbingan" class="btn btn-primary">Bimbingan Mahasiswa</a>
<a href="#" class="btn btn-primary disabled">Jadwal Seminar TA 1</a>
<a href="#" class="btn btn-primary disabled">Penilaian Seminar TA 1</a>
<br>
<a href="/dosen" class="btn btn-warning">Back</a>
@else
<a href="#" class="btn btn-primary disabled">Ajuan Pembimbing</a>
<a href="/dosen/pembimbing-2/form-bimbingan" class="btn btn-primary">Bimbingan Mahasiswa</a>
<a href="#" class="btn btn-primary disabled">Jadwal Seminar TA 1</a>
<a href="#" class="btn btn-primary disabled">Penilaian Seminar TA 1</a>
<br>
<a href="/dosen" class="btn btn-warning">Back</a>
@endif
@endsection
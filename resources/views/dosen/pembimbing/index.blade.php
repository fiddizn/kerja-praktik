@extends('layouts/main')
@section('container')

<a href="#" class="btn btn-primary disabled">Ajuan Pembimbing</a>
<a href="{{ route('form-bimbingan.index') }}" class="btn btn-primary">Bimbingan Mahasiswa</a>
<a href="#" class="btn btn-primary disabled">Jadwal Seminar TA 1</a>
<a href="#" class="btn btn-primary disabled">Penilaian Seminar TA 1</a>
<br>
<a href="/dosen/pembimbing-1" class="btn btn-warning">Back</a>
@endsection
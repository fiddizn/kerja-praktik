@extends('layouts/main')
@section('container')

<h2 class="text-center mb-5">Form Bimbingan</h2>
@foreach ($bimbingans as $key=>$bimbingan)
<div class="d-flex justify-content-center">
    @if ($role == 'Pembimbing 1')
    <a class="btn my-2" href="/dosen/pembimbing-1/form-bimbingan/{{ $mahasiswa_id }}/bimbingan-{{$key+1}}" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Bimbingan {{$key+1}}
        @if(is_null($bimbingan->setuju))
        @elseif ($bimbingan->setuju == 1)
        <i class="fa-solid fa-square-check"></i>
        @else ($bimbingan->setuju == 0)
        <i class="fa-solid fa-square-xmark"></i>
        @endif
    </a>
    @elseif ($role == 'Pembimbing 2')
    <a class="btn my-2" href="/dosen/pembimbing-2/form-bimbingan/{{ $mahasiswa_id }}/bimbingan-{{$key+1}}" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Bimbingan {{$key+1}}
        @if(is_null($bimbingan->setuju))
        @elseif ($bimbingan->setuju == 1)
        <i class="fa-solid fa-square-check"></i>
        @else ($bimbingan->setuju == 0)
        <i class="fa-solid fa-square-xmark"></i>
        @endif
    </a>
    @endif
</div>
@endforeach
@if($role == 'Pembimbing 1')
<div class="col-12 mt-5">
    <a class="btn " href="/dosen/pembimbing-1/form-bimbingan" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
@elseif ($role == 'Pembimbing 2')
<div class="col-12 mt-5">
    <a class="btn " href="/dosen/pembimbing-2/form-bimbingan" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
@endif
@endsection
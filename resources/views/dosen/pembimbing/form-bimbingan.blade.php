@extends('layouts/main')
@section('container')

<h2 class="text-center">Form Bimbingan</h2>
@if ($role == 'Pembimbing 1')
<div class="row align-items-start mt-2">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly value="{{ $nim }}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" readonly value="{{ $name }}">
        </div>
    </div>
</div>
<table class=" table table-hover table-sm mt-3">
    <thead>
        <tr>
            <th style="width: 10%" scope="col">NO
            </th>
            <th style="width: 20%" scope="col">Tanggal & Waktu</th>
            <th style="width: 30%" scope="col">Pokok Pembahasan</th>
            <th style="width: 20%" scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    @foreach ($bimbingans as $key=> $bimbingan)
    <tbody>
        <tr>
            <th scope="row">{{ $bimbingans->firstItem()+ $key}}
            </th>
            <td>{{ $bimbingan->waktu }}</td>
            <td>{{ $bimbingan->pokok_materi }}</td>
            @if(!isset($bimbingan->setuju))
            <td></td>
            @elseif ($bimbingan->setuju)
            <td><button class="btn btn-success">Disetujui</button></td>
            @else
            <td><button class="btn btn-danger">Ditolak</button></td>
            @endif
            <td><a class="btn btn-warning"
                    href="/dosen/pembimbing-1/form-bimbingan/{{ $mahasiswa_id }}/bimbingan-{{$bimbingans->firstItem()+ $key}}"><i
                        class="fa-solid fa-align-left"></i> Detail</a></td>
        </tr>
    </tbody>
    @endforeach
</table>
<div class="d-flex justify-content-center">
    Showing
    {{ $bimbingans->firstItem() }}
    to
    {{ $bimbingans->lastItem() }}
    of
    {{ $bimbingans->total() }}
    enteries
</div>
<div class="d-flex justify-content-center">
    {{ $bimbingans->links() }}
</div>
@if($role == 'Pembimbing 1')
<div class="col-12 mt-2">
    <a class="btn " href="/dosen/pembimbing-1/form-bimbingan" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
@elseif ($role == 'Pembimbing 2')
<div class="col-12 mt-2">
    <a class="btn " href="/dosen/pembimbing-2/form-bimbingan" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
@endif
@elseif ($role == 'Pembimbing 2')
<div class="row align-items-start mt-2">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly value="{{ $nim }}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" readonly value="{{ $name }}">
        </div>
    </div>
</div>
<table class=" table table-hover table-sm mt-3">
    <thead>
        <tr>
            <th style="width: 10%" scope="col">NO
            </th>
            <th style="width: 20%" scope="col">Tanggal & Waktu</th>
            <th style="width: 30%" scope="col">Pokok Pembahasan</th>
            <th style="width: 20%" scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    @foreach ($bimbingans as $key=> $bimbingan)
    <tbody>
        <tr>
            <th scope="row">{{ $bimbingans->firstItem()+ $key}}
            </th>
            <td>{{ $bimbingan->waktu }}</td>
            <td>{{ $bimbingan->pokok_materi }}</td>
            @if(!isset($bimbingan->setuju))
            <td></td>
            @elseif ($bimbingan->setuju)
            <td><button class="btn btn-success">Disetujui</button></td>
            @else
            <td><button class="btn btn-danger">Ditolak</button></td>
            @endif
            <td><a class="btn btn-warning"
                    href="/dosen/pembimbing-2/form-bimbingan/{{ $mahasiswa_id }}/bimbingan-{{$bimbingans->firstItem()+ $key}}"><i
                        class="fa-solid fa-align-left"></i> Detail</a></td>
        </tr>
    </tbody>
    @endforeach
</table>
<div class="d-flex justify-content-center">
    Showing
    {{ $bimbingans->firstItem() }}
    to
    {{ $bimbingans->lastItem() }}
    of
    {{ $bimbingans->total() }}
    enteries
</div>
<div class="d-flex justify-content-center">
    {{ $bimbingans->links() }}
</div>
@if($role == 'Pembimbing 1')
<div class="col-12 mt-2">
    <a class="btn " href="/dosen/pembimbing-1/form-bimbingan" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
@elseif ($role == 'Pembimbing 2')
<div class="col-12 mt-2">
    <a class="btn " href="/dosen/pembimbing-2/form-bimbingan" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
@endif
@endif
</div>

@endsection
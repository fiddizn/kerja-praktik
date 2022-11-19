@extends('layouts/main')
@section('container')

<h2 class="text-center">Form Bimbingan</h2>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row align-items-start">
    <div class="row g-1 ps-4">
        <div class="col-md-6">
            <label for="nim" class="form-label">NID</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly value="{{ $nid }}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Pembimbing 2</label>
            <input type="text" class="form-control" name="name" id="name" readonly value="{{ $name }}">
        </div>
    </div>
</div>
<div class="p-2 mt-2">
    <a class="btn" style="background-color:#ff8c1a; width: 8rem;"
        href="/mahasiswa/form-bimbingan/pembimbing-2/create"><i class="fa-solid fa-plus"></i>
        Bimbingan</a>
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
            @if($bimbingan->setuju == false && isset($bimbingan->setuju))
            <td>
                <a class="btn btn-warning"
                    href="/mahasiswa/form-bimbingan/pembimbing-2/{{ $bimbingans->firstItem()+ $key}}/edit"><i
                        class="fa-solid fa-pen-to-square"></i> Update</a>
            </td>
            @else
            <td><a class="btn btn-warning"
                    href="/mahasiswa/form-bimbingan/pembimbing-2/{{ $bimbingans->firstItem()+ $key}}"><i
                        class="fa-solid fa-align-left"></i> Detail</a></td>
            @endif
        </tr>
    </tbody>
    @endforeach
</table>
<div class="d-flex justify-content-between">
    <div>
        <a class="btn" href="/mahasiswa/form-bimbingan" role="button"
            style="background-color:#ff8c1a; width: 6rem;">Back</a>
    </div>
    <div>
        Showing
        {{ $bimbingans->firstItem() }}
        to
        {{ $bimbingans->lastItem() }}
        of
        {{ $bimbingans->total() }}
        enteries
    </div>
    <div>
        {{ $bimbingans->links() }}
    </div>
    <!-- <div class="position-fixed"
                    style="position:absolute; bottom: 2rem; left: 50%; transform: translate(-50%, -10%);">

                </div> -->
</div>
@endsection
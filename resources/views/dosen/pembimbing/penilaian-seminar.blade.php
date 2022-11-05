@extends('layouts/main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex mt-4">
    <div class="me-auto p-2">
        @if ($role == 'Pembimbing 1')
        <form action="/dosen/pembimbing-1/penilaian-seminar">
            @elseif ($role == 'Pembimbing 2')
            <form action="/dosen/pembimbing-2/penilaian-seminar">
                @endif
                <div class="input-group" style=" width: 100%;">
                    <input type=" text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <div class=" input-group-append">
                        <button class="btn ms-3" type="submit" style="background-color:#ff8c1a;" "><i class=" fa-solid
                            fa-magnifying-glass"></i> Search</button>
                    </div>
                </div>
            </form>
    </div>
    <div class=" p-2">

    </div>
    <div class="p-2">

    </div>
</div>
<h2 class="text-center">{{ $title }}</h2>
<table class="table table-hover table-sm mt-3">
    <thead>
        <tr>
            <th scope="col">NO
                <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                </span>
            </th>
            <th scope="col">NIM
                <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                </span>
            </th>
            <th scope="col">Nama
                <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                </span>
            </th>
            <th scope="col">Peminatan
                <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                </span>
            </th>
            <th scope="col">Status
                <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                </span>
            </th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    @foreach ($mahasiswas as $key=> $mahasiswa)
    <tbody>
        <tr>
            <th scope="row">{{ $mahasiswas->firstItem()+ $key}}</th>
            <td>{{ $mahasiswa->mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->mahasiswa->name }}</td>
            <td>{{ $mahasiswa->mahasiswa->pendaftaranseminar->peminatan }}</td>
            @if ($role == 'Pembimbing 1')
            @if ($mahasiswa->p1_materi != null)
            <td><i class="fa-solid fa-check"></i></td>
            @else
            <td></td>
            @endif
            @else
            @if ($mahasiswa->p2_materi != null)
            <td><i class="fa-solid fa-check"></i></td>
            @else
            <td></td>
            @endif
            @endif
            <td>
                @if ($role == 'Pembimbing 1')
                <a class="btn" href="/dosen/pembimbing-1/penilaian-seminar/{{ $mahasiswa->id }}"
                    style="background-color:#ff8c1a;"><i class="fa-solid fa-align-left"></i>
                    Detail</a>
                @else
                <a class="btn" href="/dosen/pembimbing-2/penilaian-seminar/{{ $mahasiswa->id }}"
                    style="background-color:#ff8c1a;"><i class="fa-solid fa-align-left"></i>
                    Detail</a>
                @endif
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
<div class="position-relative">
    @if ($role == 'Pembimbing 1')
    <a class="btn my-3
    " href="/dosen/pembimbing-1" role="button" style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
    @else
    <a class="btn my-3
    " href="/dosen/pembimbing-2" role="button" style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
    @endif
</div>
@endsection
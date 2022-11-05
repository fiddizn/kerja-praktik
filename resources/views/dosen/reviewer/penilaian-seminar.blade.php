@extends('layouts/main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center">{{ $title }}</h2>
<div class="d-flex mt-4">
    <div class="me-auto p-2">
        @if ($role == 'Reviewer 1')
        <form action="/dosen/reviewer-1/penilaian-seminar">
            @elseif ($role == 'Reviewer 2')
            <form action="/dosen/reviewer-2/penilaian-seminar">
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
            @if ($role == 'Reviewer 1')
            @if ($mahasiswa->r1_presentasi != null)
            <td><i class="fa-solid fa-check"></i></td>
            @else
            <td></td>
            @endif
            @else
            @if ($mahasiswa->r2_presentasi != null)
            <td><i class="fa-solid fa-check"></i></td>
            @else
            <td></td>
            @endif
            @endif
            <td>
                @if ($role == 'Reviewer 1')
                <?php
                $mahasiswa_id = $mahasiswa->mahasiswa->id;
                $pendaftaran_id = App\Models\PendaftaranSeminar::where('mahasiswa_id', $mahasiswa_id)->first()->id;
                ?>
                <a class="btn btn-warning"
                    href="/dosen/reviewer-1/penilaian-seminar/{{ $pendaftaran_id }}/downloadFinalProposal"><i
                        class="fa-solid fa-file-arrow-down"></i>
                    Proposal</a>
                <a class="btn" href="/dosen/reviewer-1/penilaian-seminar/{{ $mahasiswa->id }}"
                    style="background-color:#ff8c1a;"><i class="fa-solid fa-align-left"></i>
                    Detail</a>
                @else
                <?php
                $mahasiswa_id = $mahasiswa->mahasiswa->id;
                $pendaftaran_id = App\Models\PendaftaranSeminar::where('mahasiswa_id', $mahasiswa_id)->first()->id;
                ?>
                <a class="btn btn-warning"
                    href="/dosen/reviewer-2/penilaian-seminar/{{ $pendaftaran_id }}/downloadFinalProposal"><i
                        class="fa-solid fa-file-arrow-down"></i>
                    Proposal</a>
                <a class="btn" href="/dosen/reviewer-2/penilaian-seminar/{{ $mahasiswa->id }}"
                    style="background-color:#ff8c1a;"><i class="fa-solid fa-align-left"></i>
                    Detail</a>
                @endif
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
<div class="position-relative">
    @if ($role == 'Reviewer 1')
    <a class="btn my-3
    " href="/dosen/reviewer-1" role="button" style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
    @else
    <a class="btn my-3
    " href="/dosen/reviewer-2" role="button" style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
    @endif
</div>
@endsection
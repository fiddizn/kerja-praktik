@extends('layouts/main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('gagal'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center">{{ $title }}</h2>

<div class="d-flex mt-4">
    <div class="me-auto p-2">
        <form action="/dosen/pembimbing-1/ajuan-pembimbing-1">
            <div class="input-group" style=" width: 100%;">
                <input type=" text" class="form-control" placeholder="Search.." name="search"
                    value="{{ request('search') }}">
                <div class=" input-group-append">
                    <button class="btn ms-3" type="submit" style="background-color:#ff8c1a;" ">Search</button>
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
                        <th scope="col">NO</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Peminatan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @foreach ($pendaftarans as $key=> $item)
                <?php

                if ($namaDosenDanJabfung == $item->alt1_p1) {
                    $ajuanAlternatif = 'persetujuan_alt1_p1';
                } else if ($namaDosenDanJabfung == $item->alt2_p1) {
                    $ajuanAlternatif = 'persetujuan_alt2_p1';
                } else if ($namaDosenDanJabfung == $item->alt3_p1) {
                    $ajuanAlternatif = 'persetujuan_alt3_p1';
                } else if ($namaDosenDanJabfung == $item->alt4_p1) {
                    $ajuanAlternatif = 'persetujuan_alt4_p1';
                }
                ?>

                <tbody>
                    <tr>
                        <th scope="row">
                            <div class="form-check d-inline">
                                <input class="form-check-input" type="checkbox" name="checked[]" value="{{$item->id}}"
                                    id="flexCheckDefault">
                            </div>
                            {{ $pendaftarans->firstItem()+ $key}}
                        </th>
                        <td>{{ $item->mahasiswa->nim }}</td>
                        <td>{{ $item->mahasiswa->name }}</td>
                        <td>{{ $item->mahasiswa->pendaftaran->peminatan }}</td>
                        @if (!isset($item[$ajuanAlternatif]))
                        <td></td>
                        @elseif ($item[$ajuanAlternatif] == 1)
                        <td><i class="fa-solid fa-square-check fa-lg"></i></td>
                        @elseif ($item[$ajuanAlternatif] == 0)
                        <td><i class="fa-solid fa-square-xmark fa-lg"></i></td>
                        @endif
                        <td>
                            @if ($item[$ajuanAlternatif] != 1)
                            <a class="btn btn-success"
                                href="/dosen/pembimbing-1/ajuan-pembimbing-1/setuju-{{ $item->id }}-{{ $ajuanAlternatif }}"
                                type="submit"><i class="fa-solid fa-square-check"></i></a>
                            @endif
                            @if ($item[$ajuanAlternatif] != 0 || !isset($item[$ajuanAlternatif]))
                            <a class="btn btn-danger"
                                href="/dosen/pembimbing-1/ajuan-pembimbing-1/tolak-{{ $item->id }}-{{ $ajuanAlternatif }}"
                                type="submit"><i class="fa-solid fa-square-xmark"></i></a>
                            @endif
                            @if (isset($item[$ajuanAlternatif]))
                            <a class="btn btn-dark"
                                href="/dosen/pembimbing-1/ajuan-pembimbing-1/reset-{{ $item->id }}-{{ $ajuanAlternatif }}"
                                type="submit"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                            @endif
                            <a class="btn" href="{{ route('ajuan-pembimbing-1.show', $item->id) }}" role="button"
                                style="background-color:#ff8c1a;"><i class="fa-solid fa-circle-info"></i>
                                Detail</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

            <div class="d-flex justify-content-between">
                <div>
                    <a class="btn" href="/dosen/pembimbing-1" role="button"
                        style="background-color:#ff8c1a; width: 6rem;">Back</a>
                </div>
                <div>
                    Showing
                    {{ $pendaftarans->firstItem() }}
                    to
                    {{ $pendaftarans->lastItem() }}
                    of
                    {{ $pendaftarans->total() }}
                    enteries
                </div>
                <div>
                    {{ $pendaftarans->links() }}
                </div>
            </div>
            @endsection
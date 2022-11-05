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
        <form action="/dosen/pembimbing-2/ajuan-pembimbing-2">
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

                if ($namaDosenDanJabfung == $item->alt1_p2) {
                    $ajuanAlternatif = 'persetujuan_alt1_p2';
                } else if ($namaDosenDanJabfung == $item->alt2_p2) {
                    $ajuanAlternatif = 'persetujuan_alt2_p2';
                } else if ($namaDosenDanJabfung == $item->alt3_p2) {
                    $ajuanAlternatif = 'persetujuan_alt3_p2';
                } else if ($namaDosenDanJabfung == $item->alt4_p2) {
                    $ajuanAlternatif = 'persetujuan_alt4_p2';
                }
                ?>

                <tbody>
                    <tr>
                        <th scope="row">{{ $pendaftarans->firstItem()+ $key}}</th>
                        <td>{{ $item->mahasiswa->nim }}</td>
                        <td>{{ $item->mahasiswa->name }}</td>
                        <td>{{ $item->mahasiswa->pendaftaran->peminatan }}</td>
                        @if (!isset($item[$ajuanAlternatif]))
                        <td></td>
                        @elseif ($item[$ajuanAlternatif] == 1)
                        <td><i class="fa-solid fa-square-check fa-lg"></i></i></td>
                        @elseif ($item[$ajuanAlternatif] == 0)
                        <td><i class="fa-solid fa-square-xmark fa-lg"></i></td>
                        @endif
                        <td>
                            <form id="form1" method="post" style="display: inline;"
                                action="/dosen/pembimbing-2/ajuan-pembimbing-2/{{ $item->id }}-{{ $ajuanAlternatif }}">
                                @csrf
                                <input type="hidden" id="ajuan" name="{{ $ajuanAlternatif }}" value=1>
                                <button class="btn btn-success" type="submit"><i class="fa-solid fa-square-check"></i>
                                    Setuju</button>
                            </form>
                            <form id="form2" style="display: inline;" method="post"
                                action="/dosen/pembimbing-2/ajuan-pembimbing-2/{{ $item->id }}-{{ $ajuanAlternatif }}">
                                @csrf
                                <input type="hidden" id="ajuan" name="{{ $ajuanAlternatif }}" value=0>
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-square-xmark"></i>
                                    Tolak</button>
                                <a class="btn" href="{{ route('ajuan-pembimbing-2.show', $item->id) }}" role="button"
                                    style="background-color:#ff8c1a;"><i class="fa-solid fa-circle-info"></i>
                                    Detail</a>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

            <div class="d-flex justify-content-between">
                <div>
                    <a class="btn" href="/dosen/pembimbing-2" role="button"
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
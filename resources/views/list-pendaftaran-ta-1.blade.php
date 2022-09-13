@extends('layouts/main')
@section('container')

<h2 style="text-align:center;">List Pendaftaran TA 1</h2>

<table class="table table-hover mt-5">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Peminatan</th>
            <th scope="col">Judul</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    @foreach ($pendaftarans as $pendaftaran)
    <tbody>
        <tr>
            <th scope="row">{{ $pendaftaran->id }}</th>
            <td>{{ $pendaftaran->nim }}</td>
            <td>{{ $pendaftaran->mahasiswa->name }}</td>
            <td>{{ $pendaftaran->peminatan }}</td>
            <td>{{ $pendaftaran->judul_ta1 }}</td>
            <td>{{ $pendaftaran->status }}</td>
            <td>
                <a class="btn my-1" href="/koordinator/list-pendaftaran-ta-1/detail-mahasiswa-{{ $pendaftaran->id }}"
                    role="button" style="background-color:#ff8c1a;">Detail</a>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection
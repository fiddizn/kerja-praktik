@extends('layouts/main')
@section('container')

<h2 class="text-center">Plotting Dosen Reviewer</h2>

<div class="row align-items-start">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly
                value="{{ $pendaftaran->mahasiswa->nim }}" disabled>
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" readonly
                value="{{ $pendaftaran->mahasiswa->name }}" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <form action="/koordinator/plotting-dosen-reviewer/{{ $pendaftaran->mahasiswa->id }}" method="post"
            id="plotting">
            @method('put')
            @csrf
            <div class="row mt-5">
                <label for=" r1" class="col-sm-3 col-form-label">Reviewer 1</label>
                <div class="col">
                    <select type="text" class="form-select" name="r1" id="r1">
                        <option selected disabled>Pilih...</option>
                        @foreach ($list_r1 as $r1)
                        <option>{{ $r1->dosen->name }} ({{ $r1->dosen->jabfun->name }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <table class="table table-hover mt-3" style="min-height: 210px;">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">R1</th>
                </tr>
            </thead>
            @foreach ($list_dosen as $key=> $dosen)
            <tbody>
                <tr>
                    <th scope="row">{{$list_dosen->firstItem()+ $key}}</th>
                    <td>{{ $dosen->name }}</td>
                    <td>{{ $dosen->jabfun->name }}</td>
                    @if($dosen->reviewer1 != null)
                    <td>{{ $mahasiswa->where('r1_id',$dosen->reviewer1->id)->count() }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
            </tbody>
            @endforeach
        </table>
        {{ $list_dosen->links() }}
    </div>
</div>
<div class="row mt-2">
    <a class="btn" href="/koordinator/plotting-dosen-reviewer" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    <button form="plotting" type="submit" class="btn ms-3" style="width: 5rem;background-color:#ff8c1a;">Sumbit</button>
</div>

@endsection
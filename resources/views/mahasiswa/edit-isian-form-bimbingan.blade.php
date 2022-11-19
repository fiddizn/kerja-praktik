@extends('layouts/main')
@section('container')
@if($bimbingan_ke == null)
<h2 class="text-center mb-5">Form Bimbingan</h2>
@else
<h2 class="text-center mb-5">Update Form Bimbingan {{$bimbingan_ke}}</h2>
@endif
@if($bimbingan_ke == null)
<form class="row my-2" action="/mahasiswa/form-bimbingan/{{$bimbingan_ke}}" method="POST">
    @else
    @if ($is_p1 == true)
    <form class="row my-2" action="/mahasiswa/form-bimbingan/pembimbing-1/{{$bimbingan_ke}}/edit" method="POST">
        @else
        <form class="row my-2" action="/mahasiswa/form-bimbingan/pembimbing-2/{{$bimbingan_ke}}/edit" method="POST">
            @endif
            @endif
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="tanggal_waktu" class="form-label">Tanggal & Waktu</label>
                    <div class="input-group date" id="datetimepicker">
                        <input type="text" class="form-control" name="tanggal_waktu" id="tanggal_waktu"
                            value="{{ $bimbingan->waktu }}" required>
                        <div class=" input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <label for="pokok_materi" class="form-label">Pokok Materi</label>
                    <input type="text" class="form-control" name="pokok_materi" value="{{ $bimbingan->pokok_materi }}"
                        required>
                </div>
            </div>
            <div class="row my-3">
                <div class="form-group">
                    <label for="pembahasan_bimbingan" class="mb-2">Pembahasan / Hasil / Saran / Tugas</label>
                    <input id="pembahasan_bimbingan" type="hidden" name="pembahasan_bimbingan"
                        value="{!! $bimbingan->pembahasan !!}" required>
                    <trix-editor input="pembahasan_bimbingan"></trix-editor>
                </div>
            </div>
            <div class="col-12 mt-5">
                @if ($is_p1)
                <a class="btn " href="/mahasiswa/form-bimbingan/pembimbing-1" role="button"
                    style="width: 5rem;background-color:#ff8c1a;">Back</a>
                @else
                <a class="btn " href="/mahasiswa/form-bimbingan/pembimbing-2" role="button"
                    style="width: 5rem;background-color:#ff8c1a;">Back</a>
                @endif
                @if ($is_p1)
                <input type="hidden" name="is_p1" value="{{ auth()->user()->bimbingan->pembimbing1->dosen->name}}">
                @else
                <input type="hidden" name="is_p1" value="{{ auth()->user()->bimbingan->pembimbing2->dosen->name}}">
                @endif
                <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
            </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
        <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault
        })
        </script>
        <script src="/js/bootstrap-datetimepicker.min.js"></script>
        <script>
        $(function() {
            $.extend(true, $.fn.datetimepicker.defaults, {
                icons: {
                    time: 'far fa-clock',
                    date: 'far fa-calendar',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'far fa-calendar-check-o',
                    clear: 'far fa-trash',
                    close: 'far fa-times'
                }
            });
        });
        </script>
        <script type="text/javascript">
        $(function() {
            $('#datetimepicker').datetimepicker();
        });
        </script>
        @endsection
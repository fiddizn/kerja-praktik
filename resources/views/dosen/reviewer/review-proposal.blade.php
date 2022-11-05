@extends('layouts/main')
@section('container')
<h2 class="text-center">Review Proposal</h2>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="me-auto p-2">
    <form action="/dosen/reviewer-1/review-proposal">
        <div class="input-group" style=" width: 30%;">
            <input type=" text" class="form-control" placeholder="Search.." name="search"
                value="{{ request('search') }}">
            <div class=" input-group-append">
                <button class="btn ms-3" type="submit" style="background-color:#ff8c1a;" ">Search</button>
                </div>
            </div>
        </form>
    </div>
<table class=" table table-hover table-sm mt-3">
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
                    @foreach ($list_review as $key=> $review)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $list_review->firstItem()+ $key}}</th>
                            <td>{{ $review->pendaftaran->mahasiswa->nim }}</td>
                            <td>{{ $review->pendaftaran->mahasiswa->name }}</td>
                            <td>{{ $review->pendaftaran->peminatan }}</td>
                            @if ($review->r1_penilaian1)
                            <td><i class="fa-solid fa-check"></i></td>
                            @else
                            <td><i class="fa-solid fa-minus"></i></td>
                            @endif
                            <td>
                                <a class="btn"
                                    href="/dosen/reviewer-1/review-proposal/downloadBerkasTa1-{{ $review->pendaftaran->id }}"
                                    style="background-color:#ff8c1a;"><i class="fa-solid fa-download"></i>
                                    Berkas</a>
                                @if ($review->r1_penilaian1)
                                <a class="btn btn-warning disabled"
                                    href="/dosen/reviewer-1/review-proposal/formReview-{{ $review->id }}"><i
                                        class="fa-solid fa-align-left"></i>
                                    Review</a>
                                @else
                                <a class="btn btn-warning"
                                    href="/dosen/reviewer-1/review-proposal/formReview-{{ $review->id }}"><i
                                        class="fa-solid fa-align-left"></i>
                                    Review</a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    </table>

                    <div class="row">
                        <div class="col">
                            <a class="btn" href="/dosen/reviewer-1" role="button"
                                style="background-color:#ff8c1a; width: 6rem;">Back</a>
                        </div>
                        <div class="col">
                            Showing
                            {{ $list_review->firstItem() }}
                            to
                            {{ $list_review->lastItem() }}
                            of
                            {{ $list_review->total() }}
                            enteries
                        </div>
                        <div>
                            {{ $list_review->links() }}
                        </div>
                    </div>
            </div>
            @endsection
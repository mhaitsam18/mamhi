@extends('layouts.member-main')
@section('content')
<div class="">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-3">
            <div>
                <h4 class="mb-3 mb-md-0" style="font-style: italic">Artikel</h4>
            </div>
        </div>
    
    
    
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        @foreach ($artikels as $artikel)
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <img src="{{ asset('storage/'.$artikel->thumbnail) }}" class="img-thumbnail w-100" alt="">
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="">{{ $artikel->judul }}</h3>
                                    <p class="mb-3" style="text-align: justify;">{{ $artikel->kutipan }}</p>
                                    <a href="/member/artikel/{{ $artikel->id }}" class="btn btn-primary btn-sm">baca selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
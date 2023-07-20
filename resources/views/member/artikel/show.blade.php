@extends('layouts.member-main')
@section('content')
<div class="">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-3">
            <div>
                <h2 class="mb-3 mb-md-0" style="font-style: italic">{{ $artikel->judul }}</h2>
            </div>
        </div>
    
    
    
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <img src="{{ asset('storage/'.$artikel->thumbnail) }}" class="img-thumbnail w-50" alt="">
                        <p class="mb-3 p-3" style="text-align: justify;">{!! $artikel->konten !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
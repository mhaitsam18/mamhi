@extends('layouts.member-main')

@section('content')
<div class="page-content">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h2 class="mb-3 mb-md-0">Daftar Rekomendasi Tenaga Ahli</h2>
                <h4 class="mb-3 mb-md-0">Konsultasi online dengan tenga ahli kami </h4>
            </div>
            
        </div>

        <div class="row">
            @foreach ($psikologs as $psikolog)
                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title text-center">{{ $psikolog->user->name }}</h5>
                            <div class="text-center m-2">
                                <img src="{{ asset('storage/'.$psikolog->user->foto) }}" alt="" class="img-thumbnail w-100">
                            </div>
                            <div class="text-center d-grid ">
                                <a href="/member/psikolog/{{ $psikolog->id }}" class="btn btn-warning btn-block">Lihat Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
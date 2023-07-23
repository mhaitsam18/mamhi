@extends('layouts.member-main')

@section('content')
<div class="page-content">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-3">
            <div>
                <h2 class="mb-3 mb-md-0">{{ $title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="{{ asset('storage/'.$psikolog->user->foto) }}" alt="" class="img-thumbnail w-100 img-preview">
                            </div>
                            <div class="col-lg-9">
                                <ul>
                                    <li>Kode Psikolog : {{ $psikolog->kode_psikolog }}</li>
                                    <li>Nama Lengkap :{{ $psikolog->user->name }}</li>
                                    <li>Email : {{ $psikolog->user->email }}</li>
                                    <li>Nomor Telepon : {{ $psikolog->user->no_hp }}</li>
                                    <li>Keahlian : {{ $psikolog->jenis_keahlian }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
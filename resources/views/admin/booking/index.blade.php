@extends('layouts.admin-main')
@section('style')
<style>
    .clickable-card {
        cursor: pointer;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .clickable-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

</style>
@endsection
@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">{{ $title }}</h4>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h1>Anda mau booking apa?</h1>
                <div class="container">
                    <div class="row p-4">
                        <div class="col-md-6">
                            <a href="/admin/booking/konsultasi">
                                <div class="card clickable-card">
                                    <div class="card-body">
                                        <h1>Konsultasi</h1>
                                        <img src="/assets/img/app/konsultasi.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="/admin/booking/psikotes">
                                <div class="card clickable-card">
                                    <div class="card-body">
                                        <h1>Psikotes</h1>
                                        <img src="/assets/img/app/psikotes.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

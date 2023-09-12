@extends('layouts.member-main')
@section('style')
	<!-- Plugin css for this page -->
    <link rel="stylesheet" href="/assets-nobleui/vendors/owl.carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets-nobleui/vendors/owl.carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets-nobleui/vendors/animate.css/animate.min.css">
	<!-- End plugin css for this page -->
@endsection
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-3">
        <div>
            <h4 class="mb-3 mb-md-0 color-mamhi" style="font-style: italic">Your mental health is a priority</h4>
        </div>
        {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar"
                        class=" text-primary"></i></span>
                <input type="text" class="form-control border-primary bg-transparent">
            </div>
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Download Report
            </button>
        </div> --}}
    </div>

    <div class="row justify-content-between">

        <div class="col-xl-2 col-md-2 grid-margin stretch-card">
            <img src="{{ asset('assets/img/logos/Logo CV Mamhi (fix).png') }}" alt="" width="100%">
        </div>

        <div class="col-xl-6 col-md-6 grid-margin position-relative" style="margin-right: -50px">
            <img src="{{ asset('assets/img/app/vector-1.png') }}" alt="" srcset=""
                class="position-relative top-25 end-0" style="max-height: 100%; max-width: 100%;">

        </div>

        {{-- <div class="col-xl-6 col-md-6 col-sm-12 grid-margin position-relative" style="background-color: beige;">
            <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                <img src="{{ asset('assets/img/app/vector-1.png') }}" alt="" srcset=""
                    style="max-height: 100%; max-width: 100%;">
            </div>
        </div> --}}



    </div>



    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h6 class="card-title text-warning">Profil Psikolog</h6>
                    <div class="row">
                        <div class="col-lg-3">
                            <h5 class="text-warning">CV MAMHI</h5>
                            {{-- <h5 class="text-warning"></h5> --}}
                            <hr>
                            <p class="text-warning mb-3">Yuk kenali lebih jauh 10+ <br>Psikolg Profesional kami</p>
                            <ul>
                                <li><a href="https://instagram.com/biro.psikologi_mamhi" class="text-dark"><i class="mb-1 text-dark ms-1 icon-sm" data-feather="instagram"></i> biro.psikologi_mamhi</a></li>
                                <li><a href="https://www.facebook.com/biropsikologimamhi" class="text-dark"><i class="mb-1 text-dark ms-1 icon-sm" data-feather="facebook"></i> biro psikologi mamhi</a></li>
                                <li><a href="https://www.tiktok.com/@mamhiofficial" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" class="mb-1 text-dark ms-1 icon-sm" height="1em" viewBox="0 0 448 512"><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg> mamhiofficial</a></li>
                                <li><a href="https://g.co/kgs/ejWm9R" class="text-dark"><i class="mb-1 text-dark ms-1 icon-sm" data-feather="map-pin"></i> Ruko R4 BCV II, Jl. Pasir Impun, Karang Pamulang, Mandalajati, Bandung City, West Java 40195</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                            <div class="owl-carousel owl-theme owl-auto-play">
                                @foreach ($psikologs as $psikolog)
                                    <div class="item">
                                        <div class="card" style="min-height: 450px;">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <div class="text-center m-2">
                                                    <img src="{{ asset('storage/'.$psikolog->user->foto) }}" alt="" class="w-100">
                                                </div>
                                                <h5 class="card-title text-center">{{ $psikolog->user->name }}</h5>
                                                <ul>
                                                    <li>{{ $psikolog->jenis_keahlian }}</li>
                                                </ul>
                                                <div class="text-center d-grid ">
                                                    <a href="/member/psikolog/{{ $psikolog->id }}" class="btn btn-warning text-bold text-white btn-block">Lihat Profil</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <h2 class="text-warning mb-3">Check out our YouTube Video</h2>
                    <div class="row">
                        <div class="col-lg-4">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/WGwXEOG-9m4" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="col-lg-8 d-flex align-items-center justify-content-center">
                            <h3 class="">Overthinking itu Bahaya gak sih?</h3>
                            {{-- <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
	<!-- Plugin js for this page -->
    <script src="/assets-nobleui/vendors/owl.carousel/owl.carousel.min.js"></script>
    <script src="/assets-nobleui/vendors/jquery-mousewheel/jquery.mousewheel.js"></script>
	<!-- End plugin js for this page -->

	<!-- Custom js for this page -->
    <script src="/assets-nobleui/js/carousel.js"></script>
	<!-- End custom js for this page -->

@endsection

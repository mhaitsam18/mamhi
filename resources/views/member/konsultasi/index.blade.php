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
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-3">
            <div>
                <h2 class="mb-3 mb-md-0" style="font-style: italic">Konsultasi</h2>
            </div>
        </div>
    
    
    
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <p class="mb-3" style="text-align: justify">
                            Reservasi konsultasi dengan tenga ahli kami 
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="/assets/img/app/image-2.png" class="w-100">
                            </div>
                            <div class="col-lg-6">
                                Kami melayani :
                                <ul>
                                    <li>Konsultasi Psikologi</li>
                                    <li>Psikoterapi</li>
                                    <li>Psikotes</li>
                                    <li>Asesmen</li>
                                    <li>Pelatihan dan Pengembangan</li>
                                </ul>
                                <a class="btn btn-sm btn-warning" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Konsultasi sekarang</a>
                                <div class="row">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="card card-body">
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Pilih Tanggal" aria-label="Pilih Tanggal" aria-describedby="button-addon2">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Cek Jadwal</button>  
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="collapse multi-collapse" id="multiCollapseExample2">
                                <div class="card card-body">
                                    <h3>Pilih Jadwal Tersedia</h3>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </div>
                            </div>
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
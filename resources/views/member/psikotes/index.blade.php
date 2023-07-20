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
                <h2 class="mb-3 mb-md-0" style="font-style: italic">Psikotes</h2>
            </div>
        </div>
    
    
    
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <h2 class="card-title mb-3">Apa itu Psikotes?</h2>
                        <p class="mb-3" style="text-align: justify">
                            Psikotes adalah serangkaian tes yang dilakukan oleh psikolog (profesional) atas permintaan klien (individu atau organisasi) untuk memberikan gambaran utuh tentang aspek-aspek psikologis seseorang sesuai dengan kebutuhan dan keperluan klien.
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="/assets/img/app/image-2.png" class="w-100">
                            </div>
                            <div class="col-lg-6">
                                Untuk Keperluan :
                                <ul>
                                    <li>Psikotes Potensi atau Intelegensi</li>
                                    <li>Psikotes Kesiapan Sekolah</li>
                                    <li>Psikotes Minat Bakat</li>
                                    <li>Psikotes Seleksi Kerja</li>
                                </ul>
                                <a href="/member/psikotes/create" class="btn btn-sm btn-warning">Tes sekarang</a>
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
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
                                <a class="btn btn-sm btn-warning mb-3 me-1" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Konsultasi sekarang</a>
                                <a href="/member/konsultasi/konsultasi-saya" class="btn btn-sm btn-info  mb-3 me-3">Lihat Konsultasi Saya</a>
                                <div class="row">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="card card-body">
                                            <div class="mb-3">
                                                <textarea name="keluhan" id="keluhan" cols="30" rows="5" class="form-control" placeholder="Tulis Keluhan Anda"></textarea>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" min="<?= date('Y-m-d') ?>" name="tanggal" id="tanggal" placeholder="Pilih Tanggal" aria-label="Pilih Tanggal" aria-describedby="button-cek-jadwal">
                                                <button class="btn btn-outline-secondary" type="button" id="button-cek-jadwal" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Cek Jadwal</button>  
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
                                    <div id="pilih-jadwal"></div>
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#button-cek-jadwal').click(function () {
                // Ambil data dari input
                var tanggal = $('#tanggal').val();
                var keluhan = $('#keluhan').val();

                // Kirimkan data melalui AJAX menggunakan metode POST
                $.ajax({
                    url: '{{ route("member.jadwal.pilih-jadwal") }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}', // Untuk melindungi dari CSRF
                        'tanggal': tanggal,
                        'keluhan': keluhan,
                        'aksi': 'konsultasi',
                    },
                    dataType: 'json',
                    success: function (response) {
                        // Ganti isi div dengan konten yang diperoleh dari view partial
                        $('#pilih-jadwal').html(response.content);
                    },
                    error: function () {
                        // Tangani jika terjadi kesalahan ketika melakukan permintaan AJAX
                        alert('Terjadi kesalahan saat memuat view.');
                    }
                });
            });
        });
    </script>

@endsection
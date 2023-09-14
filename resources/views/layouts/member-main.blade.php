<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Purchase: https://1.envato.market/nobleui_admin
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="/assets-nobleui/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/assets-nobleui/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="/assets-nobleui/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="/assets-nobleui/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets-nobleui/css/demo3/style.css">
    <!-- End layout styles -->

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/logos/mamhi.png" />


	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="/assets-nobleui/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<!-- End plugin css for this page -->

    <style>
        .color-mamhi {
            color: #F29F27;
        }
    </style>
    @yield('style')
</head>

<body>
    <div class="main-wrapper">
        <div class="flash-data" data-success="{{ session()->get('success') }}" data-error="@if ($errors->any()) Terjadi kesalahan, periksa kembali data yang Anda masukkan! @else{{ session()->get('error') }}@endif" data-warning="{{ session()->get('warning') }}"></div>

        <!-- partial:partials/_navbar.html -->
        @include('layouts.member-navbar')

        <div class="" id="background-mamhi">

            <div class="container-fluid">

                @yield('content')

            </div>

            <!-- partial:partials/_footer.html -->
            <footer class="footer border-top">
                <div class="container justify-content-between pt-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Tentang Kami</h3>
                            <p class="text-justify" style="text-align: justify;">
                                Biro Psikologi MAMHI adalah sebuah perusahaan jasa psikologi yang bergerak dibidang pelayanan kesehatan mental dimana kami hadir secara profesional mendampingi klien untuk mengoptimalkan potensi diri sehingga lebih adaptif dan terarah dalam berfikir, mengendalikan emosi, bersikap dan berperilaku di lingkungan.
                            </p>
                            <h3>Layanan Kami</h3>
                            <ul>
                                <li>Konsultasi Psikologi</li>
                                <li>Psikoterapi</li>
                                <li>Psikotes</li>
                                <li>Asesmen</li>
                                <li>Pelatihan dan Pengembangan</li>
                            </ul>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <h3>Kontak Kami</h3>
                            <ul>
                                <li><a href="https://instagram.com/biro.psikologi_mamhi" class="text-dark"><i class="mb-1 text-dark ms-1 icon-sm" data-feather="instagram"></i> biro.psikologi_mamhi</a></li>
                                <li><a href="https://www.facebook.com/biropsikologimamhi" class="text-dark"><i class="mb-1 text-dark ms-1 icon-sm" data-feather="facebook"></i> biro psikologi mamhi</a></li>
                                <li><a href="https://www.tiktok.com/@mamhiofficial" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" class="mb-1 text-dark ms-1 icon-sm" height="1em" viewBox="0 0 448 512"><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg> mamhiofficial</a></li>
                                <li><a href="https://g.co/kgs/ejWm9R" class="text-dark"><i class="mb-1 text-dark ms-1 icon-sm" data-feather="map-pin"></i> Ruko R4 BCV II, Jl. Pasir Impun, Karang Pamulang, Mandalajati, Bandung City, West Java 40195</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between pb-3 small">
                    <p class="text-muted mb-1 mb-md-0">Copyright © 2023 <a href="https://www.nobleui.com" target="_blank">MAMHI</a>.</p>
                    <p class="text-muted">Handcrafted By Zitha & Derisa With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
                </div>
            </footer>
            <!-- partial -->

        </div>
    </div>
    @yield('modal')

    <!-- core:js -->
    <script src="/assets-nobleui/vendors/core/core.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="/assets-nobleui/vendors/chartjs/Chart.min.js"></script>
    <script src="/assets-nobleui/vendors/jquery.flot/jquery.flot.js"></script>
    <script src="/assets-nobleui/vendors/jquery.flot/jquery.flot.resize.js"></script>
    <script src="/assets-nobleui/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/assets-nobleui/vendors/apexcharts/apexcharts.min.js"></script>
    <!-- End plugin js for this page -->

    <!-- Plugin js for this page -->
    <script src="/assets-nobleui/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="/assets-nobleui/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page -->

    <!-- Custom js for this page -->
    <script src="/assets-nobleui/js/data-table.js"></script>

    <!-- inject:js -->
    <script src="/assets-nobleui/vendors/feather-icons/feather.min.js"></script>
    <script src="/assets-nobleui/js/template.js"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="/assets-nobleui/js/dashboard-light.js"></script>
    <script src="/assets-nobleui/js/datepicker.js"></script>
    <!-- End custom js for this page -->

    <!-- End custom js for this page -->

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <!-- Misalnya, jika Anda menggunakan adapter untuk tampilan pratinjau -->
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>


    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const success = $('.flash-data').data('success');
        if (success) {
            //'Data ' +
            Swal.fire({
                title: 'Berhasil',
                text: success,
                icon: 'success'
            });
        }
        const error = $('.flash-data').data('error');
        if (error) {
            //'Data ' +
            Swal.fire({
                title: 'Gagal',
                text: error,
                icon: 'error'
            });
        }
        const warning = $('.flash-data').data('warning');
        if (warning) {
            //'Data ' +
            Swal.fire({
                title: 'Perhatian',
                text: warning,
                icon: 'warning'
            });
        }
        $('.tombol-hapus').on('click', function(e) {
            e.preventDefault(); // Mencegah pengiriman formulir secara langsung

            const form = $(this).closest('form'); // Menemukan formulir terdekat

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data ini akan dihapus!",
                icon: 'warning',
                confirmButtonText: 'Hapus',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Mengirimkan formulir setelah konfirmasi
                }
            });
        });
    </script>
    @yield('script')
</body>

</html>

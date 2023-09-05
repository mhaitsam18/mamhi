@extends('layouts.admin-main')
@section('style')
<!-- Plugin css for this page -->
<link rel="stylesheet" href="/assets-nobleui/vendors/owl.carousel/owl.carousel.min.css">
<link rel="stylesheet" href="/assets-nobleui/vendors/owl.carousel/owl.theme.default.min.css">
<link rel="stylesheet" href="/assets-nobleui/vendors/animate.css/animate.min.css">
<!-- End plugin css for this page -->
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
                        <a class="btn btn-sm btn-warning mb-3 me-1" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Isi Form Booking</a>
                        <div class="row">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">
                                    <div class="mb-3">
                                        <label for="member_id" class="form-label">Nama Member</label>
                                        <select name="member_id" id="member_id" class="form-select @error('member_id') is-invalid @enderror">
                                            <option value="" selected disabled>Pilih Member</option>
                                            @foreach ($members as $member)
                                                <option value="{{ $member->id }}">{{ $member->user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('member_id')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <select name="jenis_psikotes_id" id="jenis_psikotes_id" cols="30" rows="5" class="form-select @error('jenis_psikotes_id') is-invalid @enderror">
                                            <option value="" selected disabled>Pilih jenis Psikotes</option>
                                            @foreach ($jenis_psikotess as $jenis_psikotes)
                                                <option value="{{ $jenis_psikotes->id }}" @selected($jenis_psikotes->id == old('jenis_psikotes_id'))>{{ $jenis_psikotes->jenis_psikotes }}</option>
                                            @endforeach
                                        </select>
                                        @error('jenis_psikotes_id')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <textarea name="kebutuhan" id="kebutuhan" cols="30" rows="5" class="form-control @error('kebutuhan') is-invalid @enderror" placeholder="Tulis kebutuhan Anda"></textarea>
                                        @error('kebutuhan')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control @error('tanggal_psikotes') is-invalid @enderror" min="<?= date('Y-m-d') ?>" name="tanggal" id="tanggal" placeholder="Pilih Tanggal" aria-label="Pilih Tanggal" aria-describedby="button-cek-jadwal">
                                        <button class="btn btn-outline-secondary" type="button" id="button-cek-jadwal" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Cek Jadwal</button>
                                    </div>
                                    @error('tanggal_psikotes')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @error('jadwal_id')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#button-cek-jadwal').click(function () {
                // Ambil data dari input
                var tanggal = $('#tanggal').val();
                var kebutuhan = $('#kebutuhan').val();
                var member_id = $('#member_id').val();
                var jenis_psikotes_id = $('#jenis_psikotes_id').val();

                // Kirimkan data melalui AJAX menggunakan metode POST
                $.ajax({
                    url: '{{ route("jadwal.pilih-jadwal") }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}', // Untuk melindungi dari CSRF
                        'tanggal': tanggal,
                        'kebutuhan': kebutuhan,
                        'member_id': member_id,
                        'jenis_psikotes_id': jenis_psikotes_id,
                        'aksi': 'psikotes',
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

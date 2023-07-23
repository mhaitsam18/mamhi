@extends('layouts.member-main')
@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="page-content">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-3">
            <div>
                <h2 class="mb-3 mb-md-0" style="font-style: italic">psikotes Saya</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Psikotes Praktik</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton7"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                    <a class="dropdown-item d-flex align-items-center addButton" href="#" data-bs-toggle="modal" data-bs-target="#addModal"><i data-feather="plus" class="icon-sm me-2"></i> <span class="">Tambah</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a class="btn btn-sm btn-warning mb-3 me-1" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Tes sekarang</a>
                                <div class="row">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="card card-body">
                                            <div class="mb-3">
                                                <select name="jenis_psikotes_id" id="jenis_psikotes_id" cols="30" rows="5" class="form-select">
                                                    <option value="" selected disabled>Pilih jenis Psikotes</option>
                                                    @foreach ($jenis_psikotess as $jenis_psikotes)
                                                        <option value="{{ $jenis_psikotes->id }}" @selected($jenis_psikotes->id == old('jenis_psikotes_id'))>{{ $jenis_psikotes->jenis_psikotes }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <textarea name="kebutuhan" id="kebutuhan" cols="30" rows="5" class="form-control" placeholder="Tulis kebutuhan Anda"></textarea>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" min="<?= date('Y-m-d') ?>" name="tanggal" id="tanggal" placeholder="Pilih Tanggal" aria-label="Pilih Tanggal" aria-describedby="button-cek-jadwal">
                                                <button class="btn btn-outline-secondary" type="button" id="button-cek-jadwal" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Cek Jadwal</button>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                        <div class="card card-body">
                                            <h3>Pilih Jadwal Tersedia</h3>
                                            <div id="pilih-jadwal"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="dataTableExample">
                                <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">Nomor Peserta</th>
                                        <th class="pt-0">Member</th>
                                        <th class="pt-0">Psikolog</th>
                                        <th class="pt-0">Kebutuhan</th>
                                        <th class="pt-0">Jenis Psikotes</th>
                                        <th class="pt-0">Tanggal Booking</th>
                                        <th class="pt-0">Tanggal Tes</th>
                                        <th class="pt-0">Jadwal</th>
                                        <th class="pt-0">Status</th>
                                        <th class="pt-0">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($psikotess as $psikotes)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $psikotes->nomor_peserta ?? '-' }}</td>
                                            <td>{{ $psikotes->member->user->name }}</td>
                                            <td>{{ $psikotes->psikolog->user->name }}</td>
                                            <td>{{ $psikotes->kebutuhan }}</td>
                                            <td>{{ $psikotes->jenis_psikotes->jenis_psikotes }}</td>
                                            <td>{{  Carbon::parse($psikotes->booked_at)->isoFormat('LLL')  }}</td>
                                            <td>{{ Carbon::parse($psikotes->tanggal_psikotes)->isoFormat('LL') }}</td>
                                            <td>{{ substr($psikotes->jadwal->jam_mulai, 0, 5).' - '.substr($psikotes->jadwal->jam_selesai, 0, 5) }}</td>
                                            <td>{{ $psikotes->status }}</td>
                                            <td>
                                            <td>
                                                <a href="/member/psikotes/tagihan/{{ $psikotes->id }}" class="badge bg-warning">Lihat Tagihan</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
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
                var jenis_psikotes_id = $('#jenis_psikotes_id').val();

                // Kirimkan data melalui AJAX menggunakan metode POST
                $.ajax({
                    url: '{{ route("member.jadwal.pilih-jadwal") }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}', // Untuk melindungi dari CSRF
                        'tanggal': tanggal,
                        'kebutuhan': kebutuhan,
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

@extends('layouts.admin-main')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">{{ $title }}</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            {{-- <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary"><i
                        data-feather="calendar" class=" text-primary"></i></span>
                <input type="text" class="form-control border-primary bg-transparent">
            </div>
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Download Report
            </button> --}}
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Jumlah Konsultasi Minggu ini</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $konsultasi_minggu_ini->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Jumlah Peserta Psikotes Minggu ini</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $psikotes_minggu_ini->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive p-3">
                                    <h4>Data Booking Konsultasi Belum dikonfirmasi</h4>
                                    <table class="table table-hover mb-0" id="dataTableExample">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal Booking</th>
                                                <th>Tanggal Konsultasi</th>
                                                <th>Jadwal</th>
                                                <th>Nama Peserta</th>
                                                <th>Keluhan</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($booking_konsultasi as $item)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ Carbon::parse($item->booked_at)->isoFormat('LLL')  }}</td>
                                                    <td>{{ Carbon::parse($item->tanggal_konsultasi)->isoFormat('LL') }}</td>
                                                    <td>{{ substr($item->jadwal->jam_mulai, 0, 5).' - '.substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                                                    <td>{{ $item->member->user->name }}</td>
                                                    <td>{{ $item->keluhan }}</td>
                                                    <td>
                                                        @if ($item->pembayaran->bukti ?? null)
                                                            <a href="{{ asset('storage/' . $item->pembayaran->bukti) }}" class="image-popup">
                                                                <img src="{{ asset('storage/' . $item->pembayaran->bukti) }}" alt="" class="" data-mfp-src="{{ asset('storage/' . $item->pembayaran->bukti) }}" style="border-radius: 0;"> Lihat Bukti
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <form action="/admin/konsultasi/status/{{ $item->id }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="status" value="booking diterima">
                                                                <button type="submit" class="badge bg-success d-inline mx-1 border-0">Terima</button>
                                                            </form>
                                                            <form action="/admin/konsultasi/status/{{ $item->id }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="status" value="batal">
                                                                <button type="button" class="badge bg-danger d-inline mx-1 border-0"  data-bs-toggle="modal" data-bs-target="#tolakKonsultasi{{ $item->id }}Modal">Tolak</button>
                                                            </form>
                                                            <!-- Button trigger modal -->
                                                            {{-- <button type="button" class="badge bg-info d-inline mx-1 border-0" data-bs-toggle="modal" data-bs-target="#pembayaranKonsultasi{{ $item->id }}Modal">
                                                                Lihat Bukti Pembayaran
                                                            </button> --}}


                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="col-md-12 table-responsive p-3">
                                    <h4>Data Booking psikotes Belum dikonfirmasi</h4>
                                    <table class="table table-hover mb-0" id="dataTableExample2">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal Booking</th>
                                                <th>Tanggal Psikotes</th>
                                                <th>Jadwal</th>
                                                <th>Nama Peserta</th>
                                                <th>Kebutuhan</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($booking_psikotes as $item)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ Carbon::parse($item->booked_at)->isoFormat('LLL')  }}</td>
                                                    <td>{{ Carbon::parse($item->tanggal_psikotes)->isoFormat('LL') }}</td>
                                                    <td>{{ substr($item->jadwal->jam_mulai, 0, 5).' - '.substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                                                    <td>{{ $item->member->user->name }}</td>
                                                    <td>{{ $item->kebutuhan }}</td>
                                                    <td>
                                                        @if ($item->pembayaran->bukti ?? null)
                                                            <a href="{{ asset('storage/' . $item->pembayaran->bukti) }}" class="image-popup">
                                                                <img src="{{ asset('storage/' . $item->pembayaran->bukti) }}" alt="" class="" data-mfp-src="{{ asset('storage/' . $item->pembayaran->bukti) }}" style="border-radius: 0;"> Lihat Bukti
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <form action="/admin/psikotes/status/{{ $item->id }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="status" value="booking diterima">
                                                                <button type="submit" class="badge bg-success d-inline mx-1 border-0">Terima</button>
                                                            </form>
                                                            <form action="/admin/psikotes/status/{{ $item->id }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="status" value="batal">
                                                                <button type="button" class="badge bg-danger d-inline mx-1 border-0" data-bs-toggle="modal" data-bs-target="#tolakPsikotes{{ $item->id }}Modal">Tolak</button>
                                                            </form>
                                                            <!-- Button trigger modal -->
                                                            {{-- <button type="button" class="badge bg-info d-inline mx-1 border-0" data-bs-toggle="modal" data-bs-target="#pembayaranPsikotes{{ $item->id }}Modal">
                                                                Lihat Bukti Pembayaran
                                                            </button> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                                <h6 class="card-title mb-0">{{ $week }}</h6>
                            </div>
                            <div class="row align-items-start">
                            </div>
                            <div class="row">
                                <div class="col-md-6 table-responsive p-3">
                                    <h4>Konsultasi Minggu Ini</h4>
                                    <table class="table table-hover mb-0" id="dataTableExample3">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal Booking</th>
                                                <th>Tanggal Konsultasi</th>
                                                <th>Jadwal</th>
                                                <th>Nama Peserta</th>
                                                <th>Keluhan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($konsultasi_minggu_ini as $item)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ Carbon::parse($item->booked_at)->isoFormat('LLL')  }}</td>
                                                    <td>{{ Carbon::parse($item->tanggal_konsultasi)->isoFormat('LL') }}</td>
                                                    <td>{{ substr($item->jadwal->jam_mulai, 0, 5).' - '.substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                                                    <td>{{ $item->member->user->name }}</td>
                                                    <td>{{ $item->keluhan }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 table-responsive p-3">
                                    <h4>Psikotes Minggu Ini</h4>
                                    <table class="table table-hover mb-0" id="dataTableExample4">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal Booking</th>
                                                <th>Tanggal Psikotes</th>
                                                <th>Jadwal</th>
                                                <th>Nama Peserta</th>
                                                <th>Kebutuhan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($psikotes_minggu_ini as $item)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ Carbon::parse($item->booked_at)->isoFormat('LLL')  }}</td>
                                                    <td>{{ Carbon::parse($item->tanggal_psikotes)->isoFormat('LL') }}</td>
                                                    <td>{{ substr($item->jadwal->jam_mulai, 0, 5).' - '.substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                                                    <td>{{ $item->member->user->name }}</td>
                                                    <td>{{ $item->kebutuhan }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="col-md-6 table-responsive p-3">
                                    <h4>Konsultasi Selesai Minggu Ini</h4>
                                    <table class="table table-hover mb-0" id="dataTableExample5">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal Booking</th>
                                                <th>Tanggal Konsultasi</th>
                                                <th>Jadwal</th>
                                                <th>Nama Peserta</th>
                                                <th>Keluhan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($konsultasi_selesai_minggu_ini as $item)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ Carbon::parse($item->booked_at)->isoFormat('LLL')  }}</td>
                                                    <td>{{ Carbon::parse($item->tanggal_konsultasi)->isoFormat('LL') }}</td>
                                                    <td>{{ substr($item->jadwal->jam_mulai, 0, 5).' - '.substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                                                    <td>{{ $item->member->user->name }}</td>
                                                    <td>{{ $item->keluhan }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 table-responsive p-3">
                                    <h4>Peserta Psikotes Selesai Minggu Ini</h4>
                                    <table class="table table-hover mb-0" id="dataTableExample6">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal Booking</th>
                                                <th>Tanggal Psikotes</th>
                                                <th>Jadwal</th>
                                                <th>Nama Peserta</th>
                                                <th>Kebutuhan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($psikotes_selesai_minggu_ini as $item)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ Carbon::parse($item->booked_at)->isoFormat('LLL')  }}</td>
                                                    <td>{{ Carbon::parse($item->tanggal_psikotes)->isoFormat('LL') }}</td>
                                                    <td>{{ substr($item->jadwal->jam_mulai, 0, 5).' - '.substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                                                    <td>{{ $item->member->user->name }}</td>
                                                    <td>{{ $item->kebutuhan }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
@endsection
@section('modal')
    @foreach ($booking_konsultasi as $item)
        <div class="modal fade" id="tolakKonsultasi{{ $item->id }}Modal" tabindex="-1" aria-labelledby="tolakKonsultasi{{ $item->id }}ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tolakKonsultasi{{ $item->id }}ModalLabel">Alasan Menolak</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/konsultasi/status/{{ $item->id }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="status" value="batal">
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Alasan menolak</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tolak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="pembayaranKonsultasi{{ $item->id }}Modal" tabindex="-1" aria-labelledby="pembayaranKonsultasi{{ $item->id }}ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="pembayaranKonsultasi{{ $item->id }}ModalLabel">Bukti Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($item->pembayaran->bukti ?? null)
                            <img id="buktiPembayaranKonsultasi{{ $item->id }}" src="{{ asset('storage/' . $item->pembayaran->bukti) }}" alt="" class="img-fluid">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary zoom-in">Zoom In</button>
                        <button type="button" class="btn btn-primary zoom-out">Zoom Out</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($booking_psikotes as $item)
        <div class="modal fade" id="tolakPsikotes{{ $item->id }}Modal" tabindex="-1" aria-labelledby="tolakPsikotes{{ $item->id }}ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tolakPsikotes{{ $item->id }}ModalLabel">Alasan menolak</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/psikotes/status/{{ $item->id }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="status" value="batal">
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Alasan menolak</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tolak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="pembayaranPsikotes{{ $item->id }}Modal" tabindex="-1" aria-labelledby="pembayaranPsikotes{{ $item->id }}ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="pembayaranPsikotes{{ $item->id }}ModalLabel">Bukti Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($item->pembayaran->bukti ?? null)
                            <img id="buktiPembayaranPsikotes{{ $item->id }}" src="{{ asset('storage/' . $item->pembayaran->bukti) }}" alt="" class="img-fluid">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary zoom-in">Zoom In</button>
                        <button type="button" class="btn btn-primary zoom-out">Zoom Out</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Magnific Popup CSS dan JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function () {
        $('.zoom-in').on('click', function () {
            var modalId = $(this).closest('.modal').attr('id');
            var img = $('#' + modalId + ' .modal-body img');

            // Perbesar gambar
            var newWidth = img.width() * 1.2; // Anda dapat menyesuaikan faktor perbesaran
            img.width(newWidth);
        });

        $('.zoom-out').on('click', function () {
            var modalId = $(this).closest('.modal').attr('id');
            var img = $('#' + modalId + ' .modal-body img');

            // Kecilkan gambar
            var newWidth = img.width() / 1.2; // Anda dapat menyesuaikan faktor perkecilan
            img.width(newWidth);
        });

        // Event saat modal ditutup
        $('.modal').on('hidden.bs.modal', function () {
            var img = $(this).find('.modal-body img');

            // Kembalikan ukuran gambar ke semula saat modal ditutup
            img.width('auto');
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.image-popup').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            image: {
                verticalFit: false
            },
            zoom: {
                enabled: true,
                duration: 300 // Animasi zoom in dan zoom out
            }
        });
    });
</script>

@endsection

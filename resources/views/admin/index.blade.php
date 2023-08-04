
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
                            <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                                <h6 class="card-title mb-0">{{ $week }}</h6>
                            </div>
                            <div class="row align-items-start">
                            </div>
                            <div class="row">
                                <div class="col-md-6 table-responsive p-3">
                                    <h4>Konsultasi Minggu Ini</h4>
                                    <table class="table table-hover mb-0" id="dataTableExample">
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
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ Carbon::parse($item->booked_at)->isoFormat('LLL')  }}</td>
                                                <td>{{ Carbon::parse($item->tanggal_konsultasi)->isoFormat('LL') }}</td>
                                                <td>{{ substr($item->jadwal->jam_mulai, 0, 5).' - '.substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                                                <td>{{ $item->member->user->name }}</td>
                                                <td>{{ $item->keluhan }}</td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 table-responsive p-3">
                                    <h4>Psikotes Minggu Ini</h4>
                                    <table class="table table-hover mb-0" id="dataTableExample2">
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
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ Carbon::parse($item->booked_at)->isoFormat('LLL')  }}</td>
                                                <td>{{ Carbon::parse($item->tanggal_psikotes)->isoFormat('LL') }}</td>
                                                <td>{{ substr($item->jadwal->jam_mulai, 0, 5).' - '.substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                                                <td>{{ $item->member->user->name }}</td>
                                                <td>{{ $item->kebutuhan }}</td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 table-responsive p-3">
                                    <h4>Konsultasi Selesai Minggu Ini</h4>
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
                                            @foreach ($konsultasi_selesai_minggu_ini as $item)
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ Carbon::parse($item->booked_at)->isoFormat('LLL')  }}</td>
                                                <td>{{ Carbon::parse($item->tanggal_konsultasi)->isoFormat('LL') }}</td>
                                                <td>{{ substr($item->jadwal->jam_mulai, 0, 5).' - '.substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                                                <td>{{ $item->member->user->name }}</td>
                                                <td>{{ $item->keluhan }}</td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 table-responsive p-3">
                                    <h4>Peserta Psikotes Selesai Minggu Ini</h4>
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
                                            @foreach ($psikotes_selesai_minggu_ini as $item)
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ Carbon::parse($item->booked_at)->isoFormat('LLL')  }}</td>
                                                <td>{{ Carbon::parse($item->tanggal_psikotes)->isoFormat('LL') }}</td>
                                                <td>{{ substr($item->jadwal->jam_mulai, 0, 5).' - '.substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                                                <td>{{ $item->member->user->name }}</td>
                                                <td>{{ $item->kebutuhan }}</td>
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
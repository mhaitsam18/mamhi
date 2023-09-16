@extends('layouts.member-main')
@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first('bukti') }}
                            </div>
                        @endif
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 ps-0">
                                <a href="#" class="noble-ui-logo d-block mt-3"><img src="/assets/img/logos/logo-mamhi.png" class="d-block" style="height: 100px;"></a>
                                <p class="mt-1 mb-1"><b>MamHI Psikologi</b></p>
                                <p>Ruko R4 BCV II,<br> Jl. Pasir Impun, Karang Pamulang, Mandalajati<br>Kota Bandung, Jawa Barat 40195.</p>
                                <h5 class="mt-5 mb-2 text-muted">Tagihan untuk :</h5>
                                <p>{{ auth()->user()->name }},<br> {{ auth()->user()->alamat }}</p>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">Tagihan</h4>
                                <h6 class="text-end mb-5 pb-4"># INV-{{ str_pad($psikotes->id, 6, '01000', STR_PAD_LEFT) }}</h6>
                                <p class="text-end mb-1">Total Tagihan</p>
                                <h4 class="text-end fw-normal">Rp {{ number_format($psikotes->jenis_psikotes->harga+50000,2,',','.') }}</h4>
                                <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted">Waktu Tagihan :</span> {{ Carbon::parse($psikotes->booked_at)->isoFormat('LLL') }}</h6>
                                <h6 class="text-end fw-normal"><span class="text-muted">Tenggat Waktu :</span> {{ Carbon::parse($psikotes->tanggal_psikotes)->isoFormat('LL') }}</h6>

                            </div>
                        </div>
                        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kebutuhan</th>
                                            <th class="text-end">Tanggal Praktik</th>
                                            <th class="text-end">Psikolog</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-end">
                                            <td class="text-start">1</td>
                                            <td class="text-start">{{ $psikotes->jenis_psikotes->jenis_psikotes }}</td>
                                            <td>{{ Carbon::parse($psikotes->tanggal_psikotes)->isoFormat('LL') }}</td>
                                            <td>{{ $psikotes->psikolog->user->name }}</td>
                                            <td>Rp {{ number_format($psikotes->jenis_psikotes->harga,2,',','.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        Informasi Pembayaran :
                                        <ul>
                                            <li>BSI a/n CV MAMHI 8778888875</li>
                                            <li>BRI a/n CV MAMHI 345301053593537</li>
                                        </ul>
                                    </p>
                                </div>
                                <div class="col-md-6 ms-auto">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td class="text-end">Rp {{ number_format($psikotes->jenis_psikotes->harga,2,',','.') }}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td>TAX (12%)</td>
                                                    <td class="text-end">Rp {{ number_format(($psikotes->jenis_psikotes->harga*12/100),2,',','.') }}</td>
                                                </tr> --}}
                                                <tr>
                                                    <td>Admin</td>
                                                    <td class="text-end">Rp {{ number_format(50000,2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-800">Total</td>
                                                    <td class="text-bold-800 text-end">Rp {{ number_format($psikotes->jenis_psikotes->harga+50000,2,',','.') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid w-100">
                            <a href="/member/psikotes/psikotes-saya" class="btn btn-secondary float-end mt-4 ms-2">Tutup</a>
                            @if (!$pembayaran)
                                <a href="#" class="btn btn-primary float-end mt-4 ms-2" data-bs-toggle="modal" data-bs-target="#uploadBuktiModal"><i data-feather="send" class="me-3 icon-md"></i>Bayar sekarang</a>
                            @elseif ($psikotes->status == 'booking')
                                <span class="btn btn-info float-end mt-4 ms-2">Pembayaran sedang diproses</span>
                            @elseif ($psikotes->status == 'booking diterima' || $psikotes->status == 'selesai')
                                <span class="btn btn-success float-end mt-4 ms-2">Lunas</span>
                            @else
                                <span class="btn btn-danger float-end mt-4 ms-2" data-bs-toggle="modal" data-bs-target="#keteranganModal">Batal / Pembayaran ditolak</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="uploadBuktiModal" tabindex="-1" aria-labelledby="uploadBuktiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="uploadBuktiModalLabel">Upload Bukti Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/member/pembayaran" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="nominal" value="{{ $psikotes->jenis_psikotes->harga+($psikotes->jenis_psikotes->harga*12/100) }}"> --}}
                <input type="hidden" name="nominal" value="{{ $psikotes->jenis_psikotes->harga+50000 }}">
                <input type="hidden" name="psikotes_id" value="{{ $psikotes->id }}">
                <div class="modal-body">
                    <p>
                        Informasi Pembayaran :
                        <ul>
                            <li>BSI a/n CV MAMHI 8778888875</li>
                            <li>BRI a/n CV MAMHI 345301053593537</li>
                        </ul>
                    </p>
                    <div class="mb-3">
                        <label for="bukti" class="form-label">Upload Bukti</label>
                        <input type="file" class="form-control @error('bukti') is-invalid @enderror" name="bukti" id="bukti">
                        @error('bukti')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <small>Tipe File yang direkomendasi: jpeg,png,jpg,gif. maks: 2 MB</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="keteranganModal" tabindex="-1" aria-labelledby="keteranganModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="keteranganModalLabel">Keterangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Alasan ditolak: {{ $psikotes->pembayaran->keterangan ?? 'Tanpa Keterangan' }}</p>
                <p>
                    Jika ini adalah sebuah kesalahan, silahkan untuk menghubungi admin
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

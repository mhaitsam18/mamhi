@extends('layouts.member-main')
@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="page-content">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-3">
            <div>
                <h2 class="mb-3 mb-md-0" style="font-style: italic">{{ $title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Diagnosis Saya</h6>
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary float-end" onclick="window.history.back();">Kembali</a>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Nomor Rekam Medis</td>
                                        <td>{{ $diagnosis->nomor_rekam_psikolog }}</td>
                                    </tr>
                                    <tr>
                                        <td>Hasil Diagnosis</td>
                                        <td>{{ $diagnosis->hasil_diagnosis }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dokumen</td>
                                        <td><a href="{{ asset('storage/' . $diagnosis->dokumen) }}" class="btn btn-sm btn-link"><i class="link-icon" data-feather="download"></i> Download</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div>
</div>
@endsection

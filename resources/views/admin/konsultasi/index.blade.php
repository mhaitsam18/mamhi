
@extends('layouts.admin-main')

@section('content')
@php
    use Carbon\Carbon;
@endphp
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">{{ $title }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">konsultasi Praktik</h6>
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
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="dataTableExample">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Member</th>
                                    <th class="pt-0">Psikolog</th>
                                    <th class="pt-0">Keluhan</th>
                                    <th class="pt-0">Tanggal Booking</th>
                                    <th class="pt-0">Tanggal Konsul</th>
                                    <th class="pt-0">Jadwal</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konsultasis as $konsultasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $konsultasi->member->user->name }}</td>
                                        <td>{{ $konsultasi->psikolog->user->name }}</td>
                                        <td>{{ $konsultasi->keluhan }}</td>
                                        <td>{{ Carbon::parse($konsultasi->booked_at)->isoFormat('LLL')  }}</td>
                                        <td>{{ Carbon::parse($konsultasi->tanggal_konsultasi)->isoFormat('LL') }}</td>
                                        <td>{{ substr($konsultasi->jadwal->jam_mulai, 0, 5).' - '.substr($konsultasi->jadwal->jam_selesai, 0, 5) }}</td>
                                        <td>{{ $konsultasi->status }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="/admin/konsultasi/diagnosis/{{ $konsultasi->id }}" class="badge bg-info me-2 d-inline-block @cannot('psikolog') access-denied @endcannot ">Diagnosis</a>
                                                <a href="#" class="badge bg-success d-inline-block editButton"  data-bs-toggle="modal" data-bs-target="#editModal"
                                                data-id="{{ $konsultasi->id }}"
                                                data-psikolog_id="{{ $konsultasi->psikolog_id }}"
                                                data-member_id="{{ $konsultasi->member_id }}"
                                                data-keluhan="{{ $konsultasi->keluhan }}"
                                                data-booked_at="{{ $konsultasi->booked_at }}"
                                                data-tanggal_konsultasi="{{ $konsultasi->tanggal_konsultasi }}"
                                                data-jadwal_id="{{ $konsultasi->jadwal_id }}"
                                                data-status="{{ $konsultasi->status }}"
                                                >Edit</a>
                                                {{-- <form action="/admin/konsultasi/{{ $konsultasi->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="badge bg-danger d-inline-block ms-2 mb-1 badge-a tombol-hapus">Hapus</button>
                                                </form> --}}
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
    </div> <!-- row -->
@endsection

@section('modal')

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Tambah konsultasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/konsultasi" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select name="member_id" class="form-select @error('member_id') is-invalid @enderror" id="member_id">
                            <option value="" selected disabled>Pilih member</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}" @selected($member->id == old('member_id'))>{{ $member->user->name }}</option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="psikolog_id" class="form-label">Psikolog</label>
                        <select name="psikolog_id" class="form-select @error('psikolog_id') is-invalid @enderror" id="psikolog_id">
                            <option value="" selected disabled>Pilih psikolog</option>
                            @foreach ($psikologs as $psikolog)
                                <option value="{{ $psikolog->id }}" @selected($psikolog->id == old('psikolog_id'))>{{ $psikolog->user->name }}</option>
                            @endforeach
                        </select>
                        @error('psikolog_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jadwal_id" class="form-label">jadwal</label>
                        <select name="jadwal_id" class="form-select @error('jadwal_id') is-invalid @enderror" id="jadwal_id">
                            <option value="" selected disabled>Pilih jadwal</option>
                            @foreach ($jadwals as $jadwal)
                                <option value="{{ $jadwal->id }}" @selected($jadwal->id == old('jadwal_id'))>{{ $jadwal->hari.', '.$jadwal->jam_mulai.' - '.$jadwal->jam_selesai }}</option>
                            @endforeach
                        </select>
                        @error('jadwal_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                            <option value="" selected disabled>Pilih status</option>
                            <option value="booking" @selected(old('status') == 'booking')>Booking</option>
                            <option value="booking diterima" @selected(old('status') == 'booking diterima')>Booking diterima</option>
                            <option value="batal" @selected(old('status') == 'batal')>Batal</option>
                            <option value="selesai" @selected(old('status') == 'selesai')>Selesai</option>
                        </select>
                        @error('status')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keluhan" class="form-label">Keluhan</label>
                            <input type="text" name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" value="{{ old('keluhan') }}">
                            @error('keluhan')
                                <div class="text-danger fs-6">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_konsultasi" class="form-label">Tanggal Konsultasi</label>
                            <input type="date" name="tanggal_konsultasi" class="form-control @error('tanggal_konsultasi') is-invalid @enderror" id="tanggal_konsultasi" value="{{ old('tanggal_konsultasi') }}">
                            @error('tanggal_konsultasi')
                                <div class="text-danger fs-6">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Ubah konsultasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/konsultasi/" method="post" enctype="multipart/form-data" id="formEdit">
                @csrf
                @method('put')
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select name="member_id" class="form-select @error('member_id') is-invalid @enderror" id="member_id">
                            <option value="" selected disabled>Pilih member</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}" @selected($member->id == old('member_id'))>{{ $member->user->name }}</option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="psikolog_id" class="form-label">Psikolog</label>
                        <select name="psikolog_id" class="form-select @error('psikolog_id') is-invalid @enderror" id="psikolog_id">
                            <option value="" selected disabled>Pilih psikolog</option>
                            @foreach ($psikologs as $psikolog)
                                <option value="{{ $psikolog->id }}" @selected($psikolog->id == old('psikolog_id'))>{{ $psikolog->user->name }}</option>
                            @endforeach
                        </select>
                        @error('psikolog_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jadwal_id" class="form-label">jadwal</label>
                        <select name="jadwal_id" class="form-select @error('jadwal_id') is-invalid @enderror" id="jadwal_id">
                            <option value="" selected disabled>Pilih jadwal</option>
                            @foreach ($jadwals as $jadwal)
                                <option value="{{ $jadwal->id }}" @selected($jadwal->id == old('jadwal_id'))>{{ $jadwal->hari.', '.$jadwal->jam_mulai.' - '.$jadwal->jam_selesai }}</option>
                            @endforeach
                        </select>
                        @error('jadwal_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                            <option value="" selected disabled>Pilih status</option>
                            <option value="booking" @selected(old('status') == 'booking')>Booking</option>
                            <option value="booking diterima" @selected(old('status') == 'booking diterima')>Booking diterima</option>
                            <option value="batal" @selected(old('status') == 'batal')>Batal</option>
                            <option value="selesai" @selected(old('status') == 'selesai')>Selesai</option>
                        </select>
                        @error('status')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keluhan" class="form-label">Keluhan</label>
                        <input type="text" name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" value="{{ old('keluhan') }}">
                        @error('keluhan')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_konsultasi" class="form-label">Tanggal Konsultasi</label>
                        <input type="date" name="tanggal_konsultasi" class="form-control @error('tanggal_konsultasi') is-invalid @enderror" id="tanggal_konsultasi" value="{{ old('tanggal_konsultasi') }}">
                        @error('tanggal_konsultasi')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> --}}
<script>
    $(document).on("click", ".editButton", function() {
        var id = $(this).data('id');
        $(".modal-body  #id").val(id);
        $("#formEdit").attr("action", "/admin/konsultasi/" + id);

        var psikolog_id = $(this).data('psikolog_id');
        $(".modal-body  #psikolog_id").val(psikolog_id);
        var member_id = $(this).data('member_id');
        $(".modal-body  #member_id").val(member_id);
        var keluhan = $(this).data('keluhan');
        $(".modal-body  #keluhan").val(keluhan);
        var booked_at = $(this).data('booked_at');
        $(".modal-body  #booked_at").val(booked_at);
        var tanggal_konsultasi = $(this).data('tanggal_konsultasi');
        $(".modal-body  #tanggal_konsultasi").val(tanggal_konsultasi);
        var jadwal_id = $(this).data('jadwal_id');
        $(".modal-body  #jadwal_id").val(jadwal_id);
        var status = $(this).data('status');
        $(".modal-body  #status").val(status);
    });
    $(document).on("click", "#addButton", function() {
        $(".modal-body input").val(''); // Mengosongkan nilai pada elemen input
        $(".modal-body select").val(''); // Mengosongkan nilai pada elemen select option
    });
</script>
@endsection

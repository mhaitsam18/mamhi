
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
                                    <th class="pt-0">Tanggal Konsul</th>
                                    <th class="pt-0">Jadwal</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($psikotess as $psikotes)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $psikotes->nomor_peserta }}</td>
                                        <td>{{ $psikotes->member->user->name }}</td>
                                        <td>{{ $psikotes->psikolog->user->name }}</td>
                                        <td>{{ $psikotes->kebutuhan }}</td>
                                        <td>{{ $psikotes->jenis_psikotes->jenis_psikotes }}</td>
                                            <td>{{  Carbon::parse($psikotes->booked_at)->isoFormat('LLL')  }}</td>
                                            <td>{{ Carbon::parse($psikotes->tanggal_psikotes)->isoFormat('LL') }}</td>
                                        <td>{{ substr($psikotes->jadwal->jam_mulai, 0, 5).' - '.substr($psikotes->jadwal->jam_selesai, 0, 5) }}</td>
                                        <td>{{ $psikotes->status }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="badge bg-success d-inline-block editButton"  data-bs-toggle="modal" data-bs-target="#editModal" 
                                                data-id="{{ $psikotes->id }}" 
                                                data-nomor_peserta="{{ $psikotes->nomor_peserta }}" 
                                                data-psikolog_id="{{ $psikotes->psikolog_id }}" 
                                                data-member_id="{{ $psikotes->member_id }}" 
                                                data-kebutuhan="{{ $psikotes->kebutuhan }}" 
                                                data-booked_at="{{ $psikotes->booked_at }}" 
                                                data-tanggal_psikotes="{{ $psikotes->tanggal_psikotes }}" 
                                                data-jenis_psikotes_id="{{ $psikotes->jenis_psikotes_id }}" 
                                                data-jadwal_id="{{ $psikotes->jadwal_id }}" 
                                                data-status="{{ $psikotes->status }}" 
                                                >Edit</a>
                                                <form action="/admin/psikotes/{{ $psikotes->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="badge bg-danger d-inline-block ms-2 mb-1 badge-a tombol-hapus">Hapus</button>
                                                </form>
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
                <h1 class="modal-title fs-5" id="addModalLabel">Tambah psikotes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/psikotes" method="post" enctype="multipart/form-data">
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
                        <label for="nomor_peserta" class="form-label">Nomor Peserta</label>
                        <input type="text" name="nomor_peserta" class="form-control @error('nomor_peserta') is-invalid @enderror" id="nomor_peserta" value="{{ old('nomor_peserta') }}">
                        @error('nomor_peserta')
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
                        <label for="kebutuhan" class="form-label">kebutuhan</label>
                        <input type="text" name="kebutuhan" class="form-control @error('kebutuhan') is-invalid @enderror" id="kebutuhan" value="{{ old('kebutuhan') }}">
                        @error('kebutuhan')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_psikotes_id" class="form-label">Jenis psikotes</label>
                        <select name="jenis_psikotes_id" class="form-select @error('jenis_psikotes_id') is-invalid @enderror" id="jenis_psikotes_id" value="">
                            <option value="" selected disabled>Pilih Jenis Psikotes</option>
                            @foreach ($jenis_psikotess as $jenis_psikotes)
                                <option value="{{ $jenis_psikotes->id }}" @selected({{ old('jenis_psikotes_id') == $jenis_psikotes->id }})>{{ $jenis_psikotes->jenis_psikotes }}</option>
                            @endforeach
                        </select>
                        @error('jenis_psikotes_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_psikotes" class="form-label">Tanggal psikotes</label>
                        <input type="date" name="tanggal_psikotes" class="form-control @error('tanggal_psikotes') is-invalid @enderror" id="tanggal_psikotes" value="{{ old('tanggal_psikotes') }}">
                        @error('tanggal_psikotes')
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
                <h1 class="modal-title fs-5" id="editModalLabel">Ubah psikotes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/psikotes/" method="post" enctype="multipart/form-data" id="formEdit">
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
                        <label for="nomor_peserta" class="form-label">Nomor Peserta</label>
                        <input type="text" name="nomor_peserta" class="form-control @error('nomor_peserta') is-invalid @enderror" id="nomor_peserta" value="{{ old('nomor_peserta') }}">
                        @error('nomor_peserta')
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
                        <label for="kebutuhan" class="form-label">kebutuhan</label>
                        <input type="text" name="kebutuhan" class="form-control @error('kebutuhan') is-invalid @enderror" id="kebutuhan" value="{{ old('kebutuhan') }}">
                        @error('kebutuhan')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_psikotes_id" class="form-label">Jenis psikotes</label>
                        <select name="jenis_psikotes_id" class="form-select @error('jenis_psikotes_id') is-invalid @enderror" id="jenis_psikotes_id" value="">
                            <option value="" selected disabled>Pilih Jenis Psikotes</option>
                            @foreach ($jenis_psikotess as $jenis_psikotes)
                                <option value="{{ $jenis_psikotes->id }}" @selected({{ old('jenis_psikotes_id') == $jenis_psikotes->id }})>{{ $jenis_psikotes->jenis_psikotes }}</option>
                            @endforeach
                        </select>
                        @error('jenis_psikotes_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_psikotes" class="form-label">Tanggal psikotes</label>
                        <input type="date" name="tanggal_psikotes" class="form-control @error('tanggal_psikotes') is-invalid @enderror" id="tanggal_psikotes" value="{{ old('tanggal_psikotes') }}">
                        @error('tanggal_psikotes')
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
        $("#formEdit").attr("action", "/admin/psikotes/" + id);

        var nomor_peserta = $(this).data('nomor_peserta');
        $(".modal-body  #nomor_peserta").val(nomor_peserta);
        var psikolog_id = $(this).data('psikolog_id');
        $(".modal-body  #psikolog_id").val(psikolog_id);
        var member_id = $(this).data('member_id');
        $(".modal-body  #member_id").val(member_id);
        var kebutuhan = $(this).data('kebutuhan');
        $(".modal-body  #kebutuhan").val(kebutuhan);
        var booked_at = $(this).data('booked_at');
        $(".modal-body  #booked_at").val(booked_at);
        var tanggal_psikotes = $(this).data('tanggal_psikotes');
        $(".modal-body  #tanggal_psikotes").val(tanggal_psikotes);
        var jenis_psikotes_id = $(this).data('jenis_psikotes_id');
        $(".modal-body  #jenis_psikotes_id").val(jenis_psikotes_id);
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

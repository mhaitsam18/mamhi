
@extends('layouts.admin-main')

@section('content')
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
                        <h6 class="card-title mb-0">Jadwal Praktik</h6>
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
                                    <th class="pt-0">Hari</th>
                                    <th class="pt-0">Jam</th>
                                    <th class="pt-0">Psikolog</th>
                                    <th class="pt-0">Ruangan</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwals as $jadwal)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $jadwal->hari }}</td>
                                        <td>{{ substr($jadwal->jam_mulai, 0, 5).' - '.substr($jadwal->jam_selesai, 0, 5) }}</td>
                                        <td>{{ $jadwal->psikolog->kode_psikolog ?? '-' }}</td>
                                        <td>{{ $jadwal->ruangan->ruangan ?? '-' }}</td>
                                        <td>{{ $jadwal->status }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="badge bg-success d-inline-block editButton"  data-bs-toggle="modal" data-bs-target="#editModal" 
                                                data-id="{{ $jadwal->id }}" 
                                                data-psikolog_id="{{ $jadwal->psikolog_id }}" 
                                                data-ruangan_id="{{ $jadwal->ruangan_id }}" 
                                                data-hari="{{ $jadwal->hari }}" 
                                                data-jam_mulai="{{ $jadwal->jam_mulai }}" 
                                                data-jam_selesai="{{ $jadwal->jam_selesai }}" 
                                                data-status="{{ $jadwal->status }}" 
                                                >Edit</a>
                                                <form action="/admin/jadwal/{{ $jadwal->id }}" method="post">
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
                <h1 class="modal-title fs-5" id="addModalLabel">Tambah Jadwal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/jadwal" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="psikolog_id" class="form-label">Psikolog</label>
                        <select name="psikolog_id" class="form-select @error('psikolog_id') is-invalid @enderror" id="psikolog_id">
                            <option value="" selected disabled>Pilih Psikolog</option>
                            @foreach ($psikologs as $psikolog)
                                <option value="{{ $psikolog->id }}" @selected($psikolog->id == old('psikolog_id'))>{{ $psikolog->kode_psikolog.' | '.$psikolog->user->name }}</option>
                            @endforeach
                        </select>
                        @error('psikolog_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ruangan_id" class="form-label">Ruangan</label>
                        <select name="ruangan_id" class="form-select @error('ruangan_id') is-invalid @enderror" id="ruangan_id">
                            <option value="" selected disabled>Pilih Ruangan</option>
                            @foreach ($ruangans as $ruangan)
                                <option value="{{ $ruangan->id }}" @selected($ruangan->id == old('ruangan_id'))>{{ $ruangan->ruangan }}</option>
                            @endforeach
                        </select>
                        @error('ruangan_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select name="hari" class="form-select @error('hari') is-invalid @enderror" id="hari">
                            <option value="" selected disabled>Pilih Hari</option>
                            <option value="Senin" @selected(old('hari') == 'Senin')>Senin</option>
                            <option value="Selasa" @selected(old('hari') == 'Selasa')>Selasa</option>
                            <option value="Rabu" @selected(old('hari') == 'Rabu')>Rabu</option>
                            <option value="Kamis" @selected(old('hari') == 'Kamis')>Kamis</option>
                            <option value="Jumat" @selected(old('hari') == 'Jumat')>Jumat</option>
                            <option value="Sabtu" @selected(old('hari') == 'Sabtu')>Sabtu</option>
                            <option value="Minggu" @selected(old('hari') == 'Minggu')>Minggu</option>
                        </select>
                        @error('hari')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="jam_mulai" class="form-label">Jam Mulai</label>
                            <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai" value="{{ old('jam_mulai') }}">
                            @error('jam_mulai')
                                <div class="text-danger fs-6">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                            <input type="time" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" id="jam_selesai" value="{{ old('jam_selesai') }}">
                            @error('jam_selesai')
                                <div class="text-danger fs-6">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" id="status" value="{{ old('status') }}">
                            @error('status')
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
                <h1 class="modal-title fs-5" id="editModalLabel">Ubah Jadwal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/jadwal/" method="post" enctype="multipart/form-data" id="formEdit">
                @csrf
                @method('put')
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label for="psikolog_id" class="form-label">Psikolog</label>
                        <select name="psikolog_id" class="form-select @error('psikolog_id') is-invalid @enderror" id="psikolog_id">
                            <option value="" selected disabled>Pilih Psikolog</option>
                            @foreach ($psikologs as $psikolog)
                                <option value="{{ $psikolog->id }}" @selected($psikolog->id == old('psikolog_id'))>{{ $psikolog->kode_psikolog.' | '.$psikolog->user->name }}</option>
                            @endforeach
                        </select>
                        @error('psikolog_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ruangan_id" class="form-label">Ruangan</label>
                        <select name="ruangan_id" class="form-select @error('ruangan_id') is-invalid @enderror" id="ruangan_id">
                            <option value="" selected disabled>Pilih Ruangan</option>
                            @foreach ($ruangans as $ruangan)
                                <option value="{{ $ruangan->id }}" @selected($ruangan->id == old('ruangan_id'))>{{ $ruangan->ruangan }}</option>
                            @endforeach
                        </select>
                        @error('ruangan_id')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select name="hari" class="form-select @error('hari') is-invalid @enderror" id="hari">
                            <option value="" selected disabled>Pilih Hari</option>
                            <option value="Senin" @selected(old('hari') == 'Senin')>Senin</option>
                            <option value="Selasa" @selected(old('hari') == 'Selasa')>Selasa</option>
                            <option value="Rabu" @selected(old('hari') == 'Rabu')>Rabu</option>
                            <option value="Kamis" @selected(old('hari') == 'Kamis')>Kamis</option>
                            <option value="Jumat" @selected(old('hari') == 'Jumat')>Jumat</option>
                            <option value="Sabtu" @selected(old('hari') == 'Sabtu')>Sabtu</option>
                            <option value="Minggu" @selected(old('hari') == 'Minggu')>Minggu</option>
                        </select>
                        @error('hari')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="jam_mulai" class="form-label">Jam Mulai</label>
                            <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai" value="{{ old('jam_mulai') }}">
                            @error('jam_mulai')
                                <div class="text-danger fs-6">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                            <input type="time" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" id="jam_selesai" value="{{ old('jam_selesai') }}">
                            @error('jam_selesai')
                                <div class="text-danger fs-6">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" id="status" value="{{ old('status') }}">
                            @error('status')
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
        $("#formEdit").attr("action", "/admin/jadwal/" + id);

        var psikolog_id = $(this).data('psikolog_id');
        $(".modal-body  #psikolog_id").val(psikolog_id);
        var ruangan_id = $(this).data('ruangan_id');
        $(".modal-body  #ruangan_id").val(ruangan_id);
        var hari = $(this).data('hari');
        $(".modal-body  #hari").val(hari);
        var jam_mulai = $(this).data('jam_mulai');
        $(".modal-body  #jam_mulai").val(jam_mulai);
        var jam_selesai = $(this).data('jam_selesai');
        $(".modal-body  #jam_selesai").val(jam_selesai);
        var status = $(this).data('status');
        $(".modal-body  #status").val(status);
    });
    $(document).on("click", "#addButton", function() {
        $(".modal-body input").val(''); // Mengosongkan nilai pada elemen input
        $(".modal-body select").val(''); // Mengosongkan nilai pada elemen select option
    });
</script>
@endsection

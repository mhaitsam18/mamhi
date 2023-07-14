
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
                        <h6 class="card-title mb-0">Ruangan</h6>
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
                                    <th class="pt-0">Ruangan</th>
                                    <th class="pt-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ruangans as $ruangan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ruangan->ruangan- ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="badge bg-success d-inline-block editButton"  data-bs-toggle="modal" data-bs-target="#editModal" 
                                                data-id="{{ $ruangan->id }}" 
                                                data-ruangan="{{ $ruangan->ruangan }}" 
                                                >Edit</a>
                                                <form action="/admin/ruangan/{{ $ruangan->id }}" method="post">
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
                <h1 class="modal-title fs-5" id="addModalLabel">Tambah ruangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/ruangan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="ruangan" class="form-label">Ruangan</label>
                        <input type="text" name="ruangan" class="form-control @error('ruangan') is-invalid @enderror" id="ruangan" value="{{ old('ruangan') }}">
                        @error('ruangan')
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
                <h1 class="modal-title fs-5" id="editModalLabel">Ubah ruangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/ruangan/" method="post" enctype="multipart/form-data" id="formEdit">
                @csrf
                @method('put')
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label for="ruangan" class="form-label">Ruangan</label>
                        <input type="text" name="ruangan" class="form-control @error('ruangan') is-invalid @enderror" id="ruangan" value="{{ old('ruangan') }}">
                        @error('ruangan')
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
        $("#formEdit").attr("action", "/admin/ruangan/" + id);

        var ruangan = $(this).data('ruangan');
        $(".modal-body  #ruangan").val(ruangan);
    });
    $(document).on("click", "#addButton", function() {
        $(".modal-body input").val(''); // Mengosongkan nilai pada elemen input
        $(".modal-body select").val(''); // Mengosongkan nilai pada elemen select option
    });
</script>
@endsection

@extends('layouts.admin-main')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        {{-- <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div> --}}

    </div>

    <div class="row">
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">DATA PSIKOLOG</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="dropdownMenuButton7"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                    <a class="dropdown-item d-flex align-items-center" href="/admin/psikolog/create"><i data-feather="plus" class="icon-sm me-2"></i><span class="">Tambah</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="dataTableExample">
                                <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">Nama dan Gelar</th>
                                        <th class="pt-0">Kode</th>
                                        <th class="pt-0">Keahlian</th>
                                        <th class="pt-0">Email</th>
                                        <th class="pt-0">Username</th>
                                        <th class="pt-0">Nomor Handphone</th>
                                        <th class="pt-0">Alamat</th>
                                        <th class="pt-0">Foto</th>
                                        <th class="pt-0">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($psikologs as $psikolog)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $psikolog->user->name }}</td>
                                            <td>{{ $psikolog->kode_psikolog }}</td>
                                            <td>{{ $psikolog->jenis_keahlian }}</td>
                                            <td>{{ $psikolog->user->email }}</td>
                                            <td>{{ $psikolog->user->username }}</td>
                                            <td>{{ $psikolog->user->no_hp }}</td>
                                            <td>{{ $psikolog->user->alamat }}</td>
                                            <td><img src="{{ asset('storage/'.$psikolog->user->foto) }}" alt="" class="img-thumbnail w-100"></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="/admin/psikolog/{{ $psikolog->id }}/edit" class="badge bg-success me-2 d-inline-block">ubah</a>
                                                    <form action="/admin/psikolog/{{ $psikolog->id }}" method="post">
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
    </div>
@endsection


@extends('layouts.admin-main')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">MAMHI Psikologi | Halaman {{ $title }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">{{ $title }}</h6>
                        <div class="dropdown mb-2">
                            <button class="btn p-0" type="button" id="dropdownMenuButton7"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a class="dropdown-item d-flex align-items-center" href="/admin/member/create">
                                    <i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Tambah</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="dataTableExample">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">ID Member</th>
                                    <th class="pt-0">Nama Lengkap</th>
                                    <th class="pt-0">Tanggal Lahir</th>
                                    <th class="pt-0">Jenis Kelamin</th>
                                    <th class="pt-0">Nomor Telepon</th>
                                    <th class="pt-0">Alamat</th>
                                    <th class="pt-0">Pekerjaan</th>
                                    <th class="pt-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_member as $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $member->id }}</td>
                                        <td>{{ $member->user->name ?? '-' }}</td>
                                        <td>{{ $member->user->tanggal_lahir ?? '-' }}</td>
                                        <td>{{ $member->user->jenis_kelamin }}</td>
                                        <td>{{ $member->user->no_hp ?? '-' }}</td>
                                        <td>{{ $member->user->alamat ?? '-' }}</td>
                                        <td>{{ $member->pekerjaan }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="/admin/member/{{ $member->id }}/edit" class="badge bg-primary d-inline-block">Detail</a>
                                                {{-- <form action="/admin/member/{{ $member->id }}" method="post">
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

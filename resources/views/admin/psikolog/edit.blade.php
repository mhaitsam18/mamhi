@extends('layouts.admin-main')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Detail Psikolog</h4>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 ml-4">
                            <form action="/admin/psikolog/update-photo/{{ $psikolog->user->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <img src="{{ asset('storage/'.$psikolog->user->foto) }}" alt="" class="img-thumbnail w-50 m-3 img-preview">
                                </div>
                                <h4>Edit Foto</h4>
                                <input type="file" class="form-control input-img filepond @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{ old('foto') }}" multiple  data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                <input type="hidden" name="nama_foto" id="nama_foto" value="">
                                @error('foto')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button type="submit" class="btn btn-sm btn-primary float-end">Simpan</button>
                            </form>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <form action="/admin/psikolog/{{ $psikolog->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="kode_psikolog">Kode Psikolog</label>
                                    <input type="text" class="form-control @error('kode_psikolog') is-invalid @enderror" name="kode_psikolog" id="kode_psikolog" value="{{ old('kode_psikolog', $psikolog->kode_psikolog) }}">
                                    @error('kode_psikolog')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_keahlian">Keahlian</label>
                                    <textarea class="form-control @error('jenis_keahlian') is-invalid @enderror" name="jenis_keahlian" id="jenis_keahlian">{{ old('jenis_keahlian', $psikolog->jenis_keahlian) }}</textarea>
                                    @error('jenis_keahlian')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $psikolog->user->name) }}">
                                    @error('name')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $psikolog->user->email) }}">
                                    @error('email')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username', $psikolog->user->username) }}">
                                    @error('username')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $psikolog->user->tanggal_lahir) }}">
                                    @error('tanggal_lahir')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp">Nomor Ponsel</label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ old('no_hp', $psikolog->user->no_hp) }}">
                                    @error('no_hp')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin">Gender</label>
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="" selected disabled>Pilih Gender</option>
                                        <option value="Laki-laki" @selected('Laki-laki' == old('jenis_kelamin',$psikolog->user->jenis_kelamin))>Laki-laki</option>
                                        <option value="Perempuan" @selected('Perempuan' == old('jenis_kelamin',$psikolog->user->jenis_kelamin))>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat">{{ old('alamat', $psikolog->user->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-primary float-end">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <h3>Dokumen Psikolog</h3>
                    </div>
                    <h4>Riwayat Konsultasi Pasien</h4>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="dataTableExample">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Nomor Rekam Psikolog</th>
                                    <th class="pt-0">Nama Pasien</th>
                                    <th class="pt-0">Tanggal Konsultasi</th>
                                    <th class="pt-0">Keluhan</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Hasil diagnosis</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konsultasis as $konsultasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $konsultasi->diagnosis->nomor_rekam_psikolog ?? '-' }}</td>
                                        <td>{{ $konsultasi->member->user->name ?? '-' }}</td>
                                        <td>{{ date('j F Y', strtotime($konsultasi->tanggal_konsultasi)) }}</td>
                                        <td>{{ $konsultasi->keluhan ?? '-' }}</td>
                                        <td>{{ $konsultasi->status ?? '-' }}</td>
                                        <td>{{ $konsultasi->diagnosis->hasil_konsultasi ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h4>Riwayat Psikotes Peserta uji</h4>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="dataTableExample2">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Nomor Peserta</th>
                                    <th class="pt-0">Nama Peserta</th>
                                    <th class="pt-0">Tanggal Psikotes</th>
                                    <th class="pt-0">Jenis Psikotes</th>
                                    <th class="pt-0">Kebutuhan</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($psikotess as $psikotes)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $psikotes->nomor_peserta ?? '-' }}</td>
                                        <td>{{ $psikotes->member->user->name ?? '-' }}</td>
                                        <td>{{ date('j F Y', strtotime($psikotes->tanggal_psikotes)) }}</td>
                                        <td>{{ $psikotes->jenis_psikotes->jenis_psikotes ?? '-' }}</td>
                                        <td>{{ $psikotes->kebutuhan ?? '-' }}</td>
                                        <td>{{ $psikotes->status ?? '-' }}</td>
                                        <td>{{ $psikotes->nilai_psikotes ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function previewFoto() {
            var namaFoto = $('#nama_foto').val();
            var imagePath = '{{ asset('storage/') }}' + '/' + namaFoto;
            $('.img-preview').attr('src', imagePath);
        }


        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            FilePondPluginImageEdit,
        );

        FilePond.create(
            document.querySelector('.filepond')
        );
        FilePond.setOptions({
            server: {
                process: {
                    url: '/file/tmp-upload',
                    method: 'POST',
                    withCredentials: false,
                    onload: (response) => {
                        console.log(response);
                        $('#nama_foto').val(response);
                        var namaFoto = $('#nama_foto').val();
                        var imagePath = '{{ asset('storage/') }}' + '/' + namaFoto;
                        $('.img-preview').attr('src', imagePath);
                    },
                    ondata: (formData) => {
                        formData.append('folder', 'foto-profil');
                        return formData;
                    },
                },
                revert: {
                    url: '/file/tmp-delete',
                    method: 'DELETE',
                    onload: (response) => {
                        console.log(response);
                        $('#nama_foto').val(response);
                        var imagePath = '{{ asset('storage/'.$psikolog->user->foto) }}';
                        $('.img-preview').attr('src', imagePath);
                    },
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

            },
            labelIdle: 'Seret & Lepaskan file Anda atau <span class="filepond--label-action"> Jelajahi </span>'
        });
    </script>
@endsection

@extends('layouts.admin-main')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Tambah data Psikolog</h4>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <form action="/admin/psikolog" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode_psikolog">Kode Psikolog</label>
                                    <input type="text" class="form-control @error('kode_psikolog') is-invalid @enderror" name="kode_psikolog" id="kode_psikolog" value="{{ old('kode_psikolog') }}">
                                    @error('kode_psikolog')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_keahlian">Keahlian</label>
                                    <input type="text" class="form-control @error('jenis_keahlian') is-invalid @enderror" name="jenis_keahlian" id="jenis_keahlian" value="{{ old('jenis_keahlian') }}">
                                    @error('jenis_keahlian')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp">Nomor Ponsel</label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
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
                                        <option value="Laki-laki" @selected('Laki-laki' == old('jenis_kelamin'))>Laki-laki</option>
                                        <option value="Perempuan" @selected('Perempuan' == old('jenis_kelamin'))>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <img src="" alt="" class="img-thumbnail w-50 m-3 img-preview">
                                </div>
                                <h4>Edit Foto</h4>
                                <input type="file" class="form-control input-img filepond @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{ old('foto') }}" multiple  data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                <input type="hidden" name="nama_foto" id="nama_foto" value="">
                                @error('foto')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-primary mx-1 float-end">Simpan</button>
                                    <a href="/admin/psikolog" class="btn btn-sm btn-secondary mx-1 float-end">Tutup</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
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
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

            },
            labelIdle: 'Seret & Lepaskan file Anda atau <span class="filepond--label-action"> Jelajahi </span>'
        });
    </script>
@endsection

@extends('layouts.admin-main')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">{{ $title }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="/admin/profile" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" id="id" value="{{ $profile->id }}">
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email', $profile->email) }}">
                                        @error('email')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                            id="username" name="username"
                                            value="{{ old('username', $profile->username) }}">
                                        @error('username')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $profile->name) }}">
                                        @error('name')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select class="form-control  @error('jenis_kelamin') is-invalid @enderror"
                                            name="jenis_kelamin" id="jenis_kelamin">
                                            <option>Pilih Gender</option>
                                            <option value="Laki-laki" @selected($profile->jenis_kelamin == 'Laki-laki')>Laki-laki</option>
                                            <option value="Perempuan" @selected($profile->jenis_kelamin == 'Perempuan')>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date"
                                            class="form-control  @error('tanggal_lahir') is-invalid @enderror"
                                            id="tanggal_lahir" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', $profile->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="no_hp" class="col-sm-2 col-form-label">Nomor Telepon </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control  @error('no_hp') is-invalid @enderror"
                                            id="no_hp" name="no_hp" value="{{ old('no_hp', $profile->no_hp) }}">
                                        @error('no_hp')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                                            placeholder="alamat">{{ old('alamat', $profile->alamat) }}</textarea>
                                        @error('alamat')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-2">Foto</div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="{{ asset('storage/' . $profile->foto) }}"
                                                    class="img-thumbnail img-preview">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input img-input" id="foto"
                                                        name="foto" onchange="previewImg()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm">
                                        <button type="submit" class="btn btn-primary float-right">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->

    </div>
    <script>
        function previewImg() {
            const picture = document.querySelector('.img-input');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(picture.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection

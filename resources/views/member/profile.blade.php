
@extends('layouts.member-main')

@section('content')
<div class="page-content">
    <div class="container">

        <div class="row m-3">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-3">
                            <div>
                                <h4 class="mb-3 mb-md-0">{{ $title }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="/member/profile" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="id" id="id" value="{{ $profile->id }}">
                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $profile->email) }}" readonly>
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
                                            <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $profile->username) }}" readonly>
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
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $profile->name) }}" readonly>
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
                                            <input type="text" class="form-control  @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin', $profile->jenis_kelamin) }}" readonly>

                                            {{-- <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" disabled>
                                                <option disabled>Pilih Gender</option>
                                                <option value="Laki-laki" @selected($profile->jenis_kelamin == "Laki-laki")>Laki-laki</option>
                                                <option value="Perempuan" @selected($profile->jenis_kelamin == "Perempuan")>Perempuan</option>
                                            </select> --}}
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
                                            <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $profile->tanggal_lahir) }}" readonly>
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
                                            <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $profile->no_hp) }}" readonly>
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
                                            <textarea class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="alamat" readonly>{{ old('alamat', $profile->alamat) }}</textarea>
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
                                                    <img src="{{ asset('storage/'.$profile->foto) }}" class="img-thumbnail img-preview">
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input img-input d-none" id="foto" name="foto" onchange="previewImg()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm">
                                            <button type="button" class="btn btn-primary float-right edit-profile-btn">Edit Profile</button>
                                            <button type="button" class="btn btn-secondary float-right cancel-btn d-none">Batal</button>
                                            <button type="submit" class="btn btn-primary float-right save-btn d-none">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div>
    </div>
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
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Tombol Edit Profile diklik
        $('.edit-profile-btn').click(function() {
            $('.edit-profile-btn').addClass('d-none'); // Sembunyikan tombol Edit Profile
            $('.cancel-btn').removeClass('d-none'); // Tampilkan tombol Batal
            $('.save-btn').removeClass('d-none'); // Tampilkan tombol Save
            $('#foto').removeClass('d-none'); // Tampilkan input foto
            $('#no_hp').prop('readonly', false); // Aktifkan input nomor telepon
            $('#alamat').prop('readonly', false); // Aktifkan input alamat
        });

        // Tombol Batal diklik
        $('.cancel-btn').click(function() {
            $('.edit-profile-btn').removeClass('d-none'); // Tampilkan tombol Edit Profile
            $('.cancel-btn').addClass('d-none'); // Sembunyikan tombol Batal
            $('.save-btn').addClass('d-none'); // Sembunyikan tombol Save
            $('#foto').addClass('d-none'); // Sembunyikan input foto
            $('#no_hp').prop('readonly', true); // Nonaktifkan input nomor telepon
            $('#alamat').prop('readonly', true); // Nonaktifkan input alamat
        });
    });
    </script>

@endsection
@endsection

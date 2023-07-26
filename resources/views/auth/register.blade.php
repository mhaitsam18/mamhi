@extends('layouts.auth-main')

@section('content')
    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
                <div class="row">
                    <div class="ps-md-0">
                        <div class="auth-form-wrapper px-4 py-5">
                            <div class="text-center">
                                <img src="/assets/img/logos/logo-mamhi.png" class="mx-auto d-block m-3 p-2" style="height: 400px;">
                            </div>
                            <form action="/register" method="post" enctype="multipart/form-data" class="forms-sample">
                                <h3 class="mb-4">Registrasi</h3>
                                @if (session()->has('error'))
                                    <div class="alert alert-danger mb-3 mx-auto" style="width: 50%;" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session()->has('success'))
                                    <div class="alert alert-success mb-3 mx-auto" style="width: 50%;" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @csrf
                                <div class="mb-3 p-2 row">
                                    <div class="col">
                                        <label class="form-label" for="email">
                                            Email <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"  name="email" autofocus value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="username">
                                            username <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"  name="username" value="{{ old('username') }}">
                                        @error('email')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 p-2 row">
                                    <div class="col">
                                        <label class="form-label" for="nama_lengkap">
                                            Nama Lengkap  <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" >
                                        @error('name')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="jenis_kelamin">
                                            Jenis Kelamin <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" @selected(old('jenis_kelamin') == "Laki-laki")>Laki-laki</option>
                                            <option value="Perempuan" @selected(old('jenis_kelamin') == "Perempuan")>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 p-2 row">
                                    <div class="col">
                                        <label class="form-label" for="tanggal_lahir">
                                            Tanggal Lahir <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" >
                                        @error('tanggal_lahir')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="no_hp">
                                            Nomor Telepon <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" >
                                        @error('no_hp')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 p-2 row">
                                    <div class="col">
                                        <label class="form-label" for="alamat">
                                            Alamat <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="foto">
                                            Foto <span class="text-danger">*</span>
                                        </label>
                                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{ old('foto') }}" >
                                        <p class="text-left">Format file: jpg, jpeg, png</p>
                                        @error('foto')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 p-2 row mt-4">
                                    <div class="col">
                                        <label class="form-label" for="password">
                                            Kata Sandi <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" autocomplete="current-password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                        @error('password')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="password_confirmation">
                                            Konfirmasi Kata Sandi <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="p-2 row">
                                    <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Daftar</button>
                                </div> 
                                <a href="/login" class="d-block mt-3 text-muted">Sudah punya akun? login</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection
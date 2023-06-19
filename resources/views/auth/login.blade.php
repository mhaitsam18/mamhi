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
                            <form action="/login" method="post" class="forms-sample text-center">
                                <h3 class="mb-4">Login</h3>
                                @if (session()->has('loginError'))
                                    <div class="alert alert-danger mb-3 mx-auto" style="width: 50%;" role="alert">
                                        {{ session('loginError') }}
                                    </div>
                                @endif
                                @if (session()->has('success'))
                                    <div class="alert alert-success mb-3 mx-auto" style="width: 50%;" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @csrf
                                <div class="mb-3 mx-auto" style="width: 50%;">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username">
                                    @error('username')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 mx-auto" style="width: 50%;">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="current-password" placeholder="Password">
                                    @error('username')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</button>
                                    {{-- <button type="button"
                                        class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                        <i class="btn-icon-prepend" data-feather="twitter"></i>
                                        Login with twitter
                                    </button> --}}
                                </div>
                                {{-- <a href="/register" class="d-block mt-3 text-muted">Not a user? Sign up</a> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
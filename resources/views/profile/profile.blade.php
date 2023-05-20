@extends('layout.app')

@section('title', 'Profile')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="card-body">
                                @if (auth()->check())
                                    @if (session('notification'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach (session('notification')['validation'] as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="username">Username</label>
                                                <input id="username" type="text" class="form-control" name="username"
                                                    autofocus value="{{ old('username', Auth::user()->username) }}">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="email">Email</label>
                                                <input id="email" value="{{ old('email', Auth::user()->email) }}"
                                                    type="email" class="form-control" name="email">
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="password" class="d-block">Password</label>
                                                <input id="password" type="password" class="form-control pwstrength"
                                                    data-indicator="pwindicator" name="password"
                                                    placeholder="Tidak Wajib Diisi !!!">
                                                <div id="pwindicator" class="pwindicator">
                                                    <div class="bar"></div>
                                                    <div class="label"></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="password2" class="d-block">Password Confirmation</label>
                                                <input id="password2" type="password" class="form-control"
                                                    name="password_confirmation" placeholder="Tidak Wajib Diisi !!!">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input id="alamat" value="{{ old('alamat', Auth::user()->alamat) }}"
                                                type="text" class="form-control" name="alamat">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="no_hp">Nomor Telepon</label>
                                                <input id="no_hp" type="text" class="form-control" name="no_hp"
                                                    autofocus value="{{ old('no_hp', Auth::user()->no_hp) }}">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="foto">Foto</label>
                                                <input id="foto" value="{{ old('foto', Auth::user()->foto) }}"
                                                    type="file" class="form-control" name="foto">
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Update data diri
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <p>Silakan login untuk mengakses halaman ini.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

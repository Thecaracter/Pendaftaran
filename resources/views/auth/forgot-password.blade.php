@extends('layout.forgotapp')


@section('title', 'Lupa Password')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <h5>{{ $error }}</h5>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session()->has('status'))
                            <div class="alert alert-success">
                                <li>Silahkan Check Email Untuk Mereset Password</li>
                            </div>
                        @endif
                        <div class="card-header">
                            <h4>Lupa Password</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Silahkan Masukan Email yang Terdaftar</p>
                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                        required autofocus>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Lupa Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

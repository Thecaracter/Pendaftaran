@extends('layout.loginapp')

@section('title', 'Register')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('login/images/img-01.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <span class="login100-form-title">
                        Member Registration
                    </span>

                    <!-- Check for validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Check for success message -->
                    @if (session('success'))
                        <div class="modal" tabindex="-1" role="dialog" id="successModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Registration Success</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ session('success') }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/" class="btn btn-primary">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            window.addEventListener('DOMContentLoaded', function() {
                                $('#successModal').modal('show');
                            });
                        </script>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <input class="input100" type="text" name="username" placeholder="Username"
                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" name="email" placeholder="Email"
                            value="{{ old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password" required
                            autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
                        <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password"
                            required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <a class="txt1" href="/">
                            Already have an account?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

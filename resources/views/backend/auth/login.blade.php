@extends('layouts.admin')
@section('dashboard')
<div class="login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="login-logo">
                    <img class="img-fluid brand-logo" src="{{asset('assets/logo/kommerce-dark.png')}}" alt="kommerce">
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{route('admin.login.submit')}}" method="post">

                    @csrf

                    <div class="form-group mb-3">
                        <div class="input-group ">
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            placeholder="Username" name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        @if($errors->has('error'))
                        <div class="text-danger">{{ $errors->first('error') }}</div>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <div class="input-group ">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password" name="password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" value="1" class=" @error('remember') is-invalid @enderror" name="remember" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                            @error('remember')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> --}}
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">Forgot Password?</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

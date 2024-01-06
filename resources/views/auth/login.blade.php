@extends('layouts.guest')
@section('content')
    <main>
        <style>
            body {
                background: url('/fundimg2-612x612.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        </style>
        <div class="container my-5">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" tabindex="-1" role="alert">
                    <strong>Failed!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('success'))
                <div class="alert alert-success alert-dismissible fade show" tabindex="-1" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" tabindex="-1" role="alert">
                    <strong>Warning!</strong> {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-xl-7 d-flex justify-content-start">
                    <div class="bg-white p-5">
                        <div class="">
                            <h2 class="">Sign In</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3 input-group">
                                    <input type="email" class="form-control form-control-lg p-3" placeholder="Your Email"
                                        name="email" required autofocus>
                                </div>
                                <div class="mb-3 input-group">
                                    <input type="password" class="form-control form-control-lg p-3" placeholder="Password"
                                        name="password" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </form>
                            <p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                            <p class="mt-3"><a href="{{ route('password.request') }}">Forgot Password?</a></p>
                            @if ($errors->any())
                                <div class="alert alert-danger mt-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <p>Or sign in with:</p>
                            <a href="#" class="btn me-2"><img width="48"
                                    height="48"src="https://img.icons8.com/color/48/facebook-new.png"
                                    alt="facebook-new" /></a>
                            <a href="#" class="btn me-2"><img width="48" height="48"
                                    src="https://img.icons8.com/color/48/google-logo.png" alt="google-logo" /></a>
                            <a href="#" class="btn me-2"><img width="50" height="50"
                                    src="https://img.icons8.com/ios-filled/50/twitterx.png" alt="twitterx" /></a>
                            <a href="#" class="btn"><img width="50" height="50"
                                    src="https://img.icons8.com/ios-filled/50/github.png" alt="github" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 text-center mt-5 align-items-center d-flex justify-content-center">
                    <h1 class="display-4 text-warning fw-bold">FundFlex</h1>
                </div>
            </div>
        </div>
    </main>
@endsection

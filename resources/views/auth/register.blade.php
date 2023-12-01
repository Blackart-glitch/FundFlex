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
            <div class="row">
                <div class="col-xl-7 d-flex justify-content-start">
                    <div class="bg-white p-5">
                        <div class="">
                            <h2 class="">Sign In</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3 input-group">
                                    <input type="text" class="form-control form-control-lg p-3" placeholder="First Name"
                                        name="Firstname" required>
                                </div>
                                <div class="mb-3 input-group">
                                    <input type="text" class="form-control form-control-lg p-3" placeholder="Surname"
                                        name="Lastname" required>
                                </div>
                                <div class="mb-3 input-group">
                                    <input type="email" class="form-control form-control-lg p-3" placeholder="Your Email"
                                        name="email" required>
                                    <span class="input-group-text">@example.com</span>
                                </div>
                                <div class="mb-3 input-group">
                                    <input type="tel" class="form-control form-control-lg p-3"
                                        placeholder="Phone Number (e.g., +123 456 7890)" name="Phone" id="Phone"
                                        autocomplete="phone" required>
                                </div>
                                <div class="mb-3 input-group">
                                    <input type="password" class="form-control form-control-lg p-3"
                                        autocomplete="new-password" placeholder="Password" name="password" required>
                                </div>
                                <div class="mb-3 input-group">
                                    <input type="password" class="form-control form-control-lg p-3"
                                        placeholder="Confirm Password" name="password_confirmation"
                                        autocomplete="new-password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
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
    <script src="{{ asset('jquery-3.7.1.js') }}"></script>
@endsection

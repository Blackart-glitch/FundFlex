@extends('layouts.guest');
@section('content')
    <div class="mt-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h1 class="text-center">Forgot Password</h1>
                    <p class="text-center">Please enter your email to request a password reset link.</p>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        {{-- Email form --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input id="email" class="form-control p-2 @error('email') is-invalid @enderror"
                                type="email" name="email" required autocomplete="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-warning">Send Reset code</button>
                        </div>

                        {{-- signup --}}
                        <div class="text-center mt-4">
                            <p>
                                Don't have an account?
                                <a href="{{ route('register') }}">Sign-up</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

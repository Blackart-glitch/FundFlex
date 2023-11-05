@extends('layouts.app');
@section('content')
    <div class="mt-5 p-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h1 class="text-center">Password Reset</h1>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        {{-- temporaryfor now --}}
                        @php
                            $request = request();
                        @endphp

                        {{-- Enter email form --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input id="email" class="form-control" type="email" name="email" required
                                autocomplete="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Enter password form --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input id="password" class="form-control" type="password" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Confirm password form --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" required autocomplete="new-password">
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <button type="submit" class="btn btn-warning">Reset Password</button>
                    </form>
                    <div class="text-center mt-4">
                        <p>Didn't receive the code? <a href="{{ route('password.request') }}">Resend</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

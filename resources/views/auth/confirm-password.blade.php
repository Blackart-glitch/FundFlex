@extends('layouts.guest')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 class="text-center">Confirm Password</h1>
                <p class="text-center">Please confirm your password before continuing.</p>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    {{-- Password form --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" class="form-control p-3 @error('password') is-invalid @enderror"
                            type="password" name="password" required autocomplete="username">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-warning">Confirm Password</button>
                    </div>

                    {{-- Forgot Password --}}
                    <div class="text-center mt-4">
                        <p>
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.guest')
@section('content')
    <style>
        /* Custom CSS for the registration page */

        .registration-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .registration-container img {
            max-width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .registration-container {
                padding: 20px;
            }
        }
    </style>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 p-0">
                    <!-- Image -->
                    <img src="{{ asset('fundimg2-612x612.jpg') }}" alt="image of the flying dragon"
                        style="width:100vh;height:100vh;">
                </div>
                <div class="col-md-6 p-0">
                    <div class="registration-container">
                        <!-- Logo and Title -->
                        <img src="{{ asset('fundimg-612x612.jpg') }}" alt="simple icon" style="width: 100px; height:100px;"
                            class="mb-4">
                        <h2 class="mb-4">Registration</h2>
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
                            <div class="mb-3">
                                <div class="input-group">
                                    <select class="form-select form-select-lg" id="country-code" name="country_code"
                                        style="width: 50px;" required>
                                        <option value="+1">+1 (USA)</option>
                                        <option value="+44">+44 (UK)</option>
                                        <!-- Add more options for different country codes -->
                                    </select>
                                    <input type="tel" class="form-control form-control-lg p-3"
                                        placeholder="Phone Number (e.g., 123-456-7890)" name="Phone" required>
                                </div>
                            </div>
                            <div class="mb-3 input-group">
                                <input type="password" class="form-control form-control-lg p-3" placeholder="Password"
                                    name="password" required>
                            </div>
                            <div class="mb-3 input-group">
                                <input type="password" class="form-control form-control-lg p-3"
                                    placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                        </form>
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
                </div>
            </div>
        </div>
    </main>
@endsection

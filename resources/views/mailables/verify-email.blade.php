@extends('layouts.guest')
@section('content')
<main>
<style>
        /* Custom styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .logo {
            max-width: 100px;
            height: auto;
            margin: 20px auto;
        }

        .jumbotron {
            background-color: #F8B600;
            color: #333;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
<div class="container">
        <div class="jumbotron">
            <img src="{{ asset('fundflex.png') }}" alt="Fundflex Logo" class="logo d-block">
            <h1 class="display-4 d-block">Fundflex</h1>
            <p class="lead d-block">Your university's trusted Fund Wallet</p>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title bg-dark p-3 text-white">Hello {{ $data['name'] }}</h5>
                <p class="card-text">We just want to confirm that you're indeed {{ $data['name'] }}. To complete your
                    action, please
                    use the digits below:</p>
                <h3 class="mb-4">
                    @php
                        //convert digit to give spacing
                        $digits = str_split($data['code']);
                        $digits = implode('&nbsp;', $digits);
                    @endphp
                    {!! $digits !!}
                </h3>
                <p class="card-text mt-3">If you didn't request this verification, please change your password and 2FA
                    immediately. Then report to <a href="{{ route('support') }}" class="btn btn-primary p-1">support</a>
                </p>
            </div>
        </div>
    </div>
</main>
@endsection

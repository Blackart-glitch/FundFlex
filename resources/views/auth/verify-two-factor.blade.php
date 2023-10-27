@extends('layouts.guest');
@section('content')
    @php
        $user = Auth::user();
    @endphp
    <main class="bg-white">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h1 class="text-center">Email Verification</h1>
                    @if (session('error_status'))
                        <x-status-alert :type="danger" id="statusmsg" :status="session('error_status')" />
                    @endif
                    <p class="text-center">Please enter the verification code sent from Google Authenticator</p>
                    <form method="POST" action="{{ route('verify.token') }}">
                        @csrf
                        <div class="QR-code">
                            {{ $qrcode }}
                        </div>
                        <p class="text-center">Open your Google Authenticator App, and press the "+" icon in the top right,
                            and then press "Scan Barcode"</p>
                        <p>if the code doesn't work, simply create a new one</p>
                        <div class="d-flex justify-content-center">
                            <input type="text" id="code1" class="form-control verification-input mx-1 text-center"
                                maxlength="1">
                            <input type="text" id="code2" class="form-control verification-input mx-1 text-center"
                                maxlength="1">
                            <input type="text" id="code3" class="form-control verification-input mx-1 text-center"
                                maxlength="1">
                            <input type="text" id="code4" class="form-control verification-input mx-1 text-center"
                                maxlength="1">
                            <input type="text" id="code5" class="form-control verification-input mx-1 text-center"
                                maxlength="1">
                            <input type="text" id="code6" class="form-control verification-input mx-1 text-center"
                                maxlength="1">
                            <input type="hidden" id="code" name="code" value="">
                        </div>
                        <div class="text-center mt-4">
                            @if ($errors->has('token'))
                                <span class="text-danger d-block">{{ $errors->first('token') }}</span>
                            @endif

                            <button class="btn btn-outline-warning" type="submit">Verify</button>
                            <button class="btn btn-outline-secondary" type="button" id="clear">Clear</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p>
                            Didn't receive the code?
                        <div class="gap-2 d-flex justify-content-center align-items-center" role="group"
                            aria-label="Button group name">

                            <button id="resendButton" class="btn btn-outline-primary">Resend</button>
                            <span id="timeDisplay" class="fw-bold text-danger"></span>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('jquery-3.7.1.js') }}"></script>
        <script></script>
    </main>
@endsection

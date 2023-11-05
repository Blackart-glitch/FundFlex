@extends('layouts.guest');
@section('content')
    @php
        $user = Auth::user();
    @endphp
    <main class="bg-white">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h1 class="text-center">Two Factor Authentication</h1>
                    @if (session('error'))
                        <x-status-alert type="danger" id="statusmsg" :status="session('error')" />
                    @endif
                    <p class="text-center">Please enter the verification code sent from Google Authenticator</p>
                    <form method="POST" action="{{ route('two-factor') }}">
                        @csrf
                        <div class="QR-code d-flex justify-content-center btn btn-warning">
                            {!! $qrcode['qrcode'] !!}
                        </div>
                        <p class="text-center">Open your Google Authenticator App, and press the "+" icon in the top right,
                            and then press "Scan Barcode"</p>
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
                            <input type="hidden" id="code" name="token" value="">
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
        <script>
            // Select all the input elements and the hidden form input
            const inputs = document.querySelectorAll(".verification-input");
            const hiddenInput = document.getElementById("code");

            // Add an event listener for each input element
            inputs.forEach((input, index) => {
                input.addEventListener("input", (e) => {
                    // Set the input's value to the corresponding character in the hidden input
                    hiddenInput.value = [...hiddenInput.value.slice(0, index), e.target.value, ...hiddenInput
                        .value.slice(index + 1)
                    ].join('');

                    // Move focus to the next input if it's not the last input
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });

                // Add an event listener for the Backspace or Delete keys
                input.addEventListener("keydown", (e) => {
                    if (e.key === "Backspace" || e.key === "Delete") {
                        // Clear the input's value
                        e.target.value = "";
                        hiddenInput.value = [...hiddenInput.value.slice(0, index), "", ...hiddenInput.value
                            .slice(index + 1)
                        ].join('');

                        // Move focus to the previous input if it's not the first input
                        if (index > 0) {
                            inputs[index - 1].focus();
                        }
                    }
                });

                // Add an event listener for the Left Arrow key
                input.addEventListener("keydown", (e) => {
                    if (e.key === "ArrowLeft" && index > 0) {
                        // Move focus to the previous input
                        inputs[index - 1].focus();
                    }
                });

                // Add an event listener for the Right Arrow key
                input.addEventListener("keydown", (e) => {
                    if (e.key === "ArrowRight" && index < inputs.length - 1) {
                        // Move focus to the next input
                        inputs[index + 1].focus();
                    }
                });
            });
        </script>
    </main>
@endsection

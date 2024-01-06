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
                    @if ($user)
                        <p class="text-center">A verification code has been sent to {{ $user->email }} <a href="#"
                                class="btn btn-outline-secondary">Change Email</a></p>
                    @endif
                    <p class="text-center">Please enter the verification code sent to your email.</p>
                    <form method="POST" action="{{ route('verify.token') }}">
                        @csrf
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
                            <input type="text" id="code7" class="form-control verification-input mx-1 text-center"
                                maxlength="1">
                            <input type="text" id="code8" class="form-control verification-input mx-1 text-center"
                                maxlength="1">
                            <input type="text" id="code9" class="form-control verification-input mx-1 text-center"
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
        <script>
            $(document).ready(function() {
                const inputs = $('.verification-input');

                inputs.on('input', function(e) {
                    if (e.target.value) {
                        const index = inputs.index(this);
                        if (index < inputs.length - 1) {
                            inputs.eq(index + 1).focus();
                        } else {
                            $(this).blur();
                        }
                    }

                    var inputValues = [];

                    // Loop through the input elements by class
                    inputs.each(function() {
                        inputValues.push($(this).val());
                    });
                    var code = inputValues.join('');

                    $('#code').val(code);
                });

                inputs.on('keydown', function(e) {
                    if (e.which === 37 || e.which === 39) { // Left and right arrow keys
                        const index = inputs.index(this);
                        if (e.which === 37 && index > 0) {
                            inputs.eq(index - 1).focus(); // Move left
                        } else if (e.which === 39 && index < inputs.length - 1) {
                            inputs.eq(index + 1).focus(); // Move right
                        }
                        e.preventDefault(); // Prevent the default arrow key behavior
                    }
                });

                $('#clear').on('click', function() {
                    inputs.val('');
                    inputs.eq(0).focus();
                });
            });
        </script>
        <script>
            // Set the time limit to 5 minutes (300,000 milliseconds)
            const timeLimit = 300000;
            let elapsedTime = 0;

            // Function to update the button text and enable the button when the time limit is reached
            function updateButtonAndTime() {
                elapsedTime += 1000; // Increase elapsed time by 1 second

                if (elapsedTime >= timeLimit) {
                    const resendButton = document.getElementById('resendButton');
                    const timeDisplay = document.getElementById('timeDisplay');
                    resendButton.removeAttribute('disabled');
                    resendButton.text('Resend');
                    timeDisplay.innerHTML = '5:00'; // Display 5:00 when time limit is reached
                    clearInterval(timerInterval); // Stop the interval
                } else {
                    // Calculate remaining time
                    const remainingTime = new Date(timeLimit - elapsedTime);
                    const minutes = remainingTime.getUTCMinutes();
                    const seconds = remainingTime.getUTCSeconds();
                    const timeDisplay = document.getElementById('timeDisplay');
                    timeDisplay.innerHTML = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                }
            }

            // Start checking the time every second
            const timerInterval = setInterval(updateButtonAndTime, 1000);

            /* on click of the resend button */
            $('#resendButton').on('click', function() {
                //set the text to Loading
                $(this).text('Sending...');

                //get the CSRF token
                const _token = $('input[name="_token"]').val();

                $.ajax({
                    type: "post",
                    url: '/email/verification-notification',
                    data: {
                        _token: _token
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response.message);
                        $('#resendButton').text('Sent');
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        } else {
                            /* disables the button and changes the resend button to sent for 10 seconds */
                            const resendButton = $('#resendButton');
                            const timeDisplay = document.getElementById('timeDisplay');
                            resendButton.prop('disabled', true);

                            const timerInterval = setInterval(updateButtonAndTime, 1000);
                            updateButtonAndTime();
                        }
                    }
                });
            });
        </script>
    </main>
@endsection

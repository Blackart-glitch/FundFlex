@extends('layouts.guest');
@section('content')
    <main class="bg-white">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h1 class="text-center">Email Verification</h1>
                    <p class="text-center">Please enter the verification code sent to your email.</p>
                    <form>
                        <div class="d-flex justify-content-center">
                            <input type="text" class="form-control verification-input mx-1 text-center" maxlength="1">
                            <input type="text" class="form-control verification-input mx-1 text-center" maxlength="1">
                            <input type="text" class="form-control verification-input mx-1 text-center" maxlength="1">
                            <input type="text" class="form-control verification-input mx-1 text-center" maxlength="1">
                            <input type="text" class="form-control verification-input mx-1 text-center" maxlength="1">
                            <input type="text" class="form-control verification-input mx-1 text-center" maxlength="1">
                            <input type="text" class="form-control verification-input mx-1 text-center" maxlength="1">
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-outline-warning" type="submit">Verify</button>
                            <button class="btn btn-outline-secondary" type="button" id="clear">Clear</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p>Didn't receive the code? <a href="#">Resend</a></p>
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

    </main>
@endsection

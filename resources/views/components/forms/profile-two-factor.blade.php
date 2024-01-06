<!-- Two-Factor Authentication Modal -->
<div class="modal fade" id="TwofaSettingsModal" tabindex="-1" aria-labelledby="2faSettingsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="2faSettingsModalLabel">Two-Factor Authentication Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-bodyp-2">
                @csrf
                <p>
                    Enabling two factor authentication ensures extra layer of security to your account. Using
                    Google authenticator, you would be required to insert a code everytime you log in
                </p>
                <div class="form-check form-switch mb-3 d-flex justify-content-evenly fs-2">
                    <input class="form-check-input" type="checkbox" id="enable2FA" name="enable2FA"
                        {{ $user->two_factor == 'enabled' ? 'checked' : '' }}>
                    <span id="form-check-loader"></span>
                </div>

                <div class="mb-3 d-flex justify-content-end">
                    <button id="requestNewQRCode" class="btn btn-outline-warning">
                        REQUEST A NEW QR CODE
                    </button>
                </div>

                <!-- QR Code Placeholder -->

                <div class="mb-3 d-flex justify-content-between align-items-center" id="qrPlaceholder">
                    @if ($user->qrimage)
                        <img src="{{ asset('storage/Avatars/' . auth()->user()->avatar) }}" alt="QR Code"
                            class="img-fluid w-100 h-100">
                        <p>Scan this QR code with your authenticator app to enable two-factor authentication.</p>
                    @endif
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        /* on click of the request Qr code */
        $('#requestNewQRCode').click(function() {
            //disable the button
            $(this).attr('disabled', true);
            //add spinner to the button
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            //send ajax request
            $.ajax({
                url: "{{ route('profile.update-two-factor') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: $('input[name=_token]').val()
                },
                success: function(response) {
                    console.info(response)
                    //switch the image source
                    $('#qrPlaceholder').html(response.data.qrcode).append(
                        '<p>Scan this QR code with your authenticator app to enable two-factor authentication.</p>'
                    );

                    //enable the button
                    $('#requestNewQRCode').attr('disabled', false);
                    //remove the spinner
                    $('#requestNewQRCode').html('REQUEST A NEW QR CODE');
                },
                error: function(response) {
                    $('#qrPlaceholder').html(
                        '<h1 class="text-warning">Something went wrong. Try again later</h1>');
                    //enable the button
                    $('#requestNewQRCode').attr('disabled', false);
                    //remove the spinner
                    $('#requestNewQRCode').html('REQUEST A NEW QR CODE');
                }
            });
        });

        /* on check of the input */
        $('#enable2FA').change(function() {
            //disable the button
            $(this).attr('disabled', true);
            //add spinner to the button
            $('#form-check-loader').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
            );

            //send ajax request
            $.ajax({
                url: "{{ route('profile.update-two-factor') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: $('input[name=_token]').val(),
                    two_factor: $(this).is(':checked') ? true : false
                },
                success: function(response) {
                    console.info(response)
                    //enable the button
                    $('#enable2FA').attr('disabled', false);
                    //remove the spinner
                    if (response.two_factor === 'true') {
                        $('#form-check-loader').html(
                            '<span class="text-success fw-bolder">Enabled</span>');
                    } else {
                        $('#form-check-loader').html(
                            '<span class="text-danger fw-bolder">Disabled</span>');
                    }

                    $('#qrPlaceholder').html(response.data.qrcode).append(
                        '<p>Scan this QR code with your authenticator app to enable two-factor authentication.</p>'
                    );
                },
                error: function(response) {
                    $('#qrPlaceholder').html(
                        '<h1 class="text-warning">Something went wrong. Try again later</h1>');
                    //enable the button
                    $('#enable2FA').attr('disabled', false);
                    //remove the spinner
                    $('#form-check-loader').html('');
                }
            });
        });
    </script>
</div>

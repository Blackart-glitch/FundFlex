<!-- Transfer Modal (Large) -->
<div class="modal fade" id="TransferModal" tabindex="-1" role="dialog" aria-labelledby="TransferModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('wallet.transfer') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TransferModalLabel">Transfer Funds</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- User's Email Container -->
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Your Email Address:</label>
                        <input type="email" class="form-control p-2" id="userEmail" value="{{ $email }}"
                            readonly>
                    </div>

                    <!-- Amount Input -->
                    <div class="mb-3">
                        <label for="TransferAmount" class="form-label">Transfer Amount:</label>
                        <input type="number" class="form-control p-2" id="amount" name="amount"
                            placeholder="Enter amount" step="0.01">
                    </div>

                    <div class="mb-3">
                        <fieldset>
                            <legend>wallet Details</legend>

                            {{-- wallet wallet number --}}
                            <div class="mb-3">
                                <input type="number" class="form-control p-2" name="wallet-number" id="wallet-number"
                                    placeholder="Enter wallet number" step="1">
                            </div>

                            {{-- wallet code --}}
                            <div class="mb-3">
                                <button type="button" id="verifywallet" class="btn btn-primary mb-2">verify</button>
                                <p class="p-3 border border-3 border-success container verified"></p>

                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-warning">Transfer</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#verifywallet').on('click', function() {
                // empty the container first
                $('.verified').text('');

                //gets the wallet number
                $.ajax({
                    type: "post",
                    url: "{{ route('verify-wallet') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        WalletCode: $('#wallet-number').val() // Get the value of the wallet input
                    },
                    dataType: "json",
                    success: function(response) {
                        console.info(response);
                        if (response.status === true) {
                            // update the verified container
                            $('.verified').text('verified: ' + response.data.name);
                        } else {
                            // update the verified container
                            $('.verified').text('error: ' + response.message);
                        }
                    }
                });
            });
        });
    </script>
</div>

<!-- Deposit Modal (Large) -->
<div class="modal fade" id="depositModal" tabindex="-1" role="dialog" aria-labelledby="depositModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('wallet.topup') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="depositModalLabel">Deposit Funds</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- User's Email Container -->
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Your Email Address:</label>
                        <input type="email" class="form-control" id="userEmail" value="{{ $email }}" readonly>
                    </div>

                    <!-- Amount Input -->
                    <div class="mb-3">
                        <label for="depositAmount" class="form-label">Deposit Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount"
                            placeholder="Enter amount" step="0.01" required>
                    </div>

                    <!-- Currency Select -->
                    <div class="mb-3">
                        <label for="currency" class="form-label">Select Currency:</label>
                        <select class="form-select" id="currency" name="currency" required>
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger fw-bold">You should use a corresponding card with this currency to
                            continue
                        </p>
                    </div>

                    <!-- Payment Mode (Radio Buttons) -->
                    <div class="mb-3">
                        <label class="form-label">Payment Mode:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMode" id="payBycard"
                                value="card" checked>
                            <label class="form-check-label" for="payBycard">
                                Pay by Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMode" id="payByFundFlex"
                                value="fundflex">
                            <label class="form-check-label" for="payByFundFlex">
                                Pay by FundFlex Wallet
                            </label>
                        </div>
                    </div>

                    <!-- Pay by FundFlex Wallet Modal (Nested Modal) -->
                    <div class="modal fade" id="fundflexModal" tabindex="-1" role="dialog"
                        aria-labelledby="fundflexModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content border border-primary rounded">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="fundflexModalLabel">Secured by FundFlex
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('fund test.jpg') }}" alt="User's Wallet Image"
                                            class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                    </div>

                                    <p class="text-center font-weight-bold">{{ $fullname }}</p>
                                    <p class="text-center">Account Number: {{ $walletnumber }} </p>
                                    <p class="text-center">Bank name: FundFlex </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success">Share</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Deposit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    /* let the radio btn for pay by fundflex wallet open the nested modal */
    $('#payByFundFlex').click(function() {
        $('#fundflexModal').modal('show');

        /* unset the radio btn for pay by fundflex wallet */
        $('#payByFundFlex').prop('checked', false);
    });
</script>

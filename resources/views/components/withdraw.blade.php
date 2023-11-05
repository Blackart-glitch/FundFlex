<!-- Withdraw Modal (Large) -->
<div class="modal fade" id="WithdrawModal" tabindex="-1" role="dialog" aria-labelledby="WithdrawModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('wallet.withdraw') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="WithdrawModalLabel">Withdraw Funds</h5>
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
                        <label for="WithdrawAmount" class="form-label">Withdraw Amount:</label>
                        <input type="number" class="form-control p-2" id="amount" name="amount"
                            placeholder="Enter amount" step="0.01">
                    </div>

                    <div class="mb-3">
                        <fieldset>
                            <legend>Bank Details</legend>
                            <p class="text-danger fw-bold">Please make sure the account number and bank name are
                                correct</p>
                            {{-- bank account number --}}
                            <div class="mb-3">
                                <input type="number" class="form-control p-2" name="account-number" id="account-number"
                                    placeholder="Enter account number" step="1">
                            </div>

                            {{-- bank name --}}
                            <div class="mb-3">
                                <input type="text" class="form-control p-2" name="BankName" id="BankName"
                                    placeholder="Enter bank name" list="banks" required>
                                <input type="hidden" id="bank-code" name="bank-code" required>
                                {{-- data list --}}
                                <datalist id="banks">
                                    {{-- options will be added dynamically using javascript --}}
                                </datalist>
                            </div>
                            <div class="mb-3 float-right">
                                <button type="button" class="btn btn-primary" id="verify">Verify</button>
                            </div>
                            <p class="warningmsg text-danger"></p>
                            <div class=" verified border  border-3 border-success" style="display: none">
                                <div class=" row ">
                                    <div class="col-lg-8 col-md-8 col-sm-12 fw-bold text-center">
                                        <p class="verified-name"> james Onyedikachi</p>
                                        <p class="verified-number"> 122344566</p>
                                        <p class="verified-bank"> UBA</p>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-4 col-sm-12 bg-success d-flex align-items-center justify-content-center">
                                        <span class="material-symbols-outlined" style="font-size: 70px; color:white;">
                                            verified_user
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Withdraw</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        // Get the bank code input
        const BankName = $('#BankName');

        // Initialize a variable to track whether a selection was made
        let optionSelected = false;

        // On input
        BankName.on('input', function() {
            // Check if there is a matching option in the datalist
            const inputValue = BankName.val();
            const matchingOption = $(`#banks option[value="${inputValue}"]`);

            if (matchingOption.length > 0) {
                // A matching option exists, set the bank code and mark as selected
                const selectedBankCode = matchingOption.data('bank-code');
                $('#bank-code').val(selectedBankCode);

                optionSelected = true;
            } else {
                // No matching option, so initiate an AJAX request
                optionSelected = false;

                // Empty the datalist
                $('#banks').empty();

                //empty the bank code input
                $('#bank-code').val('');

                $.ajax({
                    type: "post",
                    url: "{{ route('banks') }}", // Added double quotes around the route URL
                    data: {
                        _token: "{{ csrf_token() }}", // Added double quotes around the token
                        BankName: BankName.val()
                    },
                    dataType: "json",
                    success: function(response) {
                        // Fill in the datalist
                        response.forEach(bank => {

                            // Build a new option
                            const option =
                                `<option value="${bank.name}" data-bank-code="${bank.code}">${bank.name}</option>`;
                            // Append the option to the datalist
                            $('#banks').append(option);
                        });

                    }
                });
            }
        });

        // Listen for the selection of a bank option
        $('#banks').on('change', function() {
            if (!optionSelected) {
                // Only update the bank code if an option wasn't already selected
                const selectedOption = $('#banks option:selected');
                const selectedBankCode = selectedOption.data('bank-code');
                $('#bank-code').val(selectedBankCode);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#verify').on('click', function() {
                //verify the bank details
                const verified = $('.verified');
                const verifiedName = $('.verified-name');
                const verifiedNumber = $('.verified-number');
                const verifiedBank = $('.verified-bank');
                const warningmsg = $('.warningmsg');

                $.ajax({
                    type: "post",
                    url: "{{ route('verify-bank-account') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        accountNumber: $('#account-number').val(),
                        bankCode: $('#bank-code').val()
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status == true) {
                            verifiedName.text(response.data.account_name);
                            verifiedNumber.text(response.data.account_number);
                            verifiedBank.text(response.data.bank_name);
                            warningmsg.text('');
                            verified.show();
                        } else {
                            verified.hide();
                            verifiedName.text('');
                            verifiedNumber.text('');
                            verifiedBank.text('');
                            warningmsg.text(response.message);
                        }
                    }
                });
            });
        });
    </script>
</div>

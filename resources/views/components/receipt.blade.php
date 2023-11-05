<!-- Modal -->
<div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionModalLabel">Transaction Receipt</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="transaction-details">
                    <p class="transaction-id"><strong>Transaction ID:</strong> 164747t574gh</p>
                    <p class="datetime"><strong>Date and Time:</strong> 2021-09-01 10:30 AM</p>
                    <p class="description"><strong>Description:</strong> Payment from client</p>
                    <p class="type"><strong>Type:</strong> <strong class="text-danger"> Debit</strong></p>
                    <p class="amount"><strong>Amount:</strong> $ 1000</p>
                    <div class="row">
                        <div class="col">
                            <p class="currency"><strong>Currency Code:</strong> USD</p>
                        </div>
                        <div class="col">
                            <p class="currency-name"><strong>Currency Name:</strong> US Dollar</p>
                        </div>
                    </div>
                    <p class="status"><strong>Status:</strong> <strong class="text-success"> Completed</strong></p>
                    <div class="row">
                        <div class="col">
                            <p class="sender"><strong>Sender:</strong> John Doe</p>
                        </div>
                        <div class="col">
                            <p class="receiver"><strong>Receiver:</strong> Jane Smith</p>
                        </div>
                    </div>
                    <p class="category"><strong>Category:</strong> Tuition</p>
                    <p class="notes"><strong>Notes/Comments:</strong> This is a sample transaction.</p>
                    <p class="attachment"><strong>Attachment:</strong> [Attachment Link]</p>
                </div>
                <hr>
                <div class="transaction-logs">
                    <p><strong>Transaction Logs:</strong></p>
                    <ul>
                        <li>[Log 1: Transaction initiated at 10:30 AM]</li>
                        <li>[Log 2: Payment received]</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

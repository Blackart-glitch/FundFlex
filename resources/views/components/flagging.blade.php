<div class="modal fade" id="flagTransactionModal" tabindex="-1" role="dialog" aria-labelledby="flagTransactionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="flagTransactionModalLabel">Flag Transaction</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for flagging the transaction -->
                <form>
                    <div class="form-group">
                        <label for="reason">Reason for Flagging:</label>
                        <textarea class="form-control" id="reason" rows="3"
                            placeholder="Enter the reason for flagging this transaction" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Flag Transaction</button>
            </div>
        </div>
    </div>
</div>

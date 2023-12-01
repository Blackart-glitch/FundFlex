<div class="modal fade" id="transactionModal{{ $transaction->id }}" tabindex="-1" role="dialog"
    aria-labelledby="transactionModalLabel" aria-hidden="true">
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
                    <p class="transaction-id"><strong>Transaction Reference:</strong> {{ $transaction->reference_id }}
                    </p>
                    <p class="datetime"><strong>Date and Time:</strong> {{ $transaction->created_at }}</p>
                    <p class="description"><strong>Description: </strong>{{ $transaction->description }} </p>
                    <p class="type"><strong>Type:</strong> <strong
                            class="text-danger">{{ $transaction->transaction_type }} </strong></p>
                    <p class="amount">
                        <strong>Amount: </strong>{{ $transaction->amount }}
                    </p>
                    <div class="row">
                        <div class="col">
                            <p class="currency"><strong>Currency Code:</strong> NGN </p>
                        </div>
                        <div class="col">
                            <p class="currency-name"><strong>Currency Name:</strong> NG NAIRA</p>
                        </div>
                    </div>
                    <p class="status"><strong>Status:</strong> <strong class="text-success">{{ $transaction->status }}
                        </strong></p>
                    <div class="row">
                        <div class="col">
                            <p class="sender"><strong>Sender:</strong>{{ $transaction->sender }} </p>
                        </div>
                        <div class="col">
                            <p class="receiver"><strong>Receiver:</strong>{{ $transaction->receiver }} </p>
                        </div>
                    </div>
                    <p class="category"><strong>Category:</strong> Tuition</p>
                    <p class="notes">
                        <strong>Notes/Comments:
                        </strong>{!! 'status updated to <strong>' .
                            $transaction->status .
                            '</strong> at exactly <strong
                                                                                                                                                                                                                                                                            class="text-success">' .
                            $transaction->updated_at .
                            '</strong>' !!}
                    </p>
                    <p class="attachment"><strong>Attachment:
                        </strong>{{ $transaction->attachments ?? 'No Attachments' }} </p>
                </div>
                <hr>
                <div class="transaction-logs">
                    <p><strong>Transaction Logs:</strong></p>
                    <ul>
                        <li>[Log 1: Transaction initiated at {{ $transaction->created_at }}]</li>
                        <li>[Log 2: {{ $transaction->status == 'success' ? ' Payment received' : 'Payment pending' }}]
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info d-flex align-items-center">
                    <span class="material-symbols-outlined">
                        share
                    </span>
                    Share
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

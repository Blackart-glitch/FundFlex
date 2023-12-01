<div>
    <style>
        fieldset {
            border: 2px solid #333;
            /* Add a border with a color and thickness of your choice */
            border-radius: 5px;
            /* Add rounded corners to the border */
            padding: 10px;
            /* Add some padding to the fieldset */
        }

        legend {
            font-weight: bold;
            /* Make the legend text bold */
        }
    </style>
    <div class="modal fade" id="{{ 'paymentmodal' . $id }}" tabindex="-1" role="dialog"
        aria-labelledby="{{ 'paymentmodaltitle' . $id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ 'paymentmodaltitle' . $id }}">PAYMENT FOR {{ strtoupper($title) }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('wallet.bill') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="bill_id" value="{{ $id }}">
                        </div>
                        <div class="form-group p-2">
                            <fieldset>
                                <legend>Billing info</legend>
                                <div class="mt-2 border border-secondary border-2 d-inline-block">
                                    @php
                                        $biller = Auth::user()->email;
                                    @endphp
                                    <span class="btn btn-warning border-right p-3">Biller Email: </span><span
                                        class="p-3">{{ $biller }}</span>
                                </div>
                            </fieldset>
                            <div class="mt-2">
                                <fieldset>
                                    <legend>Payable</legend>

                                    <div class="table-responsive">
                                        <table
                                            class="table table-striped table-hover table-borderless table-primary align-middle">
                                            <tbody class="table-group-divider">
                                                <tr class="table-primary">
                                                    <td scope="row">Net Amount</td>
                                                    <td>{{ $billamount }} </td>
                                                </tr>
                                                <tr class="table-primary">
                                                    <td scope="row">Tax</td>
                                                    <td>{{ $Tax }} </td>
                                                </tr>
                                                <tr class="table-primary">
                                                    <td scope="row">Discount</td>
                                                    <td>{{ $Discount }} </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                @php
                                                    $Total = bcadd($billamount, $Tax, 2);
                                                    $Total = bcsub($Total, $Discount, 2);
                                                @endphp
                                                <tr class="table-primary">
                                                    <td scope="row fw-bold text-danger">Total</td>
                                                    <td>{{ $Total }} </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="mt-2">
                                <fieldset>
                                    <legend>Payment mode</legend>
                                    <select name="payment_mode" class="p-3 w-100 bg-outline-warning" id="payment_mode">
                                        <option value="card">Card</option>
                                        <option value="wallet" class="">FundFlex wallet
                                        </option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-target="{{ '#modal' . $id }}"
                            data-bs-toggle="modal">Cancel</button>
                        <input type="submit" class="btn btn-outline-warning" value="Pay now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="card shadow-sm">
        <img src="{{ asset($image) }}" alt="{{ explode('.', $image)[0] }}" class="bd-placeholder-img card-img-top"
            width="100%" height="150" xmlns="http://www.w3.org/2000/svg" role="img"
            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
        <div class="card-body">
            <p class="card-text">{{ $title }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="{{ '#modal' . $id }}">
                        View Bill
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        Pay Bill
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="{{ 'modal' . $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ 'modal' . $id }}"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ 'modal' . $id }}">
                        <p>{{ $title }}</p>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Due Date:</strong>
                            <p>{{ $due_date }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Description:</strong>
                            <p>{{ $description }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Status:</strong>
                            <p>{{ $status }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Amount:</strong>
                            <p>{{ $amount }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Payment Method:</strong>
                            <p>{{ $payment_method }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Reference:</strong>
                            <p>{{ $reference }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Late Fee:</strong>
                            <p>{{ $late_fee }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Discounts:</strong>
                            <p>{{ $discounts }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Tax:</strong>
                            <p>{{ $tax }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Category:</strong>
                            <p>{{ $category }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Type:</strong>
                            <p>{{ $type }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Billing Period:</strong>
                            <p>{{ $billing_period }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Last Updated:</strong>
                            <p>{{ $updated_at }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Pay Bill</button>
                </div>
            </div>
        </div>
    </div>
</div>
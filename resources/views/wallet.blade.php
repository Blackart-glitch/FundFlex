@extends('layouts.sidebar')
@section('sidebar.content')
    <div>
        <div class="row justify-content-evenly">
            <div class="col-lg-5 bg-white p-2 rounded shadow-lg">
                <h2>Available Balance</h2>
                <h1>$0.00</h1>
            </div>
            <div class="col-lg-6 bg-white p-2 rounded shadow-lg">
                <h3>Your wallet ID:</h3>

                <div class="gap-2">
                    <span>09275767833GHY</span>
                    <span class="material-symbols-outlined btn btn-warning">
                        content_copy
                    </span>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-primary">
                        <span class="material-symbols-outlined">
                            download_for_offline
                        </span>
                    </button>
                    <button type="button" class="btn btn-outline-success">Regenerate
                        <span class="material-symbols-outlined">
                            frame_reload
                        </span>
                    </button>
                </div>
            </div>
        </div>

        {{-- action buttons for the wallet --}}
        <div class="mt-2">
            <button type="button" class="btn btn-success">deposit</button>
            <button type="button" class="btn btn-secondary">Transfer</button>
            <button type="button" class="btn btn-danger">Withdraw</button>
            <button type="button" class="btn btn-warning">payments</button>
            <button type="button" class="btn btn-info">Add a card</button>
        </div>

        {{-- quick action section for bills such as fees and all --}}
        <div class="mt-2">
            <h2>Quick Actions</h2>

            {{-- bootstrap card --}}
            <div class="py-5 ">
                <div class="container">
                    <div class="row  g-3">
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('electricity.png') }}" alt="electricity"
                                    class="bd-placeholder-img card-img-top" width="100%" height="150"
                                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                <div class="card-body">
                                    <p class="card-text">Electricity</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View
                                                Bill</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Pay
                                                Bill</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('water.png') }}" alt="water" class="bd-placeholder-img card-img-top"
                                    width="100%" height="150" xmlns="http://www.w3.org/2000/svg" role="img"
                                    aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                    focusable="false">
                                <div class="card-body">
                                    <p class="card-text">Water</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View
                                                Bill</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Pay
                                                Bill</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('books.png') }}" alt="internet" class="bd-placeholder-img card-img-top"
                                    width="100%" height="150" xmlns="http://www.w3.org/2000/svg" role="img"
                                    aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                    focusable="false">
                                <div class="card-body">
                                    <p>Tuition Fees</p>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View
                                            Bill</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Pay
                                            Bill</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

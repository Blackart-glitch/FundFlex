@extends('layouts.sidebar')
@section('sidebar.content')
    <style>
        .transaction-card {
            transition: all 0.3s;
        }

        .transaction-card:hover {
            transform: scale(1.05);
            /* Increase the size */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            /* Apply a larger box shadow */
        }
    </style>
    <div>

        @if (isset($_GET['verified']) && $_GET['verified'] == 1)
            <div class="alert alert-success alert-dismissible fade show" tabindex="-1" role="alert">
                <strong>Success!</strong> Your account has been verified.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (isset($_GET['logged_in']) && $_GET['logged_in'] == 1)
            <div class="alert alert-success alert-dismissible fade show" tabindex="-1" role="alert">
                <strong>success</strong> welcome back {{ $user->Firstname }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (isset($_GET['two_factor']) && $_GET['two_factor'] == 1)
            <div class="alert alert-warning alert-dismissible fade show" tabindex="-1" role="alert">
                <strong>Warning</strong> To avoid risk{{ $user->Firstname }}, setup two step verification by clicking here
                <a href="{{ route('two-factor') }}">here</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row justify-content-evenly">
            <div class="col-lg-5 bg-white p-2 rounded shadow-lg">
                <div class="card">
                    <div class="card-body" style="background-color: rgb(255, 215, 139)">
                        <h4 class="card-title">YOUR WALLET</h4>
                        <hr>
                        <div class="card-logo">
                            <!-- Replace this with MasterCard logo -->
                            <img src="{{ asset('icons/wallet.gif') }}" alt="FundFlex Logo">
                        </div>
                        @if ($wallet)
                            <div class="card-number">
                                <!-- Replace this with the card number -->
                                <p> {{ $wallet->account_number }} </p>
                            </div>
                            <div class="card-holder">
                                <!-- Replace this with the cardholder's name -->
                                <p> {{ $user->Firstname . ' ' . $user->Lastname }} </p>
                            </div>
                            <div class="card-expiry ">
                                <span class="text-danger fw-bold">Change since : </span>
                                <span class="text-success fw-bold">{{ $wallet->updated_at }}</span>
                            </div>
                        @else
                            <p>You don't have a wallet yet...</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 bg-white p-2 rounded shadow-lg">
                <h3>Spendings this month</h3>
                <div class="mt-3">
                    <p class="text-warning fw-bold">You don't have any purchases yet</p>
                </div>
            </div>
        </div>

        <div class="container mt-3 p-2" tabindex="-1" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h2 class="h3 text-center">Transaction History</h2>
            <div class="row align-items-center bg-light shadow-sm border border-0 p-3 mt-2 overflow-auto">
                <div class="col-lg-3 col-md-3">
                    <strong class="font-weight-bold">Description</strong>
                </div>
                <div class="col-lg-2 col-md-1">
                    <strong class="font-weight-bold">Type</strong>
                </div>
                <div class="col-lg-4 col-md-4">
                    <strong class="font-weight-bold">Amount</strong>
                </div>
                <div class="col-lg-2 col-md-2">
                    <strong class="font-weight-bold">Status</strong>
                </div>
                <div class="col-lg-1 col-md-1">
                    <strong class="font-weight-bold">Action</strong>
                </div>
            </div>
            <!-- First transaction card -->
            @if ($transactions->isEmpty() !== true)
                @foreach ($transactions as $transaction)
                    <div
                        class="row transaction-card bg-white align-items-center rounded-2 shadow-sm border border-0 p-3 mt-2">
                        <div class="col-lg-3 col-md-6">
                            <p class="mb-0">
                                {{ implode(' ', array_slice(str_word_count($transaction->description, 1), 0, 4)) . ' ...' }}
                            </p>
                            <p class="mb-0"><time datetime="2023-10-01"> {{ $transaction->updated_at }} </time></p>
                        </div>
                        <div class="col-lg-2 col-md-6 text-danger">
                            <p class="mb-0">{{ $transaction->transaction_type }}</p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p class="mb-0">{{ 'NGN ' . $transaction->amount }} </p>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <span class="text-success material-symbols-outlined">
                                @if ($transaction->status == 'success')
                                    check_circle
                                @elseif ($transaction->status == 'pending')
                                    pending
                                @else
                                    error
                                @endif
                            </span>
                        </div>
                        <div class="col-lg-1 col-md-6">
                            <span class="material-symbols-outlined btn btn-outline-info" style="border: none">
                                info
                            </span>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="transaction-card bg-white align-items-center rounded-2 shadow-sm border border-0 p-3 mt-2">
                    <p class="text-dark"> You have no transactions yet. Go ahead and settle a bill</p>
                </div>
            @endif
            <div class="transaction-card bg-white align-items-center rounded-2 shadow-sm border border-0 p-3 mt-2">
                <a href="{{ route('transaction-history') }}" class="d-flex justify-content-center">View all
                    transactions</a>
            </div>
        </div>

    </div>
@endsection

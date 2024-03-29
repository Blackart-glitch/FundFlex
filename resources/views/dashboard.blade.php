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
                <a href="{{ route('settings') }}">here</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" tabindex="-1" role="alert">
                <strong>Failed!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('success'))
            <div class="alert alert-success alert-dismissible fade show" tabindex="-1" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" tabindex="-1" role="alert">
                <strong>Warning!</strong> {{ session('warning') }}
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
                <div class="mt-3 card">
                    <div class="card-body">
                        @if (!$spendings)
                            <p class="text-warning fw-bold">You don't have any purchases yet</p>
                        @else
                            <canvas id="myChart" aria-label="Spendings for the month" role="img">
                                <p class="text-warning fw-bold">Couldn't process your stats</p>
                            </canvas>
                        @endif
                    </div>
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
                        @if ($transaction->sender_id == $user->id)
                            <div class="col-lg-2 col-md-6 fw-bolder text-danger">
                                <p class="mb-0">Debit</p>
                            </div>
                        @elseif ($transaction->receiver_id == $user->id)
                            <div class="col-lg-2 col-md-6 fw-bolder text-success">
                                <p class="mb-0">Credit</p>
                            </div>
                        @else
                            <div class="col-lg-2 col-md-6 fw-bolder text-warning">
                                <p class="mb-0">Unknown</p>
                            </div>
                        @endif
                        <div class="col-lg-4 col-md-6">
                            <p class="mb-0">{{ $transaction->currency . ' ' . $transaction->amount }} </p>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            @if ($transaction->status == 'success')
                                <span class="text-success material-symbols-outlined">
                                    check_circle
                                </span>
                            @elseif ($transaction->status == 'pending')
                                <span class="text-warning material-symbols-outlined">
                                    pending
                                </span>
                            @else
                                <span class="text-danger material-symbols-outlined">
                                    error
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-1 col-md-6">
                            <button class="btn btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#transactionModal{{ $transaction->id }}" style="border:none;">
                                <span class="material-symbols-outlined">
                                    info
                                </span>
                            </button>
                        </div>
                    </div>
                    <x-receipt :transaction="$transaction" />
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const spendings = JSON.parse('{{ $spendings }}');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Week1', 'Week2', 'Week3', 'Week4'],
                datasets: [{
                    label: 'Spendings this ' + new Date().toLocaleString('default', {
                        month: 'long'
                    }) + ' (in NGN)',
                    data: spendings,
                    fill: false,
                    borderColor: 'orange',
                    tension: 0.5
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

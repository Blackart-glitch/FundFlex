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
        <div class="row justify-content-evenly">
            <div class="col-lg-5 bg-white p-2 rounded shadow-lg">
                <div class="card">
                    <div class="card-body" style="background-color: rgb(255, 215, 139)">
                        <h4 class="card-title">FUNDFLEX</h4>
                        <hr>
                        <div class="card-logo">
                            <!-- Replace this with MasterCard logo -->
                            <img src="{{ asset('icons/wallet.gif') }}" alt="FundFlex Logo">
                        </div>
                        <div class="card-number">
                            <!-- Replace this with the card number -->
                            <p>0927 5767 833G HY</p>
                        </div>
                        <div class="card-holder">
                            <!-- Replace this with the cardholder's name -->
                            <p>Jacob Daniel</p>
                        </div>
                        <div class="card-expiry ">
                            <p class="text-danger">Valid Thru: 12/25</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 bg-white p-2 rounded shadow-lg">
                <h3>Spendings this month</h3>
            </div>
        </div>

        <div class="container mt-3 p-2" tabindex="-1" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h2 class="h3 text-center">Transaction History</h2>
            <div class="row align-items-center bg-light shadow-sm border border-0 p-3 mt-2">
                <div class="col-md-3 col-6">
                    <strong class="font-weight-bold">Description</strong>
                </div>
                <div class="col-md-2 col-6">
                    <strong class="font-weight-bold">Type</strong>
                </div>
                <div class="col-md-4 col-6">
                    <strong class="font-weight-bold">Amount</strong>
                </div>
                <div class="col-md-2 col-6">
                    <strong class="font-weight-bold">Status</strong>
                </div>
                <div class="col-md-1 col-6">
                    <strong class="font-weight-bold">Action</strong>
                </div>
            </div>
            <!-- First transaction card -->
            <div class="row transaction-card bg-white align-items-center rounded-2 shadow-sm border border-0 p-3 mt-2">
                <div class="col-md-3 col-6">
                    <p class="mb-0">First Semester 200L</p>
                    <p class="mb-0"><time datetime="2023-10-01">October 1, 2023</time></p>
                </div>
                <div class="col-md-2 col-6 text-danger">
                    <p class="mb-0">Debit</p>
                </div>
                <div class="col-md-4 col-6">
                    <p class="mb-0">₦ 50,000</p>
                </div>
                <div class="col-md-2 col-6">
                    <span class="text-success material-symbols-outlined">
                        check_circle
                    </span>
                </div>
                <div class="col-md-1 col-6">
                    <span class="material-symbols-outlined btn btn-outline-info" style="border: none">
                        info
                    </span>
                </div>
            </div>

            <!-- Second transaction card -->
            <div class="row transaction-card bg-white align-items-center rounded-2 shadow-sm border border-0 p-3 mt-2">
                <div class="col-md-3 col-6">
                    <p class="mb-0">Second Semester 300L</p>
                    <p class="mb-0"><time datetime="2023-11-15">November 15, 2023</time></p>
                </div>
                <div class="col-md-2 col-6 text-success">
                    <p class="mb-0">Credit</p>
                </div>
                <div class="col-md-4 col-6">
                    <p class="mb-0">₦ 75,000</p>
                </div>
                <div class="col-md-2 col-6">
                    <span class="text-danger material-symbols-outlined">
                        error
                    </span>
                </div>
                <div class="col-md-1 col-6">
                    <span class="material-symbols-outlined btn btn-outline-info" style="border: none">
                        info
                    </span>
                </div>
            </div>

            <!-- Third transaction card -->
            <div class="row transaction-card bg-white align-items-center rounded-2 shadow-sm border border-0 p-3 mt-2">
                <div class="col-md-3 col-6">
                    <p class="mb-0">Summer Internship</p>
                    <p class="mb-0"><time datetime="2023-12-20">December 20, 2023</time></p>
                </div>
                <div class="col-md-2 col-6 text-success">
                    <p class="mb-0">Credit</p>
                </div>
                <div class="col-md-4 col-6">
                    <p class="mb-0">₦ 30,000</p>
                </div>
                <div class="col-md-2 col-6">
                    <span class="text-success material-symbols-outlined">
                        check_circle
                    </span>
                </div>
                <div class="col-md-1 col-6">
                    <span class="material-symbols-outlined btn btn-outline-info" style="border: none">
                        info
                    </span>
                </div>
            </div>

            {{-- Fourth transaction card --}}
            <div class="row transaction-card bg-white align-items-center rounded-2 shadow-sm border border-0 p-3 mt-2">
                <div class="col-md-3 col-6">
                    <p class="mb-0">Summer Internship</p>
                    <p class="mb-0"><time datetime="2023-12-20">December 20, 2023</time></p>
                </div>
                <div class="col-md-2 col-6 text-success">
                    <p class="mb-0">Credit</p>
                </div>
                <div class="col-md-4 col-6">
                    <p class="mb-0">₦ 30,000</p>
                </div>
                <div class="col-md-2 col-6">
                    <span class="text-warning material-symbols-outlined">
                        pending
                    </span>
                </div>
                <div class="col-md-1 col-6">
                    <span class="material-symbols-outlined btn btn-outline-info" style="border: none">
                        info
                    </span>
                </div>
            </div>

        </div>

    </div>
@endsection

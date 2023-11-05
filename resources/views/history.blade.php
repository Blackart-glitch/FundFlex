@extends('layouts.sidebar');
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
        <div class="container mt-3 p-2" tabindex="-1" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h2 class="h3 text-center">Transaction History</h2>

            {{-- section for sortby, search input, and other filters --}}
            <div class="bg-warning p-2">
                <div class="container mt-2">
                    <div class="row justify-content-between">
                        <div class="col-lg-3">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle rounded-4" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" data-bs-target="#dropdownsortlist"
                                    aria-expanded="false">
                                    <span class="material-symbols-outlined">
                                        sort
                                    </span>
                                </button>
                                <ul id="dropdownsortlist" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            Date
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Amount</a></li>
                                    <li><a class="dropdown-item" href="#">Type</a></li>
                                    <li><a class="dropdown-item" href="#">Status</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <form class="d-flex rounded-4 align-items-center">
                                <input class="form-control me-2 p-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <span class="material-symbols-outlined">
                                    search
                                </span>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <div class="dropdown open">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterbtn"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="material-symbols-outlined">
                                        date_range
                                    </span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="filterbtn">
                                    <a class="dropdown-item" href="#">This month</a>
                                    <a class="dropdown-item" href="#"> This year</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 align-items-center">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownExport"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="material-symbols-outlined">
                                        export_notes
                                    </span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownExport">
                                    <li>
                                        <a class="dropdown-item" href="#">CSV</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">PDF</a></li>
                                    <!-- Add more export options as needed -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Table for the transactions history --}}
            <div class="table-responsive-lg">
                <table class="table table-secondary table-hover table-striped">
                    <thead>
                        <tr class="">
                            <th scope="col">#</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Transactions as $transaction)
                            <tr class="transaction-card">
                                <td>{{ $loop->index + 1 }}</td>
                                <td scope="row">{{ $transaction->id }}</td>
                                <td>{{ $transaction->updated_at }} </td>
                                <td>{{ $transaction->description }}</td>
                                <td>{{ $transaction->transaction_type }} </td>
                                <td>{{ $transaction->amount }}</td>
                                <td>
                                    <strong>
                                        @switch($transaction->status)
                                            @case('complete')
                                                <span class="text-success material-symbols-outlined">
                                                    check_circle
                                                </span>
                                            @break

                                            @case('pending')
                                                <span class="text-warning material-symbols-outlined">
                                                    pending
                                                </span>
                                            @break

                                            @case('failed')
                                                <span class="text-danger material-symbols-outlined">
                                                    error
                                                </span>
                                            @break

                                            @default
                                                <span class="text-danger material-symbols-outlined">
                                                    indeterminate_question_box
                                                </span>
                                        @endswitch

                                    </strong>
                                </td>
                                <td class="gap-2">
                                    <button type="button" class="btn btn-outline-secondary rounded-4"
                                        data-bs-toggle="modal" data-bs-target="#transactionModal"
                                        data-transaction-id="{{ $transaction->id }}">
                                        <span class="material-symbols-outlined">
                                            visibility
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger rounded-4" data-bs-toggle="modal"
                                        data-bs-target="#flagTransactionModal" data-transaction-id="{{ $transaction->id }}">
                                        <span class="material-symbols-outlined">
                                            flag
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- pagination --}}
                {{--
                <div class="d-flex justify-content-center">
                    {{ $transactions->links() }}
                </div> --}}
            </div>
        </div>
        <x-receipt />
        <x-flagging />
    </div>
@endsection

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
                            <th scope="col">Date</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="transaction-card">
                            <th scope="row">1</th>
                            <td>2021-09-01</td>
                            <td>Payment from client</td>
                            <td>Income</td>
                            <td>$ 1000</td>
                            <td><strong>
                                    <span class="text-success material-symbols-outlined">
                                        check_circle
                                    </span>
                                </strong></td>
                            <td class="gap-2">
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                                <button type="button" class="btn btn-outline-danger rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#flagTransactionModal">
                                    <span class="material-symbols-outlined">
                                        flag
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr class="transaction-card">
                            <th scope="row">2</th>
                            <td>2021-09-01</td>
                            <td>Payment from client</td>
                            <td>Income</td>
                            <td>$ 1000</td>
                            <td>
                                <strong>
                                    <span class="text-success material-symbols-outlined">
                                        pending
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>

                        <tr class="transaction-card">
                            <th scope="row">3</th>
                            <td>2021-09-02</td>
                            <td>Online purchase</td>
                            <td>Expense</td>
                            <td>$ 500</td>
                            <td>
                                <strong>
                                    <span class="text-warning material-symbols-outlined">
                                        pending
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>

                        <tr class="transaction-card">
                            <th scope="row">4</th>
                            <td>2021-09-03</td>
                            <td>Service charge</td>
                            <td>Expense</td>
                            <td>$ 200</td>
                            <td>
                                <strong>
                                    <span class="text-danger material-symbols-outlined">
                                        error
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr class="transaction-card">
                            <th scope="row">5</th>
                            <td>2021-09-01</td>
                            <td>Payment from client</td>
                            <td>Income</td>
                            <td>$ 1000</td>
                            <td><strong>
                                    <span class="text-success material-symbols-outlined">
                                        check_circle
                                    </span>
                                </strong></td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr class="transaction-card">
                            <th scope="row">6</th>
                            <td>2021-09-01</td>
                            <td>Payment from client</td>
                            <td>Income</td>
                            <td>$ 1000</td>
                            <td>
                                <strong>
                                    <span class="text-success material-symbols-outlined">
                                        pending
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>

                        <tr class="transaction-card">
                            <th scope="row">7</th>
                            <td>2021-09-02</td>
                            <td>Online purchase</td>
                            <td>Expense</td>
                            <td>$ 500</td>
                            <td>
                                <strong>
                                    <span class="text-warning material-symbols-outlined">
                                        pending
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>

                        <tr class="transaction-card">
                            <th scope="row">8</th>
                            <td>2021-09-03</td>
                            <td>Service charge</td>
                            <td>Expense</td>
                            <td>$ 200</td>
                            <td>
                                <strong>
                                    <span class="text-danger material-symbols-outlined">
                                        error
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr class="transaction-card">
                            <th scope="row">9</th>
                            <td>2021-09-01</td>
                            <td>Payment from client</td>
                            <td>Income</td>
                            <td>$ 1000</td>
                            <td><strong>
                                    <span class="text-success material-symbols-outlined">
                                        check_circle
                                    </span>
                                </strong></td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr class="transaction-card">
                            <th scope="row">10</th>
                            <td>2021-09-01</td>
                            <td>Payment from client</td>
                            <td>Income</td>
                            <td>$ 1000</td>
                            <td>
                                <strong>
                                    <span class="text-success material-symbols-outlined">
                                        pending
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>

                        <tr class="transaction-card">
                            <th scope="row">11</th>
                            <td>2021-09-02</td>
                            <td>Online purchase</td>
                            <td>Expense</td>
                            <td>$ 500</td>
                            <td>
                                <strong>
                                    <span class="text-warning material-symbols-outlined">
                                        pending
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>

                        <tr class="transaction-card">
                            <th scope="row">12</th>
                            <td>2021-09-03</td>
                            <td>Service charge</td>
                            <td>Expense</td>
                            <td>$ 200</td>
                            <td>
                                <strong>
                                    <span class="text-danger material-symbols-outlined">
                                        error
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary rounded-4">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr class="transaction-card">
                            <th scope="row">13</th>
                            <td>2021-09-01</td>
                            <td>Payment from client</td>
                            <td>Income</td>
                            <td>$ 1000</td>
                            <td><strong>
                                    <span class="text-success material-symbols-outlined">
                                        check_circle
                                    </span>
                                </strong></td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr class="transaction-card">
                            <th scope="row">14</th>
                            <td>2021-09-01</td>
                            <td>Payment from client</td>
                            <td>Income</td>
                            <td>$ 1000</td>
                            <td>
                                <strong>
                                    <span class="text-success material-symbols-outlined">
                                        pending
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>

                        <tr class="transaction-card">
                            <th scope="row">15</th>
                            <td>2021-09-02</td>
                            <td>Online purchase</td>
                            <td>Expense</td>
                            <td>$ 500</td>
                            <td>
                                <strong>
                                    <span class="text-warning material-symbols-outlined">
                                        pending
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>

                        <tr class="transaction-card">
                            <th scope="row">16</th>
                            <td>2021-09-03</td>
                            <td>Service charge</td>
                            <td>Expense</td>
                            <td>$ 200</td>
                            <td>
                                <strong>
                                    <span class="text-danger material-symbols-outlined">
                                        error
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr class="transaction-card">
                            <th scope="row">17</th>
                            <td>2021-09-01</td>
                            <td>Payment from client</td>
                            <td>Income</td>
                            <td>$ 1000</td>
                            <td><strong>
                                    <span class="text-success material-symbols-outlined">
                                        check_circle
                                    </span>
                                </strong></td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr class="transaction-card">
                            <th scope="row">18</th>
                            <td>2021-09-01</td>
                            <td>Payment from client</td>
                            <td>Income</td>
                            <td>$ 1000</td>
                            <td>
                                <strong>
                                    <span class="text-success material-symbols-outlined">
                                        pending
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>

                        <tr class="transaction-card">
                            <th scope="row">19</th>
                            <td>2021-09-02</td>
                            <td>Online purchase</td>
                            <td>Expense</td>
                            <td>$ 500</td>
                            <td>
                                <strong>
                                    <span class="text-warning material-symbols-outlined">
                                        pending
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>

                        <tr class="transaction-card">
                            <th scope="row">20</th>
                            <td>2021-09-03</td>
                            <td>Service charge</td>
                            <td>Expense</td>
                            <td>$ 200</td>
                            <td>
                                <strong>
                                    <span class="text-danger material-symbols-outlined">
                                        error
                                    </span>
                                </strong>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal" data-transaction-id="113121121212">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <x-receipt />
        <x-flagging />
    </div>
@endsection

@extends('layouts.sidebar')
@section('sidebar.content')
    <script src="{{ asset('jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.2/dist/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <div>

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


        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-lg-5 bg-white p-2 rounded shadow-lg">
                    <span class="d-flex justify-content-between">
                        <h2>Available Balance</h2>
                        <a href="{{ route('transaction-history') }}" target="_blank" rel="noopener noreferrer"
                            class="btn btn-outline-warning d-flex align-items-center">
                            <span class="material-symbols-outlined">
                                history
                            </span>
                            <span class="material-symbols-outlined">
                                keyboard_arrow_down
                            </span>
                        </a>
                    </span>
                    @if ($wallet)
                        <h3>{{ $wallet->currency == null ? '0' : $wallet->currency . ' ' . number_format($wallet->balance, 2, '.', ' ') }}
                        </h3>
                    @else
                        <h3>0.00</h3>
                    @endif
                </div>
                <div class="col-lg-6 bg-white p-2 rounded shadow-lg">
                    <h3>Your wallet ID: </h3>

                    <div class="gap-2">
                        @if ($wallet)
                            <span>{{ $wallet->account_number }} </span>
                        @else
                            <p class="text-danger fw-bolder"> Unknown</p>
                        @endif
                    </div>
                    <div>
                        {{ $user->Username }}
                    </div>
                    <div class="d-flex gap-2 align-items-center justify-content-end">
                        <button type="button" class="btn btn-outline-primary">
                            <span class="material-symbols-outlined">
                                download_for_offline
                            </span>
                        </button>
                        <button type="button" class="btn btn-outline-warning">
                            <span class="material-symbols-outlined">
                                content_copy
                            </span>
                        </button>
                        @if (!$wallet)
                            <form action="{{ route('wallet.generate') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-success">Generate
                                    <span class="material-symbols-outlined">
                                        frame_reload
                                    </span>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            {{-- action buttons for the wallet --}}
            <div class="mt-2">
                {{-- deposit button --}}
                <span>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#depositModal">deposit</button>
                    @if ($wallet && $user)
                        <x-add-funds :currencies="$currencies">
                            <x-slot name="email">{{ $user->email }}</x-slot>
                            <x-slot name="fullname">{{ $user->Firstname . $user->Lastname }}</x-slot>
                            <x-slot name="walletnumber">{{ $wallet->account_number }}</x-slot>
                        </x-add-funds>
                    @else
                        <div class="modal fade" id="depositModal" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="depositTitleModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">Sorry!!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You can't perform this function at this time because you have not created a wallet
                                        yet.
                                        Please create a wallet first.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </span>
                {{-- Transfer button --}}
                <span>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#TransferModal">Transfer</button>
                    <x-transfer>
                        <x-slot name="email">{{ $user->email }}</x-slot>
                    </x-transfer>
                </span>
                {{-- Withdraw button --}}
                <span>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#WithdrawModal">Withdraw</button>
                    <x-withdraw>
                        <x-slot name="email">{{ $user->email }}</x-slot>
                    </x-withdraw>
                </span>
            </div>
        </div>

        {{-- quick action section for bills such as fees and all --}}
        <div class="mt-2">
            <h2>Quick Actions</h2>

            {{-- bootstrap card --}}
            <div class="py-5 ">
                <div class="container">
                    <div class="row  g-3">
                        @if ($bills->count() > 0)
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($bills as $bill)
                                @php
                                    $i++;
                                    if ($i > 3) {
                                        break;
                                    }
                                @endphp
                                <div class="col billCard">
                                    <x-bill-card>
                                        <x-slot name="id">{{ $bill->id }}</x-slot>
                                        <x-slot name="image">{{ $bill->attachment }}</x-slot>
                                        <x-slot name="title">{{ $bill->title }}</x-slot>
                                        <x-slot name="due_date">{{ $bill->due_date }}</x-slot>
                                        <x-slot name="description">{{ $bill->description }}</x-slot>
                                        <x-slot name="status">{{ $bill->status }}</x-slot>
                                        <x-slot name="amount">{{ $bill->amount }}</x-slot>
                                        <x-slot name="payment_method">{{ $bill->payment_method }}</x-slot>
                                        <x-slot name="reference">{{ $bill->reference }}</x-slot>
                                        <x-slot name="late_fee">{{ $bill->late_fee }}</x-slot>
                                        <x-slot name="tax">{{ $bill->tax }}</x-slot>
                                        <x-slot name="discounts">{{ $bill->discounts }}</x-slot>
                                        <x-slot name="category">{{ $bill->category }}</x-slot>
                                        <x-slot name="type">{{ $bill->type }}</x-slot>
                                        <x-slot name="billing_period">{{ $bill->billing_period }}</x-slot>
                                        <x-slot name="updated_at">{{ $bill->updated_at }}</x-slot>
                                        <x-slot name="linked">{{ true }}</x-slot>
                                    </x-bill-card>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12 d-flex justify-content-center align-items-center">
                                {{-- image of an empty icon --}}
                                <img src="{{ asset('empty-box.png') }}" alt="empty" class=" text-center"
                                    height="70" width="70">

                                <p class="fw-light text-secondary">
                                    Sorry, there are no services personalized for you. Please head over to the bills and
                                    services page
                                    <a href="{{ route('services') }}">here</a>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.routes = {
                saveBill: "{{ route('bill.save') }}",
                removeBill: "{{ route('bill.remove') }}",
                csrfToken: "{{ csrf_token() }}"
            };
        </script>
        <script src="{{ asset('custom-scripts/billhandler.js') }}"></script>
    </div>
@endsection

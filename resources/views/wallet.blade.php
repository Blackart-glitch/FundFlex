@extends('layouts.sidebar')
@section('sidebar.content')
    <script src="{{ asset('jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.2/dist/js/bootstrap.js') }}"></script>
    <div>
        <div class="row justify-content-evenly">
            <div class="col-lg-5 bg-white p-2 rounded shadow-lg">
                <h2>Available Balance</h2>
                <h3>{{ $wallet->currency . ' ' . number_format($wallet->balance, 2, '.', ' ') }}</h3>
            </div>
            <div class="col-lg-6 bg-white p-2 rounded shadow-lg">
                <h3>Your wallet ID: </h3>

                <div class="gap-2">
                    <span>{{ $wallet->account_number }} </span>
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
                    <button type="button" class="btn btn-outline-success">Generate
                        <span class="material-symbols-outlined">
                            frame_reload
                        </span>
                    </button>
                </div>
            </div>
        </div>

        {{-- action buttons for the wallet --}}
        <div class="mt-2">
            <span>
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#depositModal">deposit</button>
                <x-add-funds :currencies="$currencies">
                    <x-slot name="email">{{ $user->email }}</x-slot>
                    <x-slot name="fullname">{{ $user->Firstname . $user->Lastname }}</x-slot>
                    <x-slot name="walletnumber">{{ $wallet->account_number }}</x-slot>
                </x-add-funds>
            </span>
            <span>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#TransferModal">Transfer</button>
                <x-transfer>
                    <x-slot name="email">{{ $user->email }}</x-slot>
                </x-transfer>
            </span>
            <span>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#WithdrawModal">Withdraw</button>
                <x-withdraw>
                    <x-slot name="email">{{ $user->email }}</x-slot>
                </x-withdraw>
            </span>
            <a href="{{ route('transaction-history') }}" target="_blank" rel="noopener noreferrer"
                class="btn btn-warning">Payments</a>
            <button type="button" class="btn btn-info">Add a card</button>
        </div>

        {{-- quick action section for bills such as fees and all --}}
        <div class="mt-2">
            <h2>Quick Actions</h2>

            {{-- bootstrap card --}}
            <div class="py-5 ">
                <div class="container">
                    <div class="row  g-3">
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
                            <div class="col">
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
                                </x-bill-card>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

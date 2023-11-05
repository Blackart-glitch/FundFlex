@extends('layouts.sidebar')
@section('sidebar.content')
    <div class="p-3 bg-white shadow-sm mb-3">
        <h3>Upcoming bills for user</h3>
        <div class="row d-flex justify-content-center align-items-center">

            @php

                $i = 0;
            @endphp
            @foreach ($bills['user'] as $bill)
                @php
                    $image = 'electric.png';
                    $i++;
                    if ($i > 3) {
                        break;
                    }
                @endphp
                <div class="col">
                    <x-bill-card>
                        <x-slot name="id">{{ $bill->id }}</x-slot>
                        <x-slot name="image">{{ $image }} </x-slot>
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
        {{-- view all --}}
        <div class="container p-2 mt-1">
            <button class="btn btn-warning d-flex p-2 justify-content-center align-items-center">
                View all
            </button>
        </div>
    </div>
    <div class="p-3 bg-white shadow-sm">
        <h3>Widely used</h3>

        <div class="row d-flex justify-content-center align-items-center">
            @foreach ($bills as $bill)
                <div class="col-lg-4">
                    <x-bill-card :name="$bill" />

                </div>
            @endforeach
        </div>
    </div>

    <div class="container p-2 mt-1">
        <button class="btn btn-warning d-flex p-2 justify-content-center align-items-center">
            View all
        </button>
    </div>
@endsection

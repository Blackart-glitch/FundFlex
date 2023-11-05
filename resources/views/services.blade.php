@extends('layouts.sidebar')
@section('sidebar.content')
    <div class="p-3 bg-white shadow-sm mb-3">
        <h3>Relevant to you</h3>
        <div class="row d-flex justify-content-center align-items-center">
            @foreach ($bills['user'] as $bill)
                <div class="col-lg-4 col-md-6 col-md-12 mb-2">
                    <x-bill-card>
                        <x-slot name="id">{{ $bill->id }}</x-slot>
                        <x-slot name="image">{{ $bill->attachment }} </x-slot>
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
    <div class="p-3 bg-white shadow-sm">
        <h3>All Services</h3>
        <div class="row d-flex justify-content-center align-items-center">
            @foreach ($bills['user'] as $bill)
                <div class="col-lg-4 col-md-6 col-md-12 mb-2">
                    <x-bill-card>
                        <x-slot name="id">{{ $bill->id }}</x-slot>
                        <x-slot name="image">{{ $bill->attachment }} </x-slot>
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
@endsection

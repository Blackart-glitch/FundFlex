@extends('layouts.sidebar')
@section('sidebar.content')
    <div class="p-3 bg-white shadow-sm mb-3">
        <h3>Upcoming bills</h3>

        <div class="row d-flex justify-content-center align-items-center">
            @php
                $bills = ['Electricity', 'tuition', 'Internet', 'Water', 'Gas', 'Phone'];
            @endphp
            @for ($i = 0; $i < 3; $i++)
                <div class="col-lg-4">
                    <x-bill-card :name="$bills[$i]" />
                </div>
            @endfor


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

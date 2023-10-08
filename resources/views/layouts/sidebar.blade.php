@extends('layouts.app')
@section('content')
    <style>
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
        }
    </style>
    <div class="row">
        <div class="col-lg-3 p-4 col-sm-12 shadow-lg">
            <div class="bg-dark p-3 btn btn-collapse text-white text-center rounded" data-bs-toggle="collapse"
                data-bs-target="#sidebar">
                <h2>Fundflex</h2>
                <small>By the Lagos State University</small>
            </div>

            <div class="collapse show" id="sidebar">
                {{-- overview button --}}
                <div>
                    <a href="{{ route('dashboard') }}"
                        class="sidebar-nav btn btn-outline-dark btn-lg btn-block mt-4">Overview</a>
                </div>

                {{-- My wallet --}}
                <div>
                    <a href="{{ route('wallet') }}" class="sidebar-nav btn btn-outline-dark btn-lg btn-block mt-4">My
                        Wallet</a>
                </div>

                {{-- Bills and fees --}}
                <div>
                    <a href="#" class="sidebar-nav btn btn-outline-dark btn-lg btn-block mt-4">Bills and
                        Fees</a>
                </div>

                {{-- Support --}}
                <div>
                    <a href="#" class="sidebar-nav btn btn-outline-dark btn-lg btn-block mt-4">Support</a>
                </div>

                {{-- Account and settings at the very bottom --}}
                <div class="mt-5">
                    <a href="{{ route('settings') }}"
                        class="sidebar-nav btn btn-outline-dark btn-lg btn-block mt-4">Account</a>
                </div>
            </div>
        </div>
        <div class="col-lg-9 p-4 col-sm-12" style="background-color: rg(255, 255, 255);">
            @yield('sidebar.content')
        </div>
    </div>
@endsection

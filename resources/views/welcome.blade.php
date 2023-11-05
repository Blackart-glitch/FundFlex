@extends('layouts.guest')

@section('content')
    <main>
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <!-- Replace with an image related to FundFlex -->
                    <img src="{{ asset('fundimg.jpg') }}" class="d-block mx-lg-auto img-fluid" alt="FundFlex" width="700"
                        height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Welcome to FundFlex</h1>
                    <p class="lead">Your University E-Wallet for seamless online transactions and financial management.
                    </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="/signup" class="btn btn-primary btn-lg px-4 me-md-2">Get Started</a>
                        <a href="/learn-more" class="btn btn-outline-secondary btn-lg px-4">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-warning text-dark">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 fw-normal">Discover the Future of University Finances</h1>
                <p class="lead fw-normal">Simplify your university financial experience with FundFlex. Join us and
                    experience the future of online transactions.</p>
                <a href="{{ route('register') }}" class="btn btn-outline-secondary">Sign Up Now</a>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </main>
@endsection

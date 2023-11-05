<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('dashboard') }}" class="nav-link px-2 text-secondary">Dashboard</a></li>
                    <li><a href="{{ route('transaction-history') }}" class="nav-link px-2 text-white"
                            style=":hover:text">Transactions</a></li>
                    <li><a href="{{ route('wallet') }}" class="nav-link px-2 text-white">Add Funds</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Withdraw</a></li>
                    <li><a href="{{ route('settings') }}" class="nav-link px-2 text-white">Settings</a></li>
                    <li><a href="{{ route('promotions') }}" class="nav-link px-2 text-white">Promotions</a></li>
                </ul>



                <div class=" d-flex text-end gap-3 align-items-center">
                    <div>
                        <img src="https://avatars.githubusercontent.com/u/64565324?v=4" alt="user_image" height="40"
                            width="40" class="rounded-4">
                    </div>
                    <span class=" btn btn-outline-warning material-symbols-outlined" data-bs-toggle="modal"
                        data-bs-target="#notificationModal">
                        notifications
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" class="btn btn-warning" value="Logout">
                    </form>
                </div>
            </div>
        </div>
    </header>

    <x-notification />

    @yield('content')

    <script src="{{ asset('jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.2-dist/js/bootstrap.js') }}"></script>
</body>
<footer class="text-bg-dark ">
    <div class="container">
        <footer class="py-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Your Account</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Dashboard</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Transactions</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Send Money</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Receive Money</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Account Settings</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Support</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Help Center</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Contact Us</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Legal</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Terms of Service</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Privacy Policy</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3 text-white">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Stay updated with the latest news and promotions.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>&copy; 2023 FundFlex, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24"
                                height="24">
                                <use xlink:href="#twitter"></use>
                            </svg></a>
                    </li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24"
                                height="24">
                                <use xlink:href="#instagram"></use>
                            </svg></a>
                    </li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24"
                                height="24">
                                <use xlink:href="#facebook"></use>
                            </svg></a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</footer>


</html>

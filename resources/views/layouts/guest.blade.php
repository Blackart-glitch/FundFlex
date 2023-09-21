<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap 5 css stylesheet --}}
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.css') }}">
    <script src="{{ asset('bootstrap-5.3.2-dist/js/bootstrap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
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
                    <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
                        aria-label="Search">
                </form>

                <div class="text-end">
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-warning">Sign-up</a>
                </div>
            </div>
        </div>
    </header>


    @yield('content')



    {{-- bootstrap 5 script --}}


</body>
<footer>
    <div class="container">
        <footer class="py-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Your Account</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/dashboard" class="nav-link p-0 text-muted">Dashboard</a>
                        </li>
                        <li class="nav-item mb-2"><a href="/transactions"
                                class="nav-link p-0 text-muted">Transactions</a></li>
                        <li class="nav-item mb-2"><a href="/send-money" class="nav-link p-0 text-muted">Send Money</a>
                        </li>
                        <li class="nav-item mb-2"><a href="/receive-money" class="nav-link p-0 text-muted">Receive
                                Money</a></li>
                        <li class="nav-item mb-2"><a href="/account-settings" class="nav-link p-0 text-muted">Account
                                Settings</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Support</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/help-center" class="nav-link p-0 text-muted">Help Center</a>
                        </li>
                        <li class="nav-item mb-2"><a href="/contact-us" class="nav-link p-0 text-muted">Contact Us</a>
                        </li>
                        <li class="nav-item mb-2"><a href="/faqs" class="nav-link p-0 text-muted">FAQs</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Legal</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/terms-of-service" class="nav-link p-0 text-muted">Terms of
                                Service</a></li>
                        <li class="nav-item mb-2"><a href="/privacy-policy" class="nav-link p-0 text-muted">Privacy
                                Policy</a></li>
                    </ul>
                </div>

                <!-- Guest Section Container -->
                <div class="col-6 col-md-6 mb-3">
                    <h5>Guest Section</h5>
                    <p>Explore FundFlex and its benefits even before you sign up.</p>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/guest-link-1" class="nav-link p-0 text-muted">Guest Link
                                1</a></li>
                        <li class="nav-item mb-2"><a href="/guest-link-2" class="nav-link p-0 text-muted">Guest Link
                                2</a></li>
                        <li class="nav-item mb-2"><a href="/guest-link-3" class="nav-link p-0 text-muted">Guest Link
                                3</a></li>
                    </ul>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>&copy; 2023-2024 Your E-Wallet, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="https://twitter.com/your_e_wallet"><svg class="bi"
                                width="24" height="24">
                                <use xlink:href="#twitter"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="https://www.instagram.com/your_e_wallet/"><svg
                                class="bi" width="24" height="24">
                                <use xlink:href="#instagram"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="https://www.facebook.com/your_e_wallet"><svg
                                class="bi" width="24" height="24">
                                <use xlink:href="#facebook"></use>
                            </svg></a></li>
                </ul>
            </div>
        </footer>
    </div>
</footer>

</html>

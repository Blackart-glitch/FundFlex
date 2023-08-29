<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Wallet App Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="bg-white p-4 rounded shadow-sm">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                    {{ __('Dashboard') }}
                </h2>
                <div class="text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-dark text-white py-4">
                <a href="/"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi pe-none me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4">Sidebar</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#home"></use>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Settings
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            History
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#people-circle"></use>
                            </svg>
                            Profile
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                            class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <main class="col-md-9 ml-md-auto px-4">
                <!-- Transaction History -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Transaction history table -->
                    </div>
                </div>

                <!-- Account Summary and Graph -->
                <div class="row">
                    <div class="col-md-6">
                        <h2>Account Summary</h2>
                        <p><strong>Account Balance:</strong> $1,200</p>
                        <p><strong>Available Funds:</strong> $800</p>
                        <p><strong>Pending Transactions:</strong> 2</p>
                    </div>
                    <div class="col-md-6">
                        <h2>Graphs and Charts</h2>
                        <div class="text-center">
                            <h4>Placeholder Graph</h4>
                            <p>This is where the actual graph will go.</p>
                        </div>
                        <div class="d-flex align-items-end">
                            <div class="flex-shrink-0">
                                <img src="#" alt="" width="300">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mt-0">Media heading</h5>
                                <p>This is some content from a media component</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row">
                    <div class="col-md-12">
                        <h2>Quick Actions</h2>
                        <a href="#" class="btn btn-primary">Send Money</a>
                        <a href="#" class="btn btn-success">Receive Money</a>
                        <a href="#" class="btn btn-info">Request Funds</a>
                        <a href="#" class="btn btn-secondary">Make Payment</a>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>

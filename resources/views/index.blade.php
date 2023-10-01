<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Wallet App Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <div class="flex-shrink-0 w-56 bg-white border-r">
            <div class="">
                <img src="{{ asset('logo.png') }}" alt="logo" class="w-40 h-36 mx-auto">
            </div>
            <nav class="mt-6">
                <a href="/dashboard" class="flex items-center px-4 py-2 text-gray-600 hover:text-indigo-600 hover:bg-gray-100">
                    <img src="{{ asset('dashboard.png') }}" alt="Dashboard" class="w-6 h-6 mr-2">
                    Dashboard
                </a>
                <a href="/currency-rate" class="flex items-center px-4 py-2 text-gray-600 hover:text-indigo-600 hover:bg-gray-100 py-8">
                    <img src="{{ asset('rate.png') }}" alt="Currency Rate" class="w-6 h-6 mr-2">
                    Currency Rate
                </a>
                <a href="/transaction-history" class="flex items-center px-4 py-2 text-gray-600 hover:text-indigo-600 hover:bg-gray-100 py-8">
                    <img src="{{ asset('transaction.png') }}" alt="Transactions" class="w-6 h-6 mr-2">
                    Transactions
                </a>
                <a href="/notification" class="flex items-center px-4 py-2 text-gray-600 hover:text-indigo-600 hover:bg-gray-100 py-8">
                    <img src="{{ asset('notify.png') }}" alt="Notification" class="w-6 h-6 mr-2">
                    Notification
                </a>
                <a href="/support" class="flex items-center px-4 py-2 text-gray-600 hover:text-indigo-600 hover:bg-gray-100 py-8">
                    <img src="{{ asset('support.png') }}" alt="Support" class="w-6 h-6 mr-2">
                    Support
                </a>
                <a href="/" class="flex items-center px-4 py-2 text-gray-600 hover:text-indigo-600 hover:bg-gray-100 py-8">
                    <img src="{{ asset('logout.png') }}" alt="Log Out" class="w-6 h-6 mr-2">
                    Log Out
                </a>
            </nav>
        </div>
        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            @yield('content')
        </main>
    </div>

</body>

</html>

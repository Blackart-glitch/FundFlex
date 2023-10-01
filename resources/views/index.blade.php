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
        <!-- Sidebar (hidden on small screens) -->
        <div id="sidebar" class="flex-shrink-0 w-56 bg-white border-r hidden lg:block">
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
        <!-- Sidebar toggle button (visible on small screens) -->
        <div id="sidebarToggle" class="lg:hidden cursor-pointer py-2 px-3 bg-gray-200 text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </div>
        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="px-6 py-8">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-gray-800">Welcome Timothy</h1>
                    <p class="text-gray-600">Make your seamless transfer today!</p>
                </div>
                @yield('content')
            </div>
        </main>
    </div>

    <!-- JavaScript to toggle sidebar on small screens -->
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        });
    </script>

</body>

</html>

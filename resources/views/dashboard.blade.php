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
                <!-- <div class="text-xl font-semibold text-gray-800">Babatunde</div>
                <a href="#" class="flex items-center mt-2 text-gray-600 hover:text-indigo-600">
                    <span class="mr-2">
                        Profile
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a> -->
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
                <a href="/transactions" class="flex items-center px-4 py-2 text-gray-600 hover:text-indigo-600 hover:bg-gray-100 py-8">
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
            <div class="px-6 py-8">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-gray-800">Welcome Timothy</h1>
                    <p class="text-gray-600">Make your seamless transfer today!</p>
                </div>
                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Quick Transfer -->
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-gray-800">Make a quick transfer</h2>
                            <img src="{{ asset('transfer.png') }}" alt="Quick Transfer" class="w-8 h-8">
                        </div>
                        <p class="mt-4 text-gray-600">Send money to all individuals across the continent.</p>
                        <div class="mt-6">
                            <button class="px-4 py-2 text-white bg-indigo-600 rounded-full hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200">
                                Transfer money
                            </button>
                        </div>
                    </div>
                    <!-- Custom Request -->
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-gray-800">Make a custom request</h2>
                            <img src="{{ asset('customise.png') }}" alt="Custom Request" class="w-8 h-8">
                        </div>
                        <p class="mt-4 text-gray-600">We offer you the opportunity to make a currency request.</p>
                        <div class="mt-6">
                            <button class="px-4 py-2 text-white bg-indigo-600 rounded-full hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200">
                                Customized request
                            </button>
                        </div>
                    </div>
                    <!-- View Rate -->
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-gray-800">View Currency Rates</h2>
                            <img src="{{ asset('bankrate.png') }}" alt="Currency Rates" class="w-8 h-8">
                        </div>
                        <p class="mt-4 text-gray-600">Get up-to-date currency rates for all your transactions.</p>
                        <div class="mt-6">
                            <button class="px-4 py-2 text-white bg-indigo-600 rounded-full hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200">
                                View rates
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Recent Transactions -->
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800">Recent Transactions</h2>
                    <div class="mt-4 bg-white rounded-lg shadow-lg">
                        <div class="p-4">
                            <!-- Transaction 1 -->
                            <div class="flex justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">12 September</h3>
                                    <p class="text-gray-600">You paid 10,000 NGN to Jane Doe</p>
                                </div>
                                <p class="text-green-600">+10,000 NGN</p>
                            </div>
                            <!-- Transaction 2 -->
                            <div class="flex justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">12 September</h3>
                                    <p class="text-gray-600">You paid 10,000 NGN to Jane Doe</p>
                                </div>
                                <p class="text-green-600">+10,000 NGN</p>
                            </div>
                            <!-- Transaction 3 -->
                            <div class="flex justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">12 September</h3>
                                    <p class="text-gray-600">You paid 10,000 NGN to Jane Doe</p>
                                </div>
                                <p class="text-green-600">+10,000 NGN</p>
                            </div>
                            <!-- Transaction 4 -->
                            <div class="flex justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">12 September</h3>
                                    <p class="text-gray-600">You paid 10,000 NGN to Jane Doe</p>
                                </div>
                                <p class="text-green-600">+10,000 NGN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>

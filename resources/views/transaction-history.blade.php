@extends('index')

@section('content')
<div class="px-6 py-8">
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
    <!-- Transaction history -->
    <div class="bg-white p-4 shadow-lg rounded-lg mt-3" style="max-height: 410px; overflow-y: auto;">
        <h1 class="text-xl font-bold mb-4 text-center">Transaction History</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-center">Date</th>
                        <th class="px-4 py-2 text-center">Description</th>
                        <th class="px-4 py-2 text-center">Amount</th>
                        <th class="px-4 py-2 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2023-09-01</td>
                        <td class="px-4 py-2 text-center">Payment for Product A</td>
                        <td class="px-4 py-2 text-center">$50.00</td>
                        <td class="px-4 py-2 text-green-500 text-center">Completed</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2023-08-25</td>
                        <td class="px-4 py-2 text-center">Payment for Service B</td>
                        <td class="px-4 py-2 text-center">$75.00</td>
                        <td class="px-4 py-2 text-yellow-500 text-center">Pending</td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2023-08-25</td>
                        <td class="px-4 py-2 text-center">Payment for Service B</td>
                        <td class="px-4 py-2 text-center">$75.00</td>
                        <td class="px-4 py-2 text-yellow-500 text-center">Pending</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2023-08-15</td>
                        <td class="px-4 py-2 text-center">Payment for Product C</td>
                        <td class="px-4 py-2 text-center">$30.00</td>
                        <td class="px-4 py-2 text-red-500 text-center">Failed</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2023-09-01</td>
                        <td class="px-4 py-2 text-center">Payment for Product A</td>
                        <td class="px-4 py-2 text-center">$50.00</td>
                        <td class="px-4 py-2 text-green-500 text-center">Completed</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2023-08-25</td>
                        <td class="px-4 py-2 text-center">Payment for Service B</td>
                        <td class="px-4 py-2 text-center">$75.00</td>
                        <td class="px-4 py-2 text-yellow-500 text-center">Pending</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2023-08-15</td>
                        <td class="px-4 py-2 text-center">Payment for Product C</td>
                        <td class="px-4 py-2 text-center">$30.00</td>
                        <td class="px-4 py-2 text-red-500 text-center">Failed</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2023-09-01</td>
                        <td class="px-4 py-2 text-center">Payment for Product A</td>
                        <td class="px-4 py-2 text-center">$50.00</td>
                        <td class="px-4 py-2 text-green-500 text-center">Completed</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2023-08-25</td>
                        <td class="px-4 py-2 text-center">Payment for Service B</td>
                        <td class="px-4 py-2 text-center">$75.00</td>
                        <td class="px-4 py-2 text-yellow-500 text-center">Pending</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2023-08-15</td>
                        <td class="px-4 py-2 text-center">Payment for Product C</td>
                        <td class="px-4 py-2 text-center">$30.00</td>
                        <td class="px-4 py-2 text-red-500 text-center">Failed</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

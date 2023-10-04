@extends('index')

@section('content')
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
@endsection

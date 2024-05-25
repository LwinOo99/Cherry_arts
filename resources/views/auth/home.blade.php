@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-cols gap-3">
            <a href="/auth/home" class="text-xl underline font-semibold text-gray-800 mb-6">Dashboard</a>
            <a href="/manageProduct" class="text-xl font-semibold text-gray-400 mb-6">Manage Products</a>
            <a href="" class="text-xl font-semibold text-gray-400 mb-6">Settings</a>
            <a href=""></a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1: Total Users -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Total Users</h2>
                <p class="text-4xl font-bold text-blue-500">1200</p>
            </div>

            <!-- Card 2: Total Orders -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Total Orders</h2>
                <p class="text-4xl font-bold text-green-500">350</p>
            </div>

            <!-- Card 3: Revenue -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Revenue</h2>
                <p class="text-4xl font-bold text-yellow-500">$12,500</p>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Orders</h2>
            <div class="bg-white rounded-lg shadow-md overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Order ID</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Customer Name</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Amount</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">001</td>
                            <td class="px-6 py-4 whitespace-no-wrap">John Doe</td>
                            <td class="px-6 py-4 whitespace-no-wrap">$250</td>
                            <td class="px-6 py-4 whitespace-no-wrap"><span
                                    class="bg-green-100 text-green-800 py-1 px-2 rounded-full text-xs">Completed</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">002</td>
                            <td class="px-6 py-4 whitespace-no-wrap">Jane Smith</td>
                            <td class="px-6 py-4 whitespace-no-wrap">$150</td>
                            <td class="px-6 py-4 whitespace-no-wrap"><span
                                    class="bg-yellow-100 text-yellow-800 py-1 px-2 rounded-full text-xs">Pending</span></td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('title', 'AdminHome')

@section('body')
    <div class="container mx-auto px-4 py-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1: Total Users -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Total Products</h2>
                <p class="text-4xl font-bold text-blue-500">{{ $productList->count() }}</p>
            </div>

            <!-- Card 2: Total Orders -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Total Categories</h2>
                <p class="text-4xl font-bold text-green-500">{{ $categoryList->count() }}</p>
            </div>

            <!-- Card 3: Revenue -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Revenue</h2>
                <p class="text-4xl font-bold text-yellow-500">$12,500</p>
            </div>
        </div>

        <!-- Recent Orders Table -->

        <div class="mt-8">
            <a href="/manageProduct" class="text-xl font-semibold text-white mb-6 hover:text-blue-500">Manage Products</a>
            <div class="bg-white rounded-lg shadow-md overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Product Image</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Product Name</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Code</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Category</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($lastTwo as $product)
                            <tr>
                                <th scope="row"
                                    class="underline px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($product->p_picture == '')
                                        <img class="h-20 max-w-sm rounded-lg" id="picture" src="/defaultImage.png"
                                            alt="image description">
                                    @else
                                        <img class="h-20 max-w-sm rounded-lg" id="picture"
                                            src="{{ asset('storage/' . $product->p_picture) }}" alt="image description">
                                    @endif
                                </th>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $product->p_name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $product->p_code }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap"><span
                                        class="bg-green-100 text-green-800 py-1 px-2 rounded-full text-xs">{{ $product->category->c_name }}</span>
                                </td>
                            </tr>
                        @empty
                        @endforelse

                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            <a href="/manageProduct"
                            class="inline-flex float-right items-center justify-center px-5 my-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            See More
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
        </div>
    </div>

@endsection

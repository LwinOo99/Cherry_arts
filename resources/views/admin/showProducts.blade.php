@extends('layouts.admin')
@section('title', 'ShowProducts')

@section('body')

    <div class=" m-5">
        {{-- product management links start --}}
        <ul class="grid grid-cols-2 ">
            <li>
                <p class="text-xl font-medium text-white ">Product List</p>
                <p class="text-md my-3 text-white ">Total Product : {{ $productList->count() }}</p>
            </li>
            <li class="justify-self-end ">
                <a href="manageProduct/create">
                    <button type="button"
                        class="text-white bg-gray-500 border border-gray-400 focus:outline-none hover:text-gray-900 hover:bg-gray-100 focus:ring-1 focus:ring-gray-100 
                        font-medium rounded-md text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 
                        dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        Add New Products
                    </button>
                </a>
            </li>

        </ul>

        {{-- product management links end --}}
        <div class="relative overflow-x-auto rounded">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-800 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product picture
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col " class="px-6 py-3 " colspan="2">
                            Actions
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($productList as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                            <th scope="row"
                                class="underline px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/manageProduct/{{ $product->id }}">{{ $product->p_name }}</a>
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->p_code }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->p_category }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->p_price }} mmk
                            </td>
                            <td class="pe-6 py-4 text-right">
                                <a href="/manageProduct/{{ $product->id }}/edit" class="text-green-500 underline ">Edit</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="/manageProduct/{{ $product->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse


                </tbody>
            </table>
            {{-- pagination --}}
            <div class="mt-5 text-white">
                {{ $productList->links() }}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('title', 'EditProduct')

@section('body')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-cols gap-3">
            <a href="/manageProduct" class="text-xl font-semibold text-gray-400 mb-6"> <-Back </a>
        </div>

        {{-- product form --}}
        <section class="bg-white dark:bg-gray-900 rounded">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Product Informations</h2>


                <form action="/manageProduct/{{ $productInfo->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if ($productInfo->p_picture == '')
                        <img class="h-80 max-w-lg rounded-lg" id="picture" src="/defaultImage.png"
                            alt="image description">
                    @else
                    <img class="h-80 max-w-lg rounded-lg" id="picture"
                        src="{{ asset('storage/' . $productInfo->p_picture) }}" alt="image description">
                    @endif
                    

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        file</label>
                    <input
                        class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        name="p_picture" id="pictureBtn" type="file">


                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                            <input type="text" name="p_name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type product name" required="" value="{{ $productInfo->p_name }}">
                        </div>
                        <div class="w-full">
                            <label for="pCode"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Code</label>
                            <input type="text" name="p_code" id="pCode"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Product Code" required="" value="{{ $productInfo->p_code }}">
                        </div>
                        <div class="w-full">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="p_price" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Product Price" required="" value="{{ $productInfo->p_price }}">
                        </div>
                        <div>
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" name="p_category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">{{ $productInfo->p_category }}</option>
                                <option value="Toys">Toys</option>
                                <option value="Handmade">Handmade Bags</option>
                                <option value="Crochet">Crochet</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div>
                            <label for="item-height"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Height
                                (cm)</label>
                            <input type="number" name="p_height" id="item-height"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="12" required="" value="{{ $productInfo->p_height }}">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="p_des" id="description" rows="8"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Your description here">{{ $productInfo->p_des }}</textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Update product
                    </button>

                </form>
            </div>
        </section>
    @endsection

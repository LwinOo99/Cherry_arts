@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded px-8 py-6">
                <div class="mb-4">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ __('Register') }}</h2>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('Name') }}</label>
                        <input id="name" type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-400 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-400 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('Password') }}</label>
                        <input id="password" type="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-400 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-400" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

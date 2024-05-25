@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded px-8 py-6">
                <div class="mb-4">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ __('Login') }}</h2>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-400 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('Password') }}</label>
                        <input id="password" type="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-400 @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="text-gray-700 text-sm" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

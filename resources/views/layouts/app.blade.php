<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- libraries --}}
    <link href="./output.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Replace Bootstrap CSS with Tailwind CSS -->
    @vite('resources/css/app.css')
    <!-- Include any other CSS files here -->
    @vite('resources/js/pictureChange.js')


</head>

<body class="font-sans antialiased">
    <div id="app">
        <!-- Navigation Bar -->
        <nav class="bg-white shadow">
            <div class="container mx-auto py-4">
                <a class="text-lg font-semibold" href="{{ url('/') }}">
                    Cherry Arts & Handicrafts
                </a>
                <div class="ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <a class="mr-4 text-sm text-gray-700" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="text-sm text-gray-700" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <div class="relative">
                            <button class="text-sm text-gray-700 focus:outline-none">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-md z-10">
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Include any JavaScript files here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

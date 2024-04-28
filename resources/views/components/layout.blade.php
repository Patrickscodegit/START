<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />

    <script src="//unpkg.com/alpinejs" defer></script>

    <title>Hollandico Bv | Find luxury cars</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/">
            <img src="{{ asset('images/Hollandico_logo.gif') }}" alt="Hollandico Logo" class="w-36">
        </a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                <span class="font-bold uppercase">Welcome {{ auth()->user()->name }}</span>
            </li>
            <li>
                <a href="/listings/manage" class="hover:text-laravel">
                    <i class="fa-solid fa-gear"></i> Manage Listings
                </a>
            </li>
            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/register" class="hover:text-laravel">
                    <i class="fa-solid fa-user-plus"></i> Register
                </a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                </a>
            </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{ $slot }}
    </main>

    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-red-600 text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>
        <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">
            Add a listing
        </a>
    </footer>
    <x-flash-message />
</body>
</html>

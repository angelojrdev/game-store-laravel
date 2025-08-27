@props(['title' => null])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title === null ? config('app.name') : $title . ' - ' . config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-white bg-slate-900">
    <nav class="bg-black text-white p-5 flex items-center">
        <a href="{{ route('home') }}" class="text-xl font-black hover:text-neutral-300 transition">
            {{ config('app.name') }}
        </a>

        <ul class="font-semibold ml-6 flex items-center gap-4">
            <li>
                <a href="#" class="hover:text-neutral-300 transition">Games</a>
            </li>
            <li>
                <a href="#" class="hover:text-neutral-300 transition">News</a>
            </li>
            <li>
                <a href="#" class="hover:text-neutral-300 transition">About</a>
            </li>
        </ul>

        <div class="font-semibold ml-auto flex items-center gap-4">
            <a href="{{ route('signup') }}" class="px-2 py-1 border border-blue-500 rounded
                               hover:bg-blue-500 transition">
                Sign Up
            </a>
            <a href="{{ route('auth.create') }}" class="px-2 py-1 border border-blue-500 rounded
                               hover:bg-blue-500 transition">
                Login
            </a>
        </div>
    </nav>

    {{ $slot }}
</body>

</html>
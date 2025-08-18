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
        <a href="#" class="px-2 py-1 border border-blue-500 rounded
                               hover:bg-blue-500 transition">
            Sign Up
        </a>
        <a href="#" class="px-2 py-1 border border-blue-500 rounded
                               hover:bg-blue-500 transition">
            Log In
        </a>
    </div>
</nav>
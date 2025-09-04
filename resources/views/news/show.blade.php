<x-layout title="">
    <div class="bg-black p-6 rounded-lg w-auto size-64 flex flex-col justify-between gap-2">
        <header class="truncate font-bold text-2xl">
            <h1>{{ $post->title }}</h1>
        </header>

        <p>{{ $post->content }}</p>

        <footer>
            <span class="font-semibold">
                {{ $post->author->full_name }}
            </span>
            •
            <span class="font-light">
                {{ $post->created_at->format('m/d/Y') }}
            </span>
        </footer>
    </div>
</x-layout>
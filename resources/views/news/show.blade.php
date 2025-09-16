<x-layout title="">
    <div class="bg-black p-6 rounded-lg w-auto size-64 flex flex-col justify-between gap-2">
        <header class="truncate font-bold text-2xl">
            <h1>{{ $news->title }}</h1>
        </header>

        {!! $news->content_html !!}

        <footer>
            <span class="font-semibold">
                {{ $news->author->full_name }}
            </span>
            •
            <span class="font-light">
                {{ $news->created_at->format('m/d/Y') }}
            </span>
        </footer>
    </div>
</x-layout>
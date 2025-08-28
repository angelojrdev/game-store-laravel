<x-layout>
    <div class="flex flex-wrap justify-center gap-6 mt-6">
        @foreach ($posts as $post)
        <div class="bg-black p-6 rounded-lg w-md size-64 flex flex-col justify-between gap-2">
            <header class="truncate font-bold text-2xl">{{ $post->title }}</header>

            <p class="line-clamp-3">{{ $post->content }}</p>

            <footer>
                <span class="font-semibold">
                    AUTHOR_{{ $post->author_id }}
                </span>
                •
                <span class="font-light">
                    {{ $post->created_at->format('m/d/Y') }}
                </span>
            </footer>
        </div>
        @endforeach
    </div>
</x-layout>
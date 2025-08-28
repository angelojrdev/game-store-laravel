<x-layout>
    @foreach ($posts as $post)
    {{ $post->title }}<br>
    @endforeach
</x-layout>
@props(['label', 'name', 'type', 'validation' => null])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium mb-1">{{ $label }}</label>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="w-full border rounded px-3 py-2" />

    @if ($validation)
    <p class="text-red-500 text-sm font-semibold mt-1">{{ $validation }}</p>
    @endif
</div>
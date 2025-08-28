<x-layout title="Login">
    <div class="mx-auto max-w-md bg-black p-6 rounded-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">Login</h1>

        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <x-form-field label="Username" name="username" type="text" />

            <x-form-field label="Password" name="password" type="password" />

            <button class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                Submit
            </button>
        </form>
    </div>
</x-layout>
<x-layout title="Create account">
    <div class="mt-12 mx-auto max-w-md bg-black p-6 rounded-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">Create account</h1>

        <form>
            @csrf

            <x-form-field label="Full Name" name="full_name" type="text" />

            <x-form-field label="Username" name="username" type="text" />

            <x-form-field label="Email" name="email" type="email" />

            <x-form-field label="Password" name="password" type="password" />

            <x-form-field label="Password Confirmation" name="password_confirmation" type="password_confirmation" />

            <button class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                Register
            </button>
        </form>
    </div>
</x-layout>
<x-layout title="Create account">
    <div class="mt-12 mx-auto max-w-md bg-black p-6 rounded-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">Create account</h1>

        <form>
            <div class="mb-4">
                <label for="full_name" class="block text-sm font-medium mb-1">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="w-full border rounded px-3 py-2" />
                <p class="text-red-500 text-sm font-semibold mt-1">Nome inválido!</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Username</label>
                <input type="text" class="w-full border rounded px-3 py-2" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" class="w-full border rounded px-3 py-2" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" class="w-full border rounded px-3 py-2" />
            </div>

            <button class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                Register
            </button>
        </form>
    </div>
</x-layout>
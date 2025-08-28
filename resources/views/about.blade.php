<x-layout title="About">
    <div class="bg-black p-6 rounded-lg">
        <h1 class="text-4xl font-bold text-center">About {{ config('app.name') }}</h1>

        <p class="mt-4">
            Welcome to {{ config('app.name') }}, your one-stop platform for discovering and supporting amazing indie
            games.
            Our goal is to provide a space where talented developers can share their creations with a global audience,
            and where gamers can find unique and engaging experiences beyond the mainstream titles.
        </p>

        <p class="mt-4">
            On our platform, you can browse games by genre, developer, or popularity, read detailed descriptions,
            watch trailers, and purchase games securely. We also foster a community where players and developers
            can interact and share feedback, making the ecosystem more vibrant and supportive.
        </p>

        <p class="mt-4">
            {{ config('app.name') }} is built with the latest web technologies, including Laravel and Tailwind CSS,
            to provide a fast, responsive, and enjoyable experience for our users.
            Whether you're an indie developer or a passionate gamer, {{ config('app.name') }} is here to help you
            connect with great
            games.
        </p>

        <p class="text-sm text-gray-400 mt-6">
            Note: This message example was generated with the assistance of artificial intelligence.
        </p>
    </div>
</x-layout>
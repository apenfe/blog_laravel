<x-blog-layout meta-title="Inicio" meta-description="Descripción de la página de inicio">

    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="mt-4 mb-8 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">
            {{ __('Home') }}
        </h1>
    </div>

    <x-slot:sidebar>
        <p>Home sidebar</p>
    </x-slot:sidebar>

</x-blog-layout>

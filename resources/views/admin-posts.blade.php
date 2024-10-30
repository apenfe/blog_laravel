<x-blog-layout meta-title="Mis posts" meta-description="Descripción de la página de mis posts">

    <div class="mx-auto mt-4 max-w-6xl">

        <h1 class="my-4 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">
            {{ __('Mis posts') }}
        </h1>

        <!--Botón de creación de post-->
        @auth
            <x-create-post-button />
        @endauth

        <div class="mx-auto mt-8 grid max-w-6xl gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!--Artículos-->
            @foreach($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>

        <!--Paginación-->
        <div class="mt-8">
            {{ $posts->links() }}
            <x-pagination :paginator=" $posts " />
        </div>

    </div>

</x-blog-layout>

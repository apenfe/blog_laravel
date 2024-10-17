<x-layout meta-title="Blog" meta-description="Descripción de la página del blog">

    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="mt-4 mb-8 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">
            {{ __('Blog') }}
        </h1>
    </div>

    <a href="{{ route('posts.create') }}">{{ __('Create a new post') }}</a>
    {{-- @dump($posts) Dump the $posts variable que viene a ser la clave, si la clave es articulos seria con $articulos --}}

    @foreach($posts as $post)

        <div style="display: flex; align-items: baseline">
            <h2>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </h2>
             <a href="{{ route('posts.edit', $post) }}"> | {{ __('Edit') }}</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">{{ __('Delete') }}</button>
            </form>
        </div>

    @endforeach

</x-layout>

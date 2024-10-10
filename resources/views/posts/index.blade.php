<x-layout meta-title="Blog" meta-description="Descripción de la página del blog">

    <h1>Blog</h1>
    <a href="{{ route('posts.create') }}">CREATE A NEW POST</a>
    {{-- @dump($posts) Dump the $posts variable que viene a ser la clave, si la clave es articulos seria con $articulos --}}

    @foreach($posts as $post)

        <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>

    @endforeach

</x-layout>

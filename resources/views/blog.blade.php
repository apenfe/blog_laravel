<x-layout meta-title="Blog" meta-description="Descripción de la página del blog">

    <h1>Blog</h1>

    {{-- @dump($posts) Dump the $posts variable que viene a ser la clave, si la clave es articulos seria con $articulos --}}

    @foreach($posts as $post)

        <h2>{{ $post->title }}</h2>
        <h4>Indice: {{ $post->id }}</h4>

        <p>Indice: {{ $post->body }}</p>

    @endforeach

</x-layout>

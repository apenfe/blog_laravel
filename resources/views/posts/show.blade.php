<x-layout :meta-title="$post->title" :meta-description="$post->body">

    <h1>{{ __('Show post') }}</h1>

    <h2>{{$post->title}}</h2>

    <p>{{$post->body}}</p>

    <hr>
    <a href="{{ route('posts.index') }}">{{ __('Back') }}</a>

</x-layout>

<x-layout :meta-title="$post->title" :meta-description="$post->body">

    <h1>{{ __('Edit post') }}</h1>
    <a href="{{ route('posts.index') }}">{{ __('Back') }}</a>
    <hr>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PATCH')

        @include('posts.form-fields')

        <input type="submit" value="{{ __('Submit') }}">
        <br>

    </form>

    <hr>
    <a href="{{ route('posts.index') }}">{{ __('Back') }}</a>

</x-layout>

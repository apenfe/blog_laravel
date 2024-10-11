<x-layout :meta-title="$post->title" :meta-description="$post->body">

    <h1>Edit post</h1>
    <a href="{{ route('posts.index') }}">{{ __('Back') }}</a>
    <hr>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        {{-- @method('PUT') --}}

        <label>
            {{ __('Title') }}
            <br>
            <input type="text" name="title" placeholder="Inserte un titulo" value="{{ old('title', $post->title) }}">

            @error('title')
            <p><small style="color: red">{{ $message }}</small></p>
            @enderror
        </label>
        <br>

        <label>
            {{ __('Body') }}
            <br>
            <textarea name="body" placeholder="Inserte el body del post">{{ old('body', $post->body) }}</textarea>

            @error('body')
            <p><small style="color: red">{{ $message }}</small></p>
            @enderror
        </label>
        <br>

        <input type="submit" value="{{ __('Submit') }}">
        <br>

    </form>

</x-layout>

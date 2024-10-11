<x-layout meta-title="Create a new post" meta-description="Form to Create a new post">

    <h1>{{ __('Create a new post') }}</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label>
            {{ __('Title') }}
           <br>
            <input type="text" name="title" placeholder="Inserte un titulo" value="{{ old('title') }}">

            @error('title')
                <p><small style="color: red">{{ $message }}</small></p>
            @enderror
        </label>
        <br>

        <label>
            {{ __('Body') }}
             <br>
            <textarea name="body" placeholder="Inserte el body del post">{{ old('body') }}</textarea>

            @error('body')
                <p><small style="color: red">{{ $message }}</small></p>
            @enderror
        </label>
        <br>

        <input type="submit" value="{{ __('Submit') }}">
        <br>

    </form>

    <hr>
    <a href="{{ route('posts.index') }}">{{ __('Back') }}</a>

</x-layout>

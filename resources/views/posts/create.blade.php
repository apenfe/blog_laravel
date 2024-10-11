<x-layout meta-title="Create a new post" meta-description="Form to Create a new post">

    <h1>Create a new post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label>
            Title <br>
            <input type="text" name="title" placeholder="Inserte un titulo" value="{{ old('title') }}">

            @error('title')
                <p><small style="color: red">{{ $message }}</small></p>
            @enderror
        </label>
        <br>

        <label>
            Body <br>
            <textarea name="body" placeholder="Inserte el body del post">{{ old('body') }}</textarea>

            @error('body')
                <p><small style="color: red">{{ $message }}</small></p>
            @enderror
        </label>
        <br>

        <input type="submit" value="Submit">
        <br>

    </form>

    <hr>
    <a href="{{ route('posts.index') }}">Back</a>

</x-layout>

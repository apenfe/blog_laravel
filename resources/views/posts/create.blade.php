<x-layout meta-title="Create a new post" meta-description="Form to Create a new post">

    <h1>Create a new post</h1>

    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label>
            Title <br>
            <input type="text" name="title" placeholder="Inserte un titulo">

            @error('title')
                <p><strong style="color: red">{{ $message }}</strong></p>
            @enderror
        </label>
        <br>

        <label>
            Body <br>
            <textarea name="body" placeholder="Inserte el body del post"></textarea>

            @error('body')
                <p><strong style="color: red">{{ $message }}</strong></p>
            @enderror
        </label>
        <br>

        <input type="submit" value="Submit">
        <br>

    </form>

    <hr>
    <a href="{{ route('posts.index') }}">Back</a>

</x-layout>

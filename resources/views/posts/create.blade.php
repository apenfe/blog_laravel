<x-layout meta-title="Create a new post" meta-description="Form to Create a new post">

    <h1>Create a new post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label>
            Title <br>
            <input type="text" name="title" placeholder="Inserte un titulo">
        </label>
        <br>

        <label>
            Body <br>
            <textarea name="body" placeholder="Inserte el body del post"></textarea>
        </label>
        <br>

        <input type="submit" value="Submit">
        <br>

    </form>

    <hr>
    <a href="{{ route('posts.index') }}">Back</a>

</x-layout>

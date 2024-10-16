<x-layout meta-title="Create a new post" meta-description="Form to Create a new post">

    <h1>{{ __('Create a new post') }}</h1>
    <a href="{{ route('posts.index') }}">{{ __('Back') }}</a>
    <hr>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        @include('posts.form-fields')

        <input type="submit" value="{{ __('Submit') }}">
        <br>

    </form>

    <hr>
    <a href="{{ route('posts.index') }}">{{ __('Back') }}</a>

</x-layout>

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

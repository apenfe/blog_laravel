<div>
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input id="title"
                  name="title"
                  type="text"
                  value="{{ old('title', $post->title) }}"
                  class="block w-full mt-1" />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<div>
    <x-input-label for="body" :value="__('Body')" />
    <x-textarea id="body"
                name="body"
                class="block w-full mt-1"
    >{{ old('body', $post->body) }}</x-textarea>
    <x-input-error :messages="$errors->get('body')" class="mt-2" />
</div>
 <!-- SE AGREGA EL CAMPO DE FECHA DE PUBLICACION -->
<div>
    <x-input-label for="published_at" :value="__('Published at')" />
    <input type="datetime-local" name="published_at" id="published_at value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '')}}">
    <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
</div>


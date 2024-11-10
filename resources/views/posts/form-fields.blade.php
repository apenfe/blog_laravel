<div>
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
    <x-input-label for="published_at" :value="__('Publish date')" />
    <input type="datetime-local"
           class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm"
           name="published_at" id="published_at" value="{{ old('published_at', $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '') }}">
    <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
</div>

<!--º SE AGREGA EL CAMPO DE IMAGEN -->
<div>
    <x-input-label for="image" :value="__('Imagen')" />
    @if( $post->image )
        <div class="mt-2">
            <img src="{{ Storage::url($post->image) }}" alt="Imagen actual" class="w-20 h-20 rounded-full object-cover">
        </div>
    @else

    @endif
    <input type="file"
           id="image"
           name="image"
           class="mt-1 block w-full"
           accept="image/*">
    <x-input-error class="mt-2" :messages="$errors->get('image')" />
</div>

<!-- SE AGREGA EL CAMPO DE CATEGORÍA -->
<div>
    <x-input-label for="category_id" :value="__('Category')" />
    <select name="category_id" id="category_id" class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm">
        @foreach( \App\Models\Category::all() as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
</div>

</div>

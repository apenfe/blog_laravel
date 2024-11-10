<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name"
                  name="name"
                  type="text"
                  value="{{ old('name') }}"
                  class="block w-full mt-1" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div>
    <x-input-label for="description" :value="__('Description')" />
    <x-textarea id="description"
                name="description"
                class="block w-full mt-1"
    >{{ old('description') }}</x-textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

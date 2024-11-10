<div class="py-12">
    <h2>Crear una nueva categoría</h2>
    <form method="POST" action="{{ route('categories.store') }}" class="space-y-4 max-w-xl" enctype="multipart/form-data">
        @include('categories.form-fields')

        <x-primary-button class="mt-4" type="submit">{{ __('Save') }}</x-primary-button>
        @csrf
    </form>
</div>

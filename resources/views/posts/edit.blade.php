<x-blog-layout :meta-title="$post->title" :meta-description="$post->body">

    <h1 class="my-4 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">
        {{ __('Edit post') }}
    </h1>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('posts.update', $post) }}" class="space-y-4 max-w-xl">

                        @include('posts.form-fields')

                        <x-primary-button class="mt-4" type="submit">{{ __('Save') }}</x-primary-button>

                        @csrf
                        @method('PATCH')

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-blog-layout>

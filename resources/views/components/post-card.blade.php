@props(['post'])

<article class="flex flex-col overflow-hidden rounded bg-white shadow dark:bg-slate-900">
    <!--Imagen-->
    <div class="h-52">
        <a
            class="duration-300 hover:opacity-75"
            href="{{ route('posts.show', $post) }}"
        >
            <img
                class="h-full w-full object-cover object-center"
                src="{{ Storage::url($post->image) }}"
                alt="{{ $post->title }}"
            />
        </a>
    </div>
    <!--Contenido-->
    <div class="flex-1 space-y-3 p-5">
        <!--Categoria-->
        {{--<h3 class="text-sm font-semibold text-sky-500">
            Desk and Office
        </h3>--}}
        <!--Titulo-->
        <h2 class="text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200">
            <a class="hover:underline" href="{{ route('posts.show', $post) }}">
                {{ $post->title }}
            </a>
        </h2>

        @if( $post->updated_at > $post->created_at )
            <h6 class="text-base font-semibold leading-tight text-gray-500 dark:text-slate-200">
                <small>Actualizado: {{ $post->updated_at->diffForHumans() }}</small>
            </h6>
        @endif
        <!--Resumen-->
        <p class="hidden text-slate-500 dark:text-slate-400 md:block">
            {{ $post->body }}
        </p>
    </div>

    <!--Autor-->
    <div class="flex space-x-2 p-5">
        <!--Avatar-->
        @if( $post->user->avatar )
            <img class="h-6 w-6 rounded-full" src="{{ Storage::url($post->user->avatar) }}" alt="{{ $post->user->name }}{{$post->user->lastname}}"/>
        @else
            <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api?name={{ $post->user->name ?? 'X' }}+{{ $post->user->lastname ?? 'X' }}" alt="{{ $post->user->name }}{{$post->user->lastname}}"/>
        @endif

        <div class="flex flex-col justify-center">
            <!--Nombre-->
            <span
                class="text-sm font-semibold leading-4 text-slate-600 dark:text-slate-400"
            >
                {{ $post->user->name }} {{ $post->user->lastname }}
            </span>
            <!--Fecha-->
            <span class="text-sm text-slate-500">
                {{ $post->created_at->day }} {{ $post->created_at->monthName }} {{ $post->created_at->year }}
            </span>
        </div>
    </div>
</article>

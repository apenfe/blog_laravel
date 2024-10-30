@props(['post'])

<article class="flex flex-col overflow-hidden rounded bg-white shadow dark:bg-slate-900">
    <!--Imagen-->
    {{--<div class="h-52">
        <a
            class="duration-300 hover:opacity-75"
            href="/article.html"
        >
            <img
                class="h-full w-full object-cover object-center"
                src="/img/article-1.jpg"
                alt="Boost your conversion rate"
            />
        </a>
    </div>--}}
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
    {{--<div class="flex space-x-2 p-5">
        <!--Avatar-->
        <img
            class="h-10 w-10 rounded-full"
            src="https://ui-avatars.com/api?name=Roel Aufderehar"
            alt="Roel Aufderehar"
        />

        <div class="flex flex-col justify-center">
            <!--Nombre-->
            <span
                class="text-sm font-semibold leading-4 text-slate-600 dark:text-slate-400"
            >
                Roel Aufderehar
            </span>
            <!--Fecha-->
            <span class="text-sm text-slate-500">
                    Mar 16, 2023
            </span>
        </div>
    </div>--}}
</article>

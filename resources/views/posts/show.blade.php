<x-blog-layout :meta-title="$post->title" :meta-description="$post->body">

    <article class="mx-auto flex max-w-4xl flex-col">
        <!--Imagen-->
        {{--<div class="h-52 md:h-72 lg:h-96">
            <img
                class="h-full w-full rounded object-cover object-center"
                src="/img/article-4.jpg"
                alt="Desarrollo de una API con Laravel siguiendo la
                especificación JSON:API"
            />
        </div>--}}
        <!--Botones de edición y borrado-->
        @auth()
        @if(auth()->user()->id == $post->user_id)
            <x-edit-delete-button :post="$post" />
        @endif
        @endauth

        <!--Titulo y categoría-->
        <div class="flex-1 space-y-3 pt-4 md:text-center">
            <!--Categoria-->
            {{--<h3
                class="text-sm font-semibold text-sky-500 dark:text-sky-400"
            >
                Laravel
            </h3>--}}

            <!--Titulo-->
            <h2 class="text-2xl font-semibold leading-tight text-slate-800 dark:text-slate-200 md:text-4xl">
                {{ $post->title }}
            </h2>
        </div>

        <!--Autor, fecha e imagen-->
        {{--<div class="flex space-x-2 pt-4 md:mx-auto">
            <!--Imagen-->
            <img
                class="h-10 w-10 rounded-full"
                src="https://ui-avatars.com/api?name=Jorge García"
                alt="Jorge García"
            />
            <div class="flex flex-col justify-center">
            <!--Autor-->
            <span
                class="text-sm font-semibold leading-4 text-slate-600 dark:text-slate-400"
            >
              Jorge García
            </span>
            <!--Fecha-->
                <span
                    class="text-sm text-slate-500 dark:text-slate-400"
                >
              Mar 18, 2023
            </span>
            </div>
        </div>--}}

        <!--Contenido-->
        <div class="prose prose-slate mx-auto mt-6 dark:prose-invert lg:prose-xl">
            <p>
                {{ $post->body }}
            </p>
            {{--<ul>
                <li>List item 1</li>
                <li>List item 2</li>
                <li>List item 3</li>
                <li>List item 4</li>
            </ul>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing
                elit. Sint reprehenderit, ex accusamus totam asperiores
                illum rerum maiores alias quia distinctio necessitatibus
                accusantium impedit est beatae fugit iste molestias
                itaque sit.
            </p>
            <ol>
                <li>List item 1</li>
                <li>List item 2</li>
                <li>List item 3</li>
                <li>List item 4</li>
            </ol>
            <pre><code>class User {}</code></pre>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing
                elit. Sapiente perspiciatis modi
                <code>php artisan serve</code> reiciendis! Libero porro
                quis nemo odio, perferendis, quo illo assumenda autem
                praesentium numquam possimus quaerat doloribus!
                Praesentium, provident accusantium.
            </p>--}}
        </div>
    </article>
</x-blog-layout>

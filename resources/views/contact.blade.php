<x-blog-layout meta-title="Contacto" meta-description="Descripción de la página de contacto">

    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="mt-4 mb-8 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">
            {{ __('Contact') }}
        </h1>
    </div>

    <div class="mx-auto mt-4 max-w-6xl">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-200">
                    {{ __('Send us a message') }}
                </h3>
                <p class="mt-1 max-w text-sm text-gray-500 dark:text-gray-400">
                    {{ __('We will respond as soon as possible.') }}
                </p>

                <form action="" method="POST" class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Name') }}
                        </label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" autocomplete="name" class="block w-full shadow-sm sm:text-sm focus:ring-sky-500 focus:border-sky-500 border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Email') }}
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" class="block w-full shadow-sm sm:text-sm focus:ring-sky-500 focus:border-sky-500 border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Subject') }}
                        </label>
                        <div class="mt-1">
                            <input type="text" name="subject" id="subject" class="block w-full shadow-sm sm:text-sm focus:ring-sky-500 focus:border-sky-500 border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Message') }}
                            </label>
                            <span id="message-max" class="text-sm text-gray-500 dark:text-gray-400">
                                {{ __('Max. 500 characters') }}
                            </span>
                        </div>
                        <div class="mt-1">
                            <textarea id="message" name="message" rows="4" class="block w-full shadow-sm sm:text-sm focus:ring-sky-500 focus:border-sky-500 border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300"></textarea>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 dark:bg-sky-500 dark:hover:bg-sky-600 dark:focus:ring-sky-500">
                            {{ __('Send') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="mx-auto mt-4 max-w-6xl">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-200">
                    {{ __('Contact information') }}
                </h3>
                <div class="mt-2 max-w">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ __('If you have any questions, you can contact us through the following means:') }}
                    </p>
                </div>
                <div class="mt-5">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <PhoneIcon class="h-6 w-6 text-gray-400 dark:text-gray-300" aria-hidden="true" />
                        </div>
                        <div class="ml-3 text-sm text-gray-500 dark:text-gray-400">
                            <p>
                                {{ __('Phone') }}: +34 123 456 789
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 flex">
                        <div class="flex-shrink-0">
                            <MailIcon class="h-6 w-6 text-gray-400 dark:text-gray-300" aria-hidden="true" />
                        </div>
                        <div class="ml-3 text-sm text-gray-500 dark:text-gray-400">
                            <p>
                                {{ __('Email') }}: <a href="mailto:apenfe@rex.es" class="text-sky-600 dark:text-sky-400">
                                apenfe@rex.es
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-blog-layout>

@props(['paginator'])

@if( $paginator->hasPages() )
        <nav class="flex justify-between">
            @if($paginator->onFirstPage())
                <span class="px-2 py-1 text-gray-500 bg-gray-200 rounded">{{ __('Anterior') }}</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-2 py-1 text-gray-500 bg-gray-200 rounded">{{ __('Anterior') }}</a>
            @endif

            @if($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-2 py-1 text-gray-500 bg-gray-200 rounded">{{ __('Siguiente') }}</a>
            @else
                <span class="px-2 py-1 text-gray-500 bg-gray-200 rounded">{{ __('Siguiente') }}</span>
            @endif
        </nav>
 @endif

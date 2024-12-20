@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-3 py-3">
        <div class="text-lg">
            {{ $title ?? '' }}
        </div>

        <div class="mt-4">
            {{ $content ?? '' }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right dark:bg-gray-900  ">
        {{ $footer ?? '' }}
    </div>

</x-modal>

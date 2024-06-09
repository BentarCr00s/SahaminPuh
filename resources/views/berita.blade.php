<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="bg-white dark:bg-dark overflow-hidden shadow-sm rounded">
                <div class="p-4 text-dark dark:text-light">
                    {{ __("Latest news updates will appear here.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

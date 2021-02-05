<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome to the Spanish Quiz!<br />
                    For each word in Spanish, select the correct meaning in English.
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $spanish_word->word }}
                    For each word in Spanish, select the correct meaning in English.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

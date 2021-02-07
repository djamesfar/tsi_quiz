<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Words to Quiz') }}
    </h2>
    </x-slot>>
@section('content')
<div class="md:col-span-1"></div>
<div class="mt-5 md:mt-0 md:col-span-2" style="padding: 100px 200px">
    <form action="/words" method="POST">
        {{ csrf_field() }}
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="spanish_word" class="block text-sm font-medium text-gray-700">Spanish Word</label>
                        <input type="text" name="spanish_word" id="spanish_word" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" autofocus>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="english_word" class="block text-sm font-medium text-gray-700">English meaning</label>
                        <input type="text" name="english_word" id="english_word" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
    </x-app-layout>

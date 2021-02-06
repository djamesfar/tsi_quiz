<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Words to Quiz') }}
    </h2>
    </x-slot>>
@section('content')
    <div class="flash-message">
        @if(session('status'))
            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-pink-500">
  <span class="text-xl inline-block mr-5 align-middle">
    <i class="fas fa-bell" />
  </span>
                <span class="inline-block align-middle mr-8">
    <b class="capitalize">pink!</b> This is a pink alert - check it out!
  </span>
                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                    <span>×</span>
                </button>
            </div>
        @endif
    </div>
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
                        <label for="english_word" class="block text-sm font-medium text-gray-700">English Word</label>
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

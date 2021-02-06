<style>
body{
margin:0;
padding: 0;
font-family: sans-serif;

}

input[type="radio"] + label span {
transition: background .2s,
transform .2s;
}

input[type="radio"] + label span:hover,
input[type="radio"] + label:hover span{
transform: scale(1.2);
}

input[type="radio"]:checked + label span {
background-color: #3490DC; //bg-blue
box-shadow: 0px 0px 0px 2px white inset;
}

input[type="radio"]:checked + label{
color: #3490DC; //text-blue
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome to the Spanish Quiz!<br />
                    For each word in Spanish, select the correct meaning in English.
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 style="font-size: x-large; font-weight: bold; font-style: italic">{{ $spanish_word->word }}</h2>
                    Select the correct meaning in English.
                    <form action="/quiz" method="POST">
                        <div class="mx-auto max-w-sm">
                            <div class="pl-12">
                                {{ csrf_field() }}
                                @foreach($choices as $id => $choice)
                                <div class="flex items-center mr-4 mb-4">
                                    <input id="radio{{$id}}" type="radio" name="word_id" class="hidden" value="{{$id}}" />
                                    <label for="radio{{$id}}" class="flex items-center cursor-pointer text-xl">
                                        <span class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
                                        {{ $choice }}
                                    </label>
                                </div>
                                @endforeach
                                    <input type="hidden" name="spanish_word_id" value="{{ $spanish_word->id }}">
                            </div>
                            <div class="px-6 py-3 text-left sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
@section('scripts')
    <script>

    </script>
@endsection

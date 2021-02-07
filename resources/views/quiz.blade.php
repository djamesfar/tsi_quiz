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
                    For each word in Spanish, select the correct meaning in English.<br />
                    Quiz will be graded after 10 words.
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 style="font-size: x-large; font-weight: bold; font-style: italic">{{ $spanish_word->word }}</h1>
                    Select the correct meaning in English:
                    <form action="/storeAnswer" method="POST">
                        <div class="mx-auto max-w-sm">
                            <div class="pl-12">
                                {{ csrf_field() }}
                                @foreach($choices as $choice)
                                <div class="flex items-center mr-4 mb-4" >
                                    <input id="radio{!! $choice['id'] !!}" type="radio" name="word_id" class="hidden" value="{{$choice['id']}}" />
                                    <label for="radio{{$choice['id']}}" class="flex items-center cursor-pointer text-xl radio-label">
                                        <span class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
                                        {{ $choice['word'] }}
                                    </label>
                                </div>
                                @endforeach
                                    <input type="hidden" name="spanish_word_id" value="{{ $spanish_word->id }}">
                                    <input type="hidden" name="test_id" value="{{ $test_id }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
{{--@section('scripts')--}}
    <script>
        $().ready(function (){
            $('.radio-label').on('click', function (){
                $('input#'+$(this).attr("for")).prop('checked', true)
                $('form').submit()
            })
        })
    </script>
{{--@endsection--}}

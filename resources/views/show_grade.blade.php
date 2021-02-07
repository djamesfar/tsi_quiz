<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz Results') }}
        </h2>
    </x-slot>
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-6 bg-white  border-gray-200">
                        <ul>
                            <li>Correct: {{$correct}}</li>
                            <li>Incorrect: {{$wrong}}</li>
                            <li>Score: {{ number_format(($correct /($correct+$wrong) *100)) }}%</li>
                        </ul>
{{--                        <h1 style="font-size: x-large; font-weight: bold; font-style: italic">Correct:   Incorrect: {{ $wrong }} Grade: {{ number_format(($correct /($correct+$wrong) *100)) }}%</h1>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.all.min.js"></script>
<script>
    const correct = {{ $correct }};
    const wrong = {{ $wrong }};
    const score = parseInt(correct/(correct + wrong) * 100);

    // change response message and icon based on score
    const response = (score >= 80) ? {title:"Good Job!", icon: 'success'} :
        (score >= 70) ? {title:"Pretty Good!", icon: 'success'} :
            (score >= 50) ? {title:"Need to study..", icon: 'error'} :
                {title:"So Spanish is not your thing...", icon: 'question'}

    const msg = "<h1>You got <strong>"+ score +"%</strong></h1>"

    Swal.fire({
        title: response.title,
        icon: response.icon,
        html: msg,
        showCloseButton: true
    })
</script>

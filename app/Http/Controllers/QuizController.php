<?php

namespace App\Http\Controllers;

use App\Models\EnglishWord;
use App\Models\SpanishWord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{

    public function index()
    {

    }

    public function showQuiz()
    {
        $spanish_word = SpanishWord::inRandomOrder()->first();
        $answer = $spanish_word->meaning->word;
        // get 4 random words, excluding the answer
        $choices = EnglishWord::where('word','!=',$answer)->inRandomOrder()->limit(4)->pluck('word', 'id')->toArray();
        // add the correct word to array
        $choices [$spanish_word->id] = $answer;
        Log::info("english words: ".var_export($choices, true));
        // sort results (so correct answer is not always last in list)
        asort($choices);
        Log::info("sorted words: ".var_export($choices, true));
        return view('quiz', compact('spanish_word', 'answer', 'choices'));
    }

    public function gradeQuiz(Request $request)
    {
        Log::info($request->input());

    }

    public function showGrade($quiz_id = null)
    {

    }
}

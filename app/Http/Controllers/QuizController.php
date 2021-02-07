<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\EnglishWord;
use App\Models\SpanishWord;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{

    public function index()
    {

    }

    public function showQuiz($test_id = null)
    {
        if(!$test_id){
            // start a new test
            $user_id = auth()->user()->id;
            Log::info("quiz::showQuiz: user_id: $user_id");
            $test = Test::create([
                'user_id' => $user_id,
            ]);
        } else {
            // use the passed test
            $test = Test::find($test_id);
        }
        $test_id = $test->id;
        $question_num = $test->answers->count();
        // if we've hit 10 questions, go grade it
        if($question_num >= 10)
            return redirect()->route('grade', ['test_id'=>$test_id]);

        Log::info("showQuiz: question count: $question_num");
        $wordsAlreadyUsed = $test->answers->pluck('spanish_word_id');
        $spanish_word = SpanishWord::whereNotIn('id', $wordsAlreadyUsed)->inRandomOrder()->first();
        $answer = $spanish_word->meaning->word;
        // get 4 random words, excluding the answer
        $choices = EnglishWord::select('word','id')->where('word','!=',$answer)->inRandomOrder()->limit(4)->get()->toArray();
        // add the correct word to array
        $choices [] = ['id'=>$spanish_word->meaning->id, 'word'=> $answer];
        // sort results (so correct answer is not always last in list)
        sort($choices);

        return view('quiz', compact('spanish_word', 'answer', 'choices', 'test_id'));
    }

    public function storeAnswer(Request $request)
    {
        Log::info("Quiz::storeAnswer: request: ". var_export($request->input(), true));
        $test = Test::find($request->test_id);
        $answer = $test->answers()->create([
            'english_word_id' => $request->word_id,
            'spanish_word_id' => $request->spanish_word_id,
        ]);
        return redirect()->route('quiz', ['test_id'=> $test->id]);
    }

    public function gradeQuiz($test_id)
    {
        $test = Test::find($test_id);
        $answers = $test->answers;      // get the related answers
        $correct = $wrong = 0;
        foreach ($answers as $answer) {
            if($answer->englishWord->id === $answer->spanishWord->meaning->id){
                $correct++;
            } else {
                $wrong++;
            }
        }
        Log::info("gradeQuiz: correct: $correct, wrong: $wrong, percentage: ". ($correct / ($correct+$wrong) *100) . "%");
        return view('show_grade', compact('correct', 'wrong'));
    }
}

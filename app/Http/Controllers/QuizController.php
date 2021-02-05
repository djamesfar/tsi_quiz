<?php

namespace App\Http\Controllers;

use App\Models\SpanishWord;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index()
    {

    }

    public function showQuiz()
    {
        $spanish_word = SpanishWord::all()->random()->first();
        return view('quiz', compact('spanish_word'));
    }

    public function gradeQuiz(Request $request)
    {

    }

    public function showGrade($quiz_id = null)
    {

    }
}

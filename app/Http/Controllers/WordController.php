<?php

namespace App\Http\Controllers;

use App\Models\EnglishWord;
use App\Models\SpanishWord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;

class WordController extends Controller
{
    public function index()
    {

    }

    public function addWords()
    {

        return view('words.add');
    }

    public function store(Request $request)
    {
        Log::info("request: ".var_export($request->input(), true));
        // Save words into tables
        $spanish = SpanishWord::create([
            'word' => $request->spanish_word,
        ]);
        $english = EnglishWord::create([
            'word' => $request->english_word,
        ]);
        // relate the words
        $english->meaning()->associate($spanish)->save();
        $spanish->meaning()->associate($english)->save();
        Flash::success("Word was added!");
        return back();
    }

    public function edit($word)
    {

    }
}

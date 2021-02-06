<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('quiz', [QuizController::class, 'showQuiz'])->name('quiz');
Route::post('quiz', [QuizController::class, 'gradeQuiz'])->name('grade');
Route::get('addWords', [WordController::class, 'addWords'])->name('addWords');
Route::get('words', [WordController::class, 'index'])->name('words.index');
Route::post('words', [WordController::class, 'store'])->name('words.store');
require __DIR__.'/auth.php';

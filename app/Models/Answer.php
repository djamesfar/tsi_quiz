<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['english_word_id', 'spanish_word_id'];

    public function test()
    {
        return $this->hasMany(Test::class);
    }

    public function spanishWord()
    {
        return $this->belongsTo(SpanishWord::class, 'spanish_word_id');
    }

    public function englishWord()
    {
        return $this->belongsTo(EnglishWord::class, 'english_word_id');
    }
}

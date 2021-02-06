<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpanishWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'word', 'english_word_id'
    ];

    public function meaning()
    {
        return $this->belongsTo(EnglishWord::class, 'english_word_id');
    }
}

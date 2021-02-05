<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'word', 'spanish_word_id'
    ];

    public function meaning()
    {
        return $this->belongsTo(SpanishWord::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class Attempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentId',
        'quizId',
        'marks',
    ];

    public function quiz(){
        return $this->belongsTo(Quiz::class, 'quizId');
    }
    public function total(){
        return $this->quiz->questions->count();
    }

}

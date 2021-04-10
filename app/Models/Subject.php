<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function chapters(){
        return $this->hasMany(Chapter::class,'subject_id');
    }

    public function quizzes(){
        return $this->hasMany(Quiz::class, 'subject_id');
    }
    
    public function questions(){
        return Question::whereIn('chapter_id', $this->chapters->pluck('id'))
        ->get();
    }
    public function myquestions(){
        return Question::whereIn('chapter_id', $this->chapters->pluck('id'))
        ->where('teacher_id', session('user')->profile->id)
        ->get();
    }
    
}

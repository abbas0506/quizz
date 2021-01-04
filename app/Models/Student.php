<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'levelId',
        'semesterNo',
        'rollNo',
    ];

    public function attemptedQuizzes(){
        return $this->hasMany('App\Models\Attempt','studentId');
    }

    public function relevantQuizzes(){

    }
    public function unattemptedQuizzes(){

    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'subjectId',
        'teacherId',
        'status',
        'description',
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacherId');
      }
    
    public function subject(){
        return $this->belongsTo(Subject::class,'subjectId');
      }

    public function questions(){
        return $this->hasMany(Question::class,'quizId');
      }
    
      public function attempts(){
        return $this->hasMany(Attempt::class,'quizId');
      }

    public function marks(){
        return $this->questions()->count();
      }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'levelId',
        'subjectId',
        'teacherId',
        'status',
        'description',
    ];

    public function teacher(){
        return $this->belongsTo('App\Models\User','teacherId');
      }
    public function level(){
        return $this->belongsTo('App\Models\Level','levelId');
      }
      public function subject(){
        return $this->belongsTo('App\Models\Subject','subjectId');
      }

      public function questions(){
        return $this->hasMany('App\Models\Question','quizId');
      }

      public function total(){
        return $this->questions()->count();
      }

}

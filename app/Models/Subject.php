<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function quizzes(){
        return $this->hasMany('App\Models\Quiz','subjectId');
    }
    public function quizzesAtLevel($levelId){
        return $this->hasMany('App\Models\Quiz','subjectId')
                ->where('levelId',$levelId);
    }




}

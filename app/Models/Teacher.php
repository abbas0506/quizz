<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'bonus',
        'user_id',
    ];

    public function profile(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    /*
     * all following functions are related to specifically teacher,   
     * because no sepearte model has been designed for teacher
    */
    public function quizzes(){
        return $this->hasMany('App\Models\Quiz','teacherId');
    }
    public function quizzesBySubjectId($subjectId){
        return $this->quizzes->where('subjectId',$subjectId);
    }
    
    
}

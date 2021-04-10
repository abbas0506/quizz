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
    public function contribution_subjects(){
        //subjects having contribution
        $subject_ids=Chapter::distinct()
        ->join('questions', 'questions.chapter_id','chapters.id' )
        ->select('subject_id')
        ->where('teacher_id',$this->id)
        ->get();
       
        return Subject::whereIn('id',$subject_ids)->get();
        
    }
    public function nocontribution_subjects(){
        //subjects having no contribution
        return Subject::all()->diff($this->contribution_subjects());
        
    }
    
    
}

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

    public function profile(){
        return $this->belongsTo('App\Models\User','userId');
    }

    public function level(){
        return $this->belongsTo('App\Models\Level', 'levelId');
    }

    public function subjects(){
        $subjects=collect();
        
        $plans=$this->level->plans($this->semesterNo);
        foreach($plans as $plan){
            $subjects->push($plan->subject);
        }
        return $subjects;
    }

    public function quizzes(){
        
        //find subjects of student, and then collect quizzes for the subjects
        $quizzes=collect();
        foreach($this->subjects() as $subject){
            foreach($subject->quizzes as $quiz)
                $quizzes->push($quiz);
        }
        return $quizzes;
    }
    public function quizzesBySubjectId($subjectId){
        return $this->quizzes()->where('subjectId',$subjectId);
    }

    public function attempts(){
        return $this->hasMany('App\Models\Attempt','studentId');
    }
    
    public function attemptsBySubjectId($subjectId){
        $attempts=collect();
        foreach($this->attempts as $attempt){
            if($attempt->quiz->subjectId==$subjectId)
                $attempts->push($attempt);
        }
        return $attempts;

    }
    
    public function pendingQuizzes(){
        return $this->quizzes()->diff($this->attemptedQuizzes());
    }
    public function pendingQuizzesBySubjectId($subjectId){
        return $this->quizzesBySubjectId($subjectId)->diff($this->attemptedQuizzesBySubjectId($subjectId));
    }

    public function attemptedQuizzes(){
        $quizzes=collect();
        foreach($this->attempts as $attempt){
            $quizzes->push($attempt->quiz);
        }
        return $quizzes;
    }

    public function attemptedQuizzesBySubjectId($subjectId){
        return $this->attemptedQuizzes()->where('subjectId',$subjectId);
        
    }
    
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;

use App\Models\Student;
use App\Models\Level;
use App\Models\User;
use App\Models\Subject;
use App\Models\Quiz;
use App\Models\Test;
use App\Models\Plan;


class AttemptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attemptedQuizzes=
        // find quizzes for current student
        $id=session('userId');
        $student=Student::where('userId',$id)->first();
        
        $levelId=$student->levelId;
        
        //find all subjects  of current student during current semester
        // $allSubjectIds=Plan::where('levelId',$student->levelId)
        //     ->where('semesterNo', $student->semesterNo)
        //     ->distinct('subjectId')
        //     ->pluck('subjectId')
        //     ->toArray();

        // $subjects=Subject::whereIn('id', $allSubjectIds)->get();
        
        //find all attempted
        $attemptedQuizIds=Test::where('studentId',$student->id)->get();
        
        //find all relevant quizzes for current student
        // $relevantQuizzes=Quiz::whereIn('subjectId',$allSubjectIds)->get();

        //$quizzes=$relevantQuizzes;
        
        //echo "student:".$student->name;
        // $quizzes=Quiz::where('levelId', $student->levelId)->get();
        return view('attempts.index', compact('attemptedQuizzes'));
  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'marks' => 'required',
        ]);
        
        $student=Student::where('userId',session('userId'))->first();
        
        $result = new Attempt([
            'studentId' => $student->id,
            'quizId' => session('quizId'),
            'marks' => $request->marks,
        ]);

        //store marks for next page
        session([
            'obtained'=> $request->marks,
            
        ]);
        
        $result->save();
        return response()->json(['msg'=>"Successfully submitted"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

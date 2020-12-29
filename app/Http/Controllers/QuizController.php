<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use App\Models\Quiz;
use App\Models\Subject;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all levels and number of quizzes for current user
        $id=session('userId');
        $user=User::find($id);
              
        $levels=Level::all();
        return view('quizzes.index', compact('user','levels'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("quizzes.create");
        
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
            'weekNo' => 'required',
        ]);
        
        $quiz=new Quiz([
            'teacherId'=>session('userId'),
            'levelId'=>session('levelId'),
            'subjectId'=>session('subjectId'),
            'weekNo'=>$request->weekNo,
            'description'=>$request->description,

        ]);

        $quiz->save();
        
        session(['quizId'=>$quiz->id]);
        return redirect('./quizzes/'.session('levelId').'/'.session('subjectId'));
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
        $quiz=Quiz::findOrFail($id);
        return view("quizzes.show", compact('quiz'));


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
        $quiz=Quiz::findOrFail($id);
        $levelId=$quiz->level->id;
        $subjectId=$quiz->subject->id;
        $quiz->delete();
        
        return redirect('./quizzes/'.$levelId.'/'.$subjectId);
    }
    
    public function expandLevel($levelId){
              
        $teacherId=session('userId');
        $quizzes=Quiz::where('teacherId', $teacherId)
        ->where('levelId', $levelId)
        ->orderBy('weekNo')
        ->get();
        
        //save selected level
        session(['levelId' => $levelId]);

        $subjects=Subject::all();

        $level=Level::find($levelId);
        
        return view('quizzes.expandLevel', compact('level','subjects'));
    }

    public function expandSubject($levelId, $subjectId){
              
        $teacherId=session('userId');
        $quizzes=Quiz::where('teacherId', $teacherId)
        ->where('levelId', $levelId)
        ->where('subjectId', $subjectId)
        ->orderBy('weekNo')
        ->get();

        //save selected level
        session(['subjectId' => $subjectId]);

        $level=Level::find($levelId);
        $subject=Subject::find($subjectId);
        
        
        return view('quizzes.expandSubject', compact('level','subject','quizzes'));
    }

    public function showQuizDetail($id){
        $quiz=Quiz::findOrFail($id);
        return view("quizzes.show", compact('quiz'));
    }


    
}

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
        //generates quiz detail for specific user
        $id=session('userId');
        $user=User::find($id);
        
        //whereIn requires an array, so convert the plucked col into array
        $userQuizLevelIds=Quiz::where('teacherId',$user->id)->distinct('levelId')->pluck('levelId')->toArray();

        $levels=Level::whereIn('id', $userQuizLevelIds)->get();
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
        $subjects=Subject::all();
        return view('quizzes.create',compact('subjects'));
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
            'subjectId' => 'required',
        ]);
        
        $quiz=new Quiz([
            'levelId'=>session('levelId'),
            'subjectId'=>$request->subjectId,
            'weekNo'=>session('weekNo'),
            'teacherId'=>session('userId'),

        ]);

        $quiz->save();
        
        session(['quizId'=>$quiz->id]);
        return redirect('./quizdetail/'.$quiz->id);
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
    public function storeFilter(Request $request){
        $request->validate([
            'levelId' => 'required',
            'weekNo' => 'required',
        ]);
        //save quiz description and go to quiz detail
        session(['levelId' => $request->levelId]);
        session(['weekNo' => $request->weekNo]);
        
        return redirect('/quizzes/create');
    }

    public function expandLevel($levelId){
              
        $teacherId=session('userId');
        $quizzes=Quiz::where('teacherId', $teacherId)
        ->where('levelId', $levelId)
        ->orderBy('weekNo')
        ->get();

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

        $subject=Subject::find($subjectId);
        $level=Level::find($levelId);
        
        return view('quizzes.expandSubject', compact('level','subject','quizzes'));
    }

    public function showByLevelSubject($levelId, $subjectId){
        $teacherId=session('userId');
        $quizzes=Quiz::where('teacherId', $teacherId)
        ->where('levelId', $levelId)
        ->where('subjectId', $subjectId)
        ->orderBy('weekNo')
        ->get();

        $level=Level::find($levelId);
        $subject=Subject::find($subjectId);    
        return view('quizzes.showBySubject', compact('level','subject','quizzes'));
    }

    public function showQuizDetail($id){
        $quiz=Quiz::findOrFail($id);
        return view("quizzes.show", compact('quiz'));
    }


    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        
            $teacherId=session('userId');
            $quizzes=Quiz::where('levelid', session('levelId'))
            ->where('weekNo', session('weekNo'))
            ->where('teacherId', session('userId'))     //userId contains teacher id
            ->get();
            
            return view('quizzes.index', compact('quizzes'));
        
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
        return redirect('/quizzes/'.$quiz->id);
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
        $quiz->delete();
        return redirect('/quizzes');
    }
    public function storeFilter(Request $request){
        $request->validate([
            'levelId' => 'required',
            'weekNo' => 'required',
        ]);
        //save quiz description and go to quiz detail
        session(['levelId' => $request->levelId]);
        session(['weekNo' => $request->weekNo]);
        
        return redirect('/quizzes');
    }
}

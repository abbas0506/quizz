<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Subject;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $levelId=session('levelId');
        $quizzes = Quiz::where('levelId', $levelId)
            ->get();
            
        return view('tests.index', compact('quizzes'));
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
            'sname' => 'required',
            'levelId' => 'required',
            'rollNo' => 'required',
            'semesterNo' => 'required',
            
        ]);
        //store filter inputs
        session([
            'sname' => $request->sname,
            'levelId' => $request->levelId,
            'semesterNo' => $request->semesterNo,
            'rollNo' => $request->rollNo
            ]);
        
            //$subjectIdsWhoseTestsAreAvailable=Quiz::pluck('subjectId')->
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //store quiz id for next pages
        session(['quizId'=>$id]);   

        $quiz=Quiz::findOrFail($id);
        return view('tests.show',compact('quiz'));
        
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
    public function subjects(){
        //list of subjects whose tests are available
        $subjectIds=Quiz::where('levelId', session('levelId'))->distinct('subjectId')->pluck('subjectId')->toArray();
        
        $subjects=Subject::whereIn('id',$subjectIds)->get();
        return view("tests.subjects", compact('subjects'));
    }
}

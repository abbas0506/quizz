<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
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
        $weekNo=session('weekNo');
        
        $quizzes = Quiz::where('levelId', $levelId)
            ->where('weekNo', $weekNo )
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
            'levelId' => 'required',
            'rollNo' => 'required',
            'weekNo' => 'required',
            'sname' => 'required',
        ]);
        //store filter inputs
        session([
            'levelId' => $request->levelId,
            'weekNo' => $request->weekNo,
            'sname' => $request->sname,
            'rollNo' => $request->rollNo
            ]);
        
        return redirect("/tests");
        
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Level;
use App\Models\Subject;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name' =>'required',
            'phone' => 'required',
            'password' => 'required',
            'levelId' => 'required',
            'semesterNo' => 'required',
            'rollNo' => 'required',
            
        ]);
        
        //$quizId=session('quizId');
        $student=new Student([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'password'=>$request->password,
            'levelId'=>$request->levelId,
            'semesterNo'=>$request->semesterNo,
            'rollNo'=>$request->rollNo,
            ]);
        
        $student->save();
        $subjects=Subject::all();
        return redirect("../tests/subjects", compact('subjects'));
        
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
    public function signup(){
        $levels=Level::all();
        return view('students.signup', compact('levels'));
    }
}

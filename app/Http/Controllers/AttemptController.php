<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;

use App\Models\User;
use App\Models\Student;
use App\Models\Attempt;

class AttemptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // find attempted quizzes for current student
        $id=session('userId');
        $student=Student::where('userId',$id)->first();
        
        return view('tests.attempts.index', compact('student'));
  
        
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
            'quizId'=> 'required',
            'marks' => 'required',
        ]);
        
        try{
            $student=User::findOrFail(session('userId'))->student;
            $attempt = new Attempt([
                'studentId' => $student->id,
                'quizId' => $request->quizId,
                'marks' => $request->marks,
            ]);

            $attempt->save();
            return redirect('./attempts/'.$attempt->id);
        }catch(Exception $ex){
            return redirect()->back()->withErrors(['Error!','It seems as if you have tried to re-attempt same quiz']);
        }
        
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
        $attempt=Attempt::findOrFail($id);
        return view('tests.attempts.show', compact('attempt'));
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

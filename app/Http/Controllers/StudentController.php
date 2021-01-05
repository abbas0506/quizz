<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Level;
use App\Models\User;
use App\Models\Subject;
use App\Models\Quiz;
use App\Models\Test;
use App\Models\Plan;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // find quizzes for current student
        $id=session('userId');
        $student=Student::where('userId',$id)->first();
        return view('students.index', compact('student'));
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
        //save student
        $request->validate([
            'name' =>'required',
            'phone' => 'required',
            'password' => 'required',
            'levelId' => 'required',
            'semesterNo' => 'required',
            'rollNo' => 'required',
            
        ]);
        
        //first save into users table
        DB::beginTransaction();
        try{
            $user=new User([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'password'=>$request->password,
                'type'=>session('usertype'),

            ]);
            $user->save();
            $userId=$user->id;
            
            //then save into student table
            $student=new Student([
                'userId'=>$userId,
                'levelId'=>$request->levelId,
                'semesterNo'=>$request->semesterNo,
                'rollNo'=>$request->rollNo,
                ]);
            
            $student->save();
            
            session([
                'userId'=>$userId,
                'userName'=>$user->name,
            ]);
            DB::commit();
            
            if($user->type=='student') 
                return redirect('./students/signupSuccess');
            else 
                return redirect('./students/signupFailure');

        }catch(Exception $ex){
            DB::rollBack();
            return redirect('./signin')->with(['failure'=>'Singup error']);
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
        //show student signup form
        $levels=Level::all();
        return view('students.signup', compact('levels'));
    }
}

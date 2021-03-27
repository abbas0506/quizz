<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Exception;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Teacher;

class UserController extends Controller
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
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        /*
        * Since single sign in page is being used by all types of users
        * so write code for each user's signup
        */

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
    
    /*
     * Save user access type,
     * required untill user gets signed in or signed up
     */ 
    
    /*
     * Handle signin process
     * verify user credentials and direct to concerned page
     */ 
    public function signin(Request $request){
        $request->validate([
            'id' => 'required',
            'password' => 'required'
        ]);
        
        $user=User::where('id','=', $request->id)
            ->where('password','=',$request->password)
            ->first();
        
        if($user){
            //authenticated, save into session
            session([
                'user_id' => $user->id,
                'usertype' => $user->usertype,
                ]);
            
            if($user->usertype=='student') return redirect('./students');
            if($user->usertype=='teacher') return redirect('./teachers');
            if($user->usertype=='admin') return redirect('./home');
            
        }else {
            return redirect('/')->with('error',"Either ID or password invalid!");
        }
    }
    
    public function signup(Request $request){
        $request->validate([
            'name' =>'required',
            'phone' => 'required',
            'password' => 'required',
            'usertype'=>'required',
            ]);

        //try to save into parent users table
            
        DB::beginTransaction();
        try{
            $user=new User([
                'id'=>$request->phone,
                'password'=>$request->password,
                'usertype'=>$request->usertype,

            ]);
                
            $user->save();
            
            //if student
            if($request->usertype=='student'){
                $student=new Student([
                    'name'=>$request->name,
                    'phone'=>$request->phone,
                    'grade_id'=>$request->grade_id,
                    'section'=>$request->section,
                    'rollNo'=>$request->rollNo,
                    'user_id'=>$request->phone,
                    ]);
                    
                $student->save();
    
            }
                
            //if teacher
            if($request->usertype=='teacher'){
                $teacher=new Teacher([
                    'name'=>$request->name,
                    'phone'=>$request->phone,
                    'email'=>$request->email,
                    'user_id'=>$request->phone,
                    ]);
                    
                $teacher->save();
    
            }
            
            session([
                'role'=>$request->usertype,
                'user_id'=>$request->phone,
            ]);
            DB::commit();
            
            //return response()->json(['msg'=>"Successful signup"]);
            return redirect('./signup_success');
        }catch(Exception $ex){
            DB::rollBack();
            //return response()->json(['msg'=>$ex->getMessage()]);
            return redirect('./')->with(['failure'=>$ex->getMessage()]);
        }

        
        
        
        //return view('users.signup',compact('Grades'));
  
    }  
    
    /*
     * Handle signout process
     * dispose off session object
     */ 
    
    
     public function signout(){
        session()->flush();
        return redirect ('/');
    }

}

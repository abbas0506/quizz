<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Exception;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;

class UserController extends Controller
{
     
    public function signin(Request $request){
        $request->validate([
            'loginid' => 'required',
            'password' => 'required'
        ]);
        
        $user=User::where('loginid','=', $request->loginid)
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
            return redirect()->back()->with('error', "Either ID or password incorrect");   
            
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
        
        try{
            
            DB::beginTransaction();
            
            $user=new User([
                'loginid'=>$request->phone,
                'password'=>$request->password,
                'usertype'=>$request->usertype,
    
            ]);
    
            $user->save();
            
            //if teacher
            if($request->usertype=='teacher'){
                $teacher=new Teacher([
                    'name'=>$request->name,
                    'phone'=>$request->phone,
                    'email'=>$request->email,
                    'user_id'=>$user->id,
                    ]);
                    
                $teacher->save();
    
            }
            
            //if student
            if($request->usertype=='student'){
                $student=new Student([
                    'name'=>$request->name,
                    'phone'=>$request->phone,
                    'grade_id'=>$request->grade_id,
                    'section'=>$request->section,
                    'rollNo'=>$request->rollNo,
                    'user_id'=>$user->id,
                    ]);
                    
                $student->save();

            }
            session([
                'usertype'=>$request->usertype,
                'user_id'=>$user->id,
            ]);
            
            DB::commit();
            //echo $user->id;
            return redirect('./signup_success');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
            
        }

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

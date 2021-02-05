<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Exception;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Level;
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

        $request->validate([
            'usertype'=>'required',
            'name' =>'required',
            'phone' => 'required',
            'password' => 'required',
            
            ]);

        //try to save into parent users table
            $userType=$request->usertype;
            DB::beginTransaction();
            try{
                $user=new User([
                    'name'=>$request->name,
                    'phone'=>$request->phone,
                    'password'=>$request->password,
                    'type'=>$userType,

                ]);
                
                $user->save();
                
                //if student
                if($userType=='student'){
                    $student=new Student([
                        'userId'=>$user->id,
                        'levelId'=>$request->levelId,
                        'semesterNo'=>$request->semesterNo,
                        'rollNo'=>$request->rollNo,
                        ]);
                    
                    $student->save();
    
                }
                
                //if teacher
                if($userType=='teacher'){
                    $teacher=new Teacher([
                        'userId'=>$user->id,
                        ]);
                    
                    $teacher->save();
    
                }
                session([
                    'role'=>$user->type,
                    'userId'=>$user->id,
                ]);
                DB::commit();
                return redirect('./signup_success');
            
            }catch(Exception $ex){
                DB::rollBack();
                return redirect('./signup')->with(['failure'=>$ex->getMessage()]);
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
            'phone' => 'required',
            'password' => 'required'
        ]);
        
        $phone=$request->phone;
        $user=User::where('phone','=', $phone)->first();
        
        if($user){
            if($request->password==$user->password){
                //authenticated
                session(['userId' => $user->id]);
                
                if($user->type=='student'){
                    session(['role'=>'student']);
                    return redirect('./students');
                }
                    
                if($user->type=='teacher'){
                        session(['role'=>'teacher']);
                        return redirect('./teachers');
                    }
                    
                if($user->type=='admin'){
                    session(['role'=>'admin']);
                    return redirect('./home');
                }
                
            }else{
                return redirect('/signin')->with('error',"Either phone or password invalid!");
            }
        }else {
            return redirect('/signin')->with('error',"Either phone or password invalid!");
        }
    }
    
    public function signup(){
        $levels=Level::all();
        return view('users.signup',compact('levels'));
  
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

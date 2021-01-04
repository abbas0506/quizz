<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $subjects=Subject::all();
        // return view('quizParams', compact('subjects'));

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
        // $request->validate([
        //     'usertype' => 'required',
        // ]);
        // $usertype=$request->usertype;
        // $subjects=Subject::all();
        
        // return redirect ('./quizparams');
       
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
    public function signIn(Request $request){
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
                    session(['role'=>'teacher']);
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
    public function signUp(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required'
        ]);
        
        $user=new User([
            'name' => Str::title($request->name),
            'phone' => $request->phone,
            'password' => $request->password,
            
        ]);
        $user->save();
        session(['userId' => $user->id]);
        return redirect("./quizzes");

    }

}

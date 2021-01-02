<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subject;
use Exception;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all subjects 
         
              
        $subjects=Subject::all();
        return view('subjects.index', compact('subjects'));
        
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
            'name' => 'required',
         ]);
        
         $subject=new Subject([
            'name'=>$request->name,
         ]);

         try{
            $subject->save();
            return redirect("./subjects")->with('success','Successfully added');

         }catch(Exception $ex){
            return redirect("./subjects")->with('error',$ex->getMessage()); 
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
        $subject=Subject::findOrFail($id);
        return view("subjects.edit", compact('subject'));
        
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
      $subject=Subject::findOrFail($id);
      $subject->name=$request->name;
      try{
         $subject->save();
         return redirect('./subjects')->with('success','Successfully updated');
      }catch(Exception $ex){
          return redirect('./subjects')->with('error',$ex->getMessage());
      }

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
        $subject=Subject::findOrFail($id);
        try{
            $subject->delete();
            return response()->json(['msg'=>"successfully removed"]);
        }catch(Exception $ex){
            //if error
            return response()->json(['msg'=>$ex->getMessage()]);
        }
        
    }
    
    

    
}

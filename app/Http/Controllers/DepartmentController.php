<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use Exception;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all Departments 
         
              
        $departments=Department::all();
        return view('departments.index', compact('departments'));
        
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
        
         $department=new Department([
            'name'=>$request->name,
         ]);

         try{
            $department->save();
            return redirect("/departments")->with('success','Successfully added');

         }catch(Exception $ex){
            return redirect("/departments")->with('error',$ex->getMessage()); 
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
        $department=Department::findOrFail($id);
        return view("departments.edit", compact('department'));
        
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
      $department=Department::findOrFail($id);
      $department->name=$request->name;
      try{
         $department->save();
         return redirect('/departments')->with('success','Successfully updated');
      }catch(Exception $ex){
          return redirect('/departments')->with('error',$ex->getMessage());
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
        
        $department=Department::findOrFail($id);
        try{
            //try to delete
            $department->delete();
            return response()->json(['msg'=>"successfully removed"]);
        }catch(Exception $ex){
            //if error
            return response()->json(['msg'=>$ex->getMessage()]);
        }
        
    }
    
    

    
}

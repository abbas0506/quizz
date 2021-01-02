<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Level;
use Exception;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all levels 
         
              
        $levels=level::all();
        return view('levels.index', compact('levels'));
        
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
            'numOfSemesters'=>'required',
         ]);
        
         $level=new level([
            'name'=>$request->name,
            'numOfSemesters'=>$request->numOfSemesters,
            ]);

         try{
            $level->save();
            return redirect("./levels")->with('success','Successfully added');

         }catch(Exception $ex){
            return redirect("./levels")->with('error',$ex->getMessage()); 
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
        $level=level::findOrFail($id);
        return view("levels.edit", compact('level'));
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
      $level=level::findOrFail($id);
      $level->name=$request->name;
      $level->numOfSemesters=$request->numOfSemesters;
      try{
         $level->save();
         return redirect('/levels')->with('success','Successfully updated');
      }catch(Exception $ex){
          return redirect('/levels')->with('error',$ex->getMessage());
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
        $level=Level::findOrFail($id);
        try{
            //try to delete
            $level->delete();
            return response()->json(['msg'=>"successfully removed"]);
        }catch(Exception $ex){
            //if error
            return response()->json(['msg'=>$ex->getMessage()]);
        }
        
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;

use App\Models\Level;
use App\Models\Plan;
use App\Models\Subject;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $levels=level::all();
        return view('plans.index', compact('levels'));
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
            'levelId' => 'required',
            'semesterNo'=>'required',
            'subjectIds'=>'required',
        ]);
        
        $subjectIds=$request->subjectIds;

        $subjectIds_array=explode(',',$subjectIds);

         $is_error=false;
         $error_msg='';

         for($i=0; $i<count($subjectIds_array);$i++){
            $plan=new Plan([
                'levelId'=>$request->levelId,
                'semesterNo'=>$request->semesterNo,
                'subjectId' =>$subjectIds_array[$i],
                ]);
    
            try{
                $plan->save();
               
            }catch(Exception $ex){
                $is_error=true;
                $error_msg=$ex->getMessage();
                break;
            }

         }

        if($is_error)
            return redirect("./plans")->with('error',$error_msg);
        else
            return redirect("./plans")->with('success','Successfully added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($levelId)
    {
        //
        $plannedSubjectIds=Plan::where('levelId',$levelId)
            ->distinct('subjectId')
            ->pluck('subjectId')
            ->toArray();

        $subjects=Subject::whereNotIn('id', $plannedSubjectIds)->get();
        $subjectsHtml='';
        
        foreach($subjects as $subject){
            $subjectsHtml.="<div class='flex flex-row'>
                                <div class='w-20 text-center'><input type='checkbox' id='chksubject' value='".$subject->id."'></div>
                                <div class='w-80'>".$subject->name."</div>
                            </div>";

        }
        return response()->json(['msg'=>$subjectsHtml]);

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
        $plan=Plan::findOrFail($id);
        try{
            //try to delete
            $plan->delete();
            return response()->json(['msg'=>"successfully removed"]);
        }catch(Exception $ex){
            //if error
            return response()->json(['msg'=>$ex->getMessage()]);
        }


    }
    
}

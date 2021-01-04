<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
            'quizId' =>'required',
            'statement' => 'required',
            'optionA' => 'required',
            'optionB' => 'required',
            'optionC' => 'required',
            'optionD' => 'required',
            'ans' => 'required',
        ]);
        
        //$quizId=session('quizId');
        $question=new Question([
            'quizId'=>$request->quizId,
            'statement'=>$request->statement,
            'optionA'=>$request->optionA,
            'optionB'=>$request->optionB,
            'optionC'=>$request->optionC,
            'optionD'=>$request->optionD,
            'ans'=>$request->ans

            ]);
        
        $question->save();
        return redirect("./quizzes/".$request->quizId)->with(['success'=>"Successfully created"]);
        
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
        $question=Question::find($id);
        return view('questions.edit', compact('question'));
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
        $request->validate([
            'statement' => 'required',
            'optionA' => 'required',
            'optionB' => 'required',
            'optionC' => 'required',
            'optionD' => 'required',
            'ans' => 'required',
        ]);

        $question=Question::findOrFail($id);
        $question->statement=$request->statement;
        $question->optionA=$request->optionA;
        $question->optionB=$request->optionB;
        $question->optionC=$request->optionC;
        $question->optionD=$request->optionD;
        $question->ans=$request->ans;

        $question->save();

        
        return redirect('./quizzes/'.$question->quiz->id)->with(['success'=>"Successfully updated"]);
        


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
        $question=Question::findOrFail($id);
        $quizId=$question->quiz->id;
        $question->delete();
        
        return redirect('./quizzes/'.$quizId)->with(['success'=>"Successfully deleted"]);

    }
}

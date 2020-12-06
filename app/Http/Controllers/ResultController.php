<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

class ResultController extends Controller
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
        $request->validate([
            'marks' => 'required',
            'total' => 'required',
        ]);
        
        $result = new Result([
            'quizId' => session('quizId'),
            'rollNo' => session('rollNo'),
            'sname' => session('sname'),
            'marks' => $request->marks,
            'total' => $request->total,
        ]);

        //store marks for next page
        session([
            'marks'=> $request->marks,
            'total'=> $request->total,

        ]);
        
        $result->save();
        return response()->json(['msg'=>'Submitted']);
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

        
        $result=Result::where('quizId',$id)->first();
        return view('results.show', compact('result'));


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
}

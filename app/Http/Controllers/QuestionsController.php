<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Question;
use App\Topic;
use Session;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Questions.index')
        ->with('questions',Question::all())
        ->with('classes',Classes::all());
    }
    public function all()
    {
        return view('Questions.all')
        ->with('questions',Question::all())
        ->with('classes',Classes::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Questions.create')
        ->with('classes',Classes::all())
        ->with('topics',Topic::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'level'=>'required',
            'class'=>'required',
            'question'=>'required',
            'marks'=>'required',
            'topic'=>'required'
        ]);
        Question::create([
            'level'=>$request->level,
            'class'=> $request->class,
            'marks'=>$request->marks,
            'topic'=>$request->topic,
            'question'=>$request->question
        ]);
        Session::flash('success','Question Successfully Posted');
        return redirect()->back();
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
}

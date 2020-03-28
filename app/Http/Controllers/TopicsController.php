<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use Session;
use App\Topic;
class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Topics.index')->with('topics',Topic::all());
    }
    public function all()
    {
        return view('Topics.all')->with('topics',Topic::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Topics.create')->with('classes',Classes::all());
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
            'topic'=>'required'
        ]);
        Topic::create([
            'level'=>$request->level,
            'class'=>$request->class,
            'topic'=>$request->topic
        ]);
        Session::flash('success','Topic Successfully Added');
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
        $topic=Topic::find($id);
        if(is_null($topic) || $topic->count()==0){
            Session::flash('error','The topic does not Exist, Come back later');
            return redirect()->back();
        }
        return view('Topics.edit')
        ->with('topic',$topic)
        ->with('classes',Classes::all());
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
        $topic=Topic::find($id);
        if(is_null($topic) || $topic->count()==0){
            Session::flash('error','The topic does not Exist, Come back later');
            return redirect()->back();
        }
        $topic->level=$request->level;
        $topic->class=$request->class;
        $topic->topic=$request->topic;
        $topic->save();
        Session::flash('success','Topic has been Updated Successfully');
        return redirect()->back();
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

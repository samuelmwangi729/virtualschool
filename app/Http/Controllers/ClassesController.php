<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use Session;
class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('classes.index')->with('classes',Classes::all());
    }
    public function all()
    {
        return view('classes.all')->with('classes',Classes::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create');
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
            'className'=>'required'
        ]);
        $found=Classes::where('className',$request->className)->get()->count();
        if($found>0){
            Session::flash('error','Duplicate Entry. Class Already Exists');
            return redirect()->back();
        }
        Classes::create([
            'level'=>$request->level,
            'className'=>$request->className
        ]);
        Session::flash('success','Class Successfully Added');
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

        $class=Classes::find($id);
        if(is_null($class) || $class->count()==0){
            Session::flash('error','The class Is Not Available');
            return redirect()->back();
        }
        return view('classes.edit')->with('class',$class);
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
        $this->validate($request,[
            'className'=>'required'
        ]);
        $class=Classes::find($id);
        if(is_null($class) || $class->count()==0){
            Session::flash('error','The class Is Not Available');
            return redirect()->back();
        }
        $class->level=$request->level;
        $class->className=$request->className;
        $class->save();
        Session::flash('success','The class has been Successfully Updated');
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
        $class=Classes::find($id);
        if(is_null($class) || $class->count()==0){
            Session::flash('error','The class Is Not Available');
            return redirect()->back();
        }
        $class->destroy($id);
        Session::flash('error','Class Successfully Deleted');
        return redirect()->back();
    }
}

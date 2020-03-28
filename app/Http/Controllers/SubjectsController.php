<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Subject;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subjects.index')->with('subjects',Subject::all());
    }
    public function all()
    {
        return view('subjects.all')->with('subjects',Subject::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
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
            'subjectCode'=>'required',
            'subjectName'=>'required'
        ]);
        Subject::create([
            'level'=>$request->level,
            'subjectCode'=>$request->subjectCode,
            'subjectName'=>$request->subjectName,
            'status'=>0
        ]);
        Session::flash('success','Subject Successfully Added');
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
        $subject=Subject::find($id);
        if(is_null($subject)){
            Session::flash('error','No Such Subject');
            return redirect()->back();
        }
        if($subject->count()==0){
            Session::flash('error','No Subjects Currently Posted, :Come back Later');
            return redirect()->back();
        }
        return view('subjects.edit')->with('subject',$subject);
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
            'level'=>'required',
            'subjectCode'=>'required',
            'subjectName'=>'required'
        ]);
        $subject=Subject::find($id);
        if(is_null($subject) || $subject->count()==0){
            Session::flash('error','The Subject does not exist');
            return redirect()->back();
        }
        $subject->level=$request->level;
        $subject->subjectCode=$request->subjectCode;
        $subject->subjectName=$request->subjectName;
        $subject->save();
        Session::flash('success','Details Successfully Updated');
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
        $subject=Subject::find($id);
        if(is_null($subject) || $subject->count()==0){
            Session::flash('error','Sebject Does Not Exist');
            return redirect()->back();
        }
        $subject->destroy($id);
        Session::flash('error','Subject Deleted');
        return redirect()->back();
    }
}

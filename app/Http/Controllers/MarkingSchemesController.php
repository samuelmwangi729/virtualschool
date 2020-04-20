<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Subject,MarkingScheme};
use Session;
class MarkingSchemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markingSchemes=MarkingScheme::all();
        return view('MarkingScheme.Index')->with('markingSchemes',$markingSchemes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects=Subject::all();
        return view('MarkingScheme.Create')->with('subjects',$subjects);
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
            'Subject'=>'required',
            'MarkingScheme'=>'required|mimes:pdf'
        ]);
        $file=$request->file('MarkingScheme');
        $NewName=time().$file->getClientOriginalName();
        $file->move('MarkingSchemes',$NewName);
        MarkingScheme::create([
            'Subject'=>$request->Subject,
            'FileName'=>'MarkingSchemes/'.$NewName
        ]);
        Session::flash('success','Marking Scheme Successfully Uploaded');
        $markingSchemes=MarkingScheme::all();
        return redirect(route('markingscheme.index'))->with('markingSchemes',$markingSchemes);
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

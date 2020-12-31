<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Classes,Topic,CurrentWeek,Subject,Record};
use Auth;
use Session;
class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get the current week and then pass it over to the view
        // return Record::orderBy('id','desc')->get()->take(10)
        $currentWeek = CurrentWeek::all();
        return view('Records.Index')
        ->with('Records',Record::orderBy('id','desc')->get()->take(10))
        ->with('Class',Classes::all())
        ->with('Subject',Subject::all())
        ->with('Topics',Topic::all())
        ->with('CurrentWeek',$currentWeek);
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
        $rules=[
            'Subject'=>'required',
            'Classs'=>'required',
            'Date'=>'required',
            'Week'=>'required',
            'Lesson'=>'required',
            'Topic'=>'required',
            'Reference'=>'required',
            'Remarks'=>'required',
        ];
        $this->validate($request,$rules);
       $record=Record::create([
        'School'=>Auth::user()->schoolName,
        'Owner'=>Auth::user()->uid,
        'Subject'=>$request->Subject,
        'Class'=>$request->Classs,
        'Date'=>$request->Date,
        'Week'=>$request->Week,
        'Lesson'=>$request->Lesson,
        'Topic'=>$request->Topic,
        'Reference'=>$request->Reference,
        'Remarks'=>$request->Remarks,
       ]);
       if($record){
           $value="The record has Been Successfully saved";
           $request->session()->flash('success', $value);
           return back();
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
        $record= Record::findOrFail($id);
        if($record){
            return view('Records.Single')->with('record',$record);
        }
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
        return "hehe";
    }
}

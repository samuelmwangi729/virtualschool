<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\{TimeTable,CurrentWeek};
use Session;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $week=CurrentWeek::all()->last()->Week;
        $timetables=TimeTable::where('Week',$week)->get();
        // dd(json_encode($timetables));
        return view('TimeTable.index')
        ->with('timetables',$timetables)
        ->with('subjects',Subject::all());
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
        $this->validate($request,[
            'Week'=>'required',
            'Subject1'=>'required',
            'Subject2'=>'required',
            'Subject3'=>'required'
        ]);
        TimeTable::create([
            'Week'=>$request->Week,
            'Day'=>$request->Day,
            'Date'=>$request->Date,
            'Subject1'=>$request->Subject1,
            'Subject2'=>$request->Subject2,
            'Subject3'=>$request->Subject3,
        ]);
        Session::flash('success','TimeTable Successfully Updated');
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

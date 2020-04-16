<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Auth;
use Session;
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Registration.Index');
    }

    public function all(){
        $requests=Registration::all();
        return view('Registration.All')->with('requests',$requests);
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
            'TransactionId'=>[
                'required',
                'unique:registrations'
            ]
        ]);
        $uid=Auth::user()->uid;
        Registration::create([
            'TransactionId'=>strtoupper($request->TransactionId),
            'UniqueIdentifier'=>$uid
        ]);
        Session::flash("success","Transaction Code Successfully Sent");
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
        $transaction=Registration::find($id);
        if(empty($transaction)){
            Session::flash("error","Transaction Not Found");
            return redirect()->back();
        }
        return view('Registration.Edit')->with('transaction',$transaction);
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
            'TransactionId'=>[
                'required'
            ]
        ]);
        $transaction=Registration::find($id);
        if(empty($transaction)){
            Session::flash("error","Transaction Not Found");
            return redirect()->back();
        }
        $transaction->TransactionId=strtoupper($request->TransactionId);
        $transaction->save();
        Session::flash("success",'Transaction Code Successfully Updated');
        return redirect(route('users.request'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $transaction=Registration::find($id);
        if(empty($transaction)){
            Session::flash("error","Transaction Not Found");
            return redirect()->back();
        }
        $transaction->Status=1;
        $transaction->Used=1;
        $transaction->save();
        Session::flash("success",'Transaction  Successfully Approved');
        return redirect(route('users.request'));

    }
    public function reject($id)
    {
        $transaction=Registration::find($id);
        if(empty($transaction)){
            Session::flash("error","Transaction Not Found");
            return redirect()->back();
        }
        $transaction->Status=0;
        $transaction->Used=0;
        $transaction->save();
        Session::flash("error",'Transaction  Successfully Rejected');
        return redirect(route('users.request'));

    }
}

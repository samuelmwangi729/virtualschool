<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Suspend;
use Session;
use Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('isAdmin','=',0)->get();
        return view('Users.index')->with('users',$users);
    }

    public function create(){
        return view('Users.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function suspend($uid)
    {
        Suspend::create([
            'id'=>$uid,
        ]);
        Session::flash('error','User Successfully Suspended');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'pname'=>'required'
        // ]);
        User::create([
            'name' => $request->name,
            'Gender' => $request->Gender,
            'pname' => $request->pname,
            'email' => $request->email,
            'dob' => $request->dob,
            'uid' => $request->uid,
            'level' => $request->level,
            'isInd'=>$request->isInd,
            'schoolName' => $request->schoolName,
            'password' => Hash::make($request->password),
        ]);
        Session::flash('success','User Successfully Added');
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
        $user=Suspend::find($id);
        if(is_null($user) || $user->count()==0){
            Session::flash('error','User Does Not Exist');
            return redirect()->back();
        }
        $user->destroy($id);
        Session::flash('success','User Successfully Restored');
        return redirect()->back();
    }
}

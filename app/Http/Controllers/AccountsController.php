<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use Session;
use App\User;

class AccountsController extends Controller
{
    public function index(){
        $output=str_split(Auth::user()->uid,5);
        return view('Account.account')->with('output',$output);
    }
    public function update(Request $request){
        $this->validate($request,[
            'NewPassword'=>'required',
            'PasswordConfirmation'=>'required'
        ]);
        if($request->NewPassword==$request->PasswordConfirmation){
            $user=User::find(Auth::user()->id);
            $user->password=Hash::make($request->NewPassword);
            $user->save();
            Session::flash('success','Password Successfully Changed');
            return redirect()->back();
        }else{
            Session::flash('error','Error,The passwords Do Not Match');
            return redirect()->back();
        }
    }
}

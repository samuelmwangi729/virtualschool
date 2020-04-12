<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Files;
use App\Question;
use App\Student;
use App\Payment;
use Auth;
use App\User;
use App\Marked;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $output=str_split(Auth::user()->uid,5);
        $amount=Payment::all();
        $sum=0;
        foreach($amount as $amt){
            $sum=$sum+$amt->Amount;
        }
        return view('home')
        ->with('files',Files::all()->count())
        ->with('output',$output)
        ->with('students',Student::all()->count())
        ->with('amount',$sum)
        ->with('Marked',Marked::all()->count())
        ->with('users',User::count());
    }
}

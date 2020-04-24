<?php

namespace App\Http\Middleware;

use Closure;
use App\Suspend;
use Auth;
use Session;

class Suspended
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
    // {
        if((Suspend::where('id','=',Auth::user()->id)->get())->count()>0){
            Session::flash('error','Your Account has been suspended.Contact the Administrator for Support');
            return redirect()->route('index');
        }else{
        return $next($request);
        }

    }
}

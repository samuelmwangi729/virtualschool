<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Files;
use Auth;
class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Files.all');
    }
   
    public function file(Request $request){
        $this->validate($request,[
            'level'=>'required',
            'questionPaper'=>'required',
            'topic'=>'required'
        ]);
        // $file=$request->get('questionPaper');
        // $newFileName=$file->getClientOriginalName();
        // $file->move('uploads/',$newFileName);
        // Files::create([
        //     'fileName'=>$newFileName,
        //     'uploadedBy'=>Auth::user()->name,
        //     'BelongsTo'=>Auth::user()->name.','.Auth::user()->schoolName,
        // ]);
        // Session::flash('success','Answer Sheet successfully Uploaded');
        // return redirect()->back();
        dd($request->all());
    }
    /**
     * Show the form for creating a new resource.                                                                                                                           
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Files.create');
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
            'file'=>'required',
            'subject'=>'required'
        ]);
        $file=$request->file;
        $fileMimeType=$file->getmimeType();
        $extension=explode('/',$fileMimeType);
        $extensions=array('pdf');
        $newFileName=time().$file->getClientOriginalName();
        if(in_array($extension[1],$extensions)){
            $file->move('uploads/',$newFileName);
            Files::create([
                'fileName'=>$newFileName,
                'uploadedBy'=>Auth::user()->name,
                'BelongsTo'=>Auth::user()->name.','.Auth::user()->schoolName,
                'Subject'=>$request->subject
            ]);
            Session::flash('success','Answer Sheet successfully Uploaded');
            return redirect()->back();
        }else{
            Session::flash('error','Unknown File extension: Allowed: .pdf Only');
            return redirect()->back();
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
        //
    }
    public function all(){
        //this will show all the files uploaded
        $files=Files::all();
        // dd(response()->json($files, 200));
        if(is_null($files)){
            return redirect()->back();
            Session::flash('error','No Files Uploaded');
        }
        return view('Files.view')->with('files',$files);
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

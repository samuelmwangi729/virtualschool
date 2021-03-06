<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Files;
use Auth;
use App\Payment;
use App\Marked;
use App\Price;
use App\Subject;
use App\Registration;
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
        $subjects=Subject::all();
        return view('Files.create')->with('subjects',$subjects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function sstore(Request $request)
    {
        $this->validate($request,[
            'file'=>'required',
            'subject'=>'required',
            'uid'=>'required'
        ]);
        $file=$request->file;
        $fileMimeType=$file->getmimeType();
        $extension=explode('/',$fileMimeType);
        $extensions=array('pdf');
        $newFileName=time().$file->getClientOriginalName();
        if(in_array($extension[1],$extensions)){
            $file->move('uploads/',$newFileName);
            Marked::create([
                'fileName'=>$newFileName,
                'uploadedBy'=>Auth::user()->name,
                'BelongsTo'=>$request->uid,
                'Subject'=>$request->subject
            ]);
            Session::flash('success','Answer Sheet successfully Uploaded');
            return redirect()->back();
        }else{
            Session::flash('error','Unknown File extension: Allowed: .pdf Only');
            return redirect()->back();
        }
    }
public function markedSingle(){
    $papers=Marked::where('belongsTo','=',Auth::user()->uid)->get();
    if(count($papers)==0){
        Session::flash('error','No papers Avaliable. Check Later');
        return redirect()->back();
    }
    return view('Files.Marked')->with('papers',$papers);
}
    public function store(Request $request)
    {
        $PaymentDetails=Payment::where('TransactionId',$request->TransactionCode)->take(1)->first();
        if(is_null($PaymentDetails)){
            Session::flash('error','Transaction code does not exist,Contact Us for support');
            return redirect()->back();
        }
        // dd($PaymentDetails);
        $Prices=Price::where('PaperType','Single Paper')->first();
        if(is_null($Prices)){
            Session::flash('error','Marking Prices have not been set. Please try again later');
            return redirect()->back();
        }
        $AmountNeeded=$Prices->Amount;
        if($PaymentDetails->Amount <  $AmountNeeded){
            Session::flash('error','Please Pay the Exact Amount for your Paper to be Uploaded,Needed Ksh.'. $AmountNeeded);
            return redirect()->back();
        }
        $PaidAmount=$PaymentDetails->Amount;
        $PaymentDetails->Amount=$PaidAmount-$Prices->Amount;
        $PaymentDetails->save();
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
        if(Auth::user()->isAdmin==1){
            $files=Files::where('id','>=','1')->paginate(10);
        }else if(Auth::user()->isInd==1){
            $files=Files::where('uploadedBy',Auth::user()->name)->paginate(10);
        }
        else{
            $files=Files::where('BelongsTo',Auth::user()->schoolName)->paginate(10);
        }
        // dd(response()->json($files, 200));
        if(is_null($files)){
            return redirect()->back();
            Session::flash('error','No Files Uploaded');
        }
        return view('Files.view')->with('files',$files);
    }
    public function marked(){
        if(Auth::user()->isInd==0){
            //this will show all the files uploaded
        $files=Marked::where('BelongsTo',Auth::user()->schoolName)->paginate(10);
        // dd(response()->json($files, 200));
        if(is_null($files)){
            return redirect()->back();
            Session::flash('error','No Files Uploaded');
        }
        return view('Files.marked')->with('files',$files);
        }else{
            //this will show all the files uploaded
        $files=Marked::where('BelongsTo',Auth::user()->uid)->paginate(10);
        // dd(response()->json($files, 200));
        if(is_null($files)){
            return redirect()->back();
            Session::flash('error','No Files Uploaded');
        }
        return view('Files.marked')->with('files',$files);
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
        $this->validate($request,[
            'Answersheet'=>'required'
        ]);
        $file=$request->file('Answersheet');
        $newName=time().$file->getClientOriginalName();
        $file->move('uploads/',$newName);
        $file=Files::find($id)->first();
        if(is_null($file)|| $file->count()==0){
            Session::flash('error','File Not Found');
            return back();
        }
        $file->fileName=$newName;
        $file->save();
        Session::flash('success','File Successfully Edited');
        if(Auth::user()->isAdmin==1){
            $files=Files::where('id','>=','1')->paginate(10);
        }else if(Auth::user()->isInd==1){
            $files=Files::where('uploadedBy',Auth::user()->name)->paginate(10);
        }
        else{
            $files=Files::where('BelongsTo',Auth::user()->schoolName)->paginate(10);
        }
        // dd(response()->json($files, 200));
        return redirect(route('files.view'))->with('files',$files);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file=Files::find($id)->first();
        if(is_null($file)|| $file->count()==0){
            Session::flash('error','File Not Found');
            return back();
        }
        $file->destroy($id);
        Session::flash('error','file Successfully Deleted');
        return redirect()->back();
    }
    public function sshow($id)
    {
        $file=Files::find($id)->first();
        if(is_null($file)|| $file->count()==0){
            Session::flash('error','File Not Found');
            return back();
        }
        return view('Files.Edit')->with('file',$file);
    }
}


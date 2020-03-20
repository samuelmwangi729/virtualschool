<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Auth;
use Session;
use App\User;
use App\Subject;
class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fileName="Marksheet.pdf";
        $mpdf=new \Mpdf\Mpdf([
            'margin_left'=>10,
            'margin_top'=>21,
            'margin_right'=>10,
            'margin_bottom'=>50,
            'margin_header'=>10,
            'margin_footer'=>10,
        ]);
        $students=Student::where('SchoolAffiliate',Auth::user()->schoolName)->get();
        $html= \View::make('Results.marksheet')->with('students',$students);
        $html=$html->render();
        $mpdf->SetWatermarkText(config('app.name'));
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->SetHeader('Marksheet Page {PAGENO}');
        // $mpdf->SetFooter('{PAGENO}');
        // $stylesheet=file_get_contents(url('/css/bootstrap.css'));
        // $mpdf->WriteHTML($stylesheet,1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
        // return view('Results.marksheet')
        // ->with('students',Student::where('SchoolAffiliate',Auth::user()->schoolName)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('results.post')->with('students', $students=Student::where('SchoolAffiliate',Auth::user()->schoolName)->get());
    }
    public function bulk(){
        return view('Results.Bulk')
        ->with('schools',user::where('isInd',0)->get())
        ->with('subjects',Subject::all());
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
            'school'=>'required',
            'subject'=>'required',
        ]);
        $filesArray=[];
        $files=$request->file('files');
        foreach($files as $file){
            //the user now knows not the filename
            //never trust the user 
            $newFile= time() . $file->getClientOriginalName();
            array_push($filesArray,$newFile);
        }
        //limit the number of files uploaded = the number of registered students 
        $students=Student::where('SchoolAffiliate',Auth::user()->schoolName)->get();
        if(count($filesArray) != count($students)){
            Session::flash('error','Upload exactly '.count($students).' Copies of Answersheets');
            return redirect()->back();
        }
        dd();
        //upload the files with the schools name on them 
        if(count($filesArray)>0){
            for($i=0;$i<count($filesArray);$i++){
                Files::create([
                    'fileName'=>$filesArray[$i],
                    'uploadedBy'=>Auth::user()->name,
                    'BelongsTo'=>$request->school,
                    'Subject'=>$request->subject
                ]);
            }
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

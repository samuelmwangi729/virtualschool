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
    public function Print(){
        return View('Records.Subject')
        ->with('Classes',Classes::all())
        ->with('Subjects',Subject::all());
    }
    protected function Printer(Request $request){
        $rule=[
            'Subject'=>'required',
            'Class'=>'required'

    ];
        $this->validate($request,$rule);
        $subject=$request->Subject;
        $Owner=Auth::user()->uid;
        $Record=Record::where([
            ['Owner','=',$Owner],
            ['Subject','=',$subject],
            ['Class','=',$request->Class],
        ])->get();
        if(count($Record)==0){
            // Session::flash('error',);
            $request->session()->flash('error', 'No records Available Under Sub Category');
            return back();
        }
        $fileName=Auth::user()->schoolName." Records Of Work Covered.pdf";
        $mpdf=new \Mpdf\Mpdf([
            'margin_left'=>10,
            'margin_top'=>21,
            'margin_right'=>10,
            'margin_bottom'=>50,
            'margin_header'=>10,
            'margin_footer'=>10,
        ]);
        $mpdf->SetHeader(Auth::user()->schoolName.'| <h2>Records of Work Covered '.date('Y').'</h2> |   {PAGENO}');
        $mpdf->AddPage('L');
        $html= \View::make('Records.Print')
        ->with('Class',$request->Class)
        ->with('Records',$Record)
        ->with('Subject',$subject);
        $html=$html->render();
        // $mpdf->Image('/img/logo.jpg',90,210);
        $mpdf->SetWatermarkText(config('app.name'));
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->SetFooter('<i>Software designed and developed by Samuel Mwangi, Tel: 0713529784</i>');
        // $stylesheet=file_get_contents(url('/css/bootstrap.css'));
        // $mpdf->WriteHTML($stylesheet,1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
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
    public function destroy(Request $request,$id)
    {
        $record=Record::findOrFail($id);
        if($record){
            $record->delete();
            $value="Record Successfully Deleted";
            $request->session()->flash('error', $value);
            return back();
        }
    }
}

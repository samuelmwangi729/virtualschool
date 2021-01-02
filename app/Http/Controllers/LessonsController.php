<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\{Classes,Topic,CurrentWeek,Subject,Record,Lesson};
class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Lessons.Index')
        ->with('Subjects',Subject::all())
        ->with('Classes',Classes::all())
        ->with('Topics',Topic::all());
    }

    protected function all(){
        return view('Lessons.All')->with('Lessons',Lesson::all());
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
        'Class'=>'required',
        'TimeIn'=>'required',
        'TimeOut'=>'required',
        'UsualNumber'=>'required',
        'PresentNumber'=>'required',
        'Subject'=>'required',
        'Topic'=>'required',
        'Date'=>'required',
        'Objectives'=>'required',
        'Evaluation'=>'required',
        ];
        $this->validate($request,$rules);
        // dd();
        $lesson=Lesson::create([
            'Owner'=>Auth::user()->uid,
            'Class'=>$request->Class,
            'TimeIn'=>$request->TimeIn,
            'TimeOut'=>$request->TimeOut,
            'UsualNumber'=>$request->UsualNumber,
            'PresentNumber'=>$request->PresentNumber,
            'Subject'=>$request->Subject,
            'Topic'=>$request->Topic,
            'Date'=>$request->Date,
            'Objectives'=>$request->Objectives,
            'Evaluation'=>$request->Evaluation,
        ]);
        if($lesson){
            $value="Lesson Plan Successfully Created";
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
        $lesson=Lesson::findOrFail($id);
        if($lesson){
            return view('Lessons.One')->with('Lesson',$lesson);
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
        $lesson=Lesson::findOrFail($id);
        return view('Lessons.Single')
        ->with('Subjects',Subject::all())
        ->with('Classes',Classes::all())
        ->with('Topics',Topic::all())
        ->with('Lesson',$lesson);
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
        // dd($id);
        $lesson=Lesson::findOrFail($id);
        if($lesson){
            $lesson->Class=$request->Class;
            $lesson->TimeIn=$request->TimeIn;
            $lesson->TimeOut=$request->TimeOut;
            $lesson->UsualNumber=$request->UsualNumber;
            $lesson->PresentNumber=$request->PresentNumber;
            $lesson->Subject=$request->Subject;
            $lesson->Topic=$request->Topic;
            $lesson->Date=$request->Date;
            $lesson->Objectives=$request->Objectives;
            $lesson->Evaluation=$request->Evaluation;
            $lesson->save();
            $value="Lesson Plan Successfully Updated";
            $request->session()->flash('success', $value);
            return redirect(route('lessons.all'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       $lesson=Lesson::findOrFail($id);
       if($lesson){
           $lesson->delete();
           $value="Lesson Plan Successfully Deleted";
           $request->session()->flash('error', $value);
           return back();
       }
    }
    public function print($id){
        $lesson=Lesson::findOrFail($id);
        $fileName=Auth::user()->name." Lesson Plan.pdf";
        $mpdf=new \Mpdf\Mpdf([
            'margin_left'=>10,
            'margin_top'=>21,
            'margin_right'=>10,
            'margin_bottom'=>50,
            'margin_header'=>0,
            'margin_footer'=>10,
        ]);
        $mpdf->SetHeader(Auth::user()->name.'| |  Lesson Plan Printed On '.date('d-m-Y'));
        $mpdf->AddPage('P');
        $html= \View::make('Lessons.Print')->with('Lesson',$lesson);
        $html=$html->render();
        // $mpdf->Image('/img/logo.jpg',90,210);
        $mpdf->SetWatermarkText(config('app.name'));
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->SetFooter('{PAGENO}||<i>Software designed and developed by Samuel Mwangi, Tel: 0713529784</i>');
        // $stylesheet=file_get_contents(url('/css/bootstrap.css'));
        // $mpdf->WriteHTML($stylesheet,1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
    }
}

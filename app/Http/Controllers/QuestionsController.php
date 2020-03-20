<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Question;
use App\Topic;
use App\Subject;
use Session;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Questions.index')
        ->with('questions',Question::all())
        ->with('classes',Classes::all());
    }
    public function file()
    {
        return view('Questions.fileQuestions')
        ->with('classes',Classes::all())
        ->with('topics',Topic::all());
    }
    public function all()
    {
        return view('Questions.all')
        ->with('questions',Question::all())
        ->with('classes',Classes::all())
        ->with('topics',Topic::all());;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Questions.create')
        ->with('classes',Classes::all())
        ->with('topics',Topic::all())
        ->with('subjects',Subject::all());
    }
    Public function view(){
        return view('Questions.Select')
        ->with('classes',Classes::all())
        ->with('topics',Topic::all())
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
            'level'=>'required',
            'class'=>'required',
            'question'=>'required',
            'marks'=>'required',
            'topic'=>'required'
        ]);
        Question::create([
            'level'=>$request->level,
            'class'=> $request->class,
            'subject'=>$request->subject,
            'marks'=>$request->marks,
            'topic'=>$request->topic,
            'question'=>$request->question
        ]);
        Session::flash('success','Question Successfully Posted');
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
    public function print(Request $request){
        // dd($request->all());
        $questions=Question::where([
            'level'=>$request->level,
            'class'=>$request->class,
            'subject'=>$request->subject,
            'topic'=>$request->topic
        ])->get();
        if(count($questions)<=0){
            Session::flash('error','No Questions Set, Please check back later');
            return redirect()->back();
        }
        else{
            $fileName="Questions.pdf";
            $mpdf=new \Mpdf\Mpdf([
                'margin_left'=>10,
                'margin_top'=>21,
                'margin_right'=>10,
                'margin_bottom'=>50,
                'margin_header'=>10,
                'margin_footer'=>10,
            ]);
            $html= \View::make('questions')->with('questions',$questions);
            $html=$html->render();
            $mpdf->SetWatermarkText(config('app.name'));
            $mpdf->watermark_font = 'DejaVuSansCondensed';
            $name=config('app.name');
            $mpdf->SetHeader('Virtual School '.$request->subject.'<br>'.$request->level.' '.$request->class.' Class <br>'.$request->topic.' Topic Questions<br>Printed on '.date('Y/M/D').'');
            $mpdf->SetFooter('{PAGENO}');
            // $stylesheet=file_get_contents(url('/css/bootstrap.css'));
            // $mpdf->WriteHTML($stylesheet,1);
    
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName,'I');
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

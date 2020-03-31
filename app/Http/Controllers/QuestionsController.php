<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Question;
use App\Topic;
use App\Subject;
use App\fileQuestion;
use Session;
use App\Student;
use Auth;
use DNS2D;
use DNS1D;
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
        ->with('subjects',Subject::all())
        ->with('topics',Topic::all());
    }
    public function ffile(Request $request){
        $question=fileQuestion::where([
            'class'=>$request->class,
            'subject'=>$request->subject
        ]);
        if(is_null($question) || $question->count()==0){
            Session::flash('error','Questions Not Set, Please Come Back Later');
            return redirect()->back();
        }
        return redirect()->back()
        ->with('questions',fileQuestion::all())
        ->with('subjects',Subject::all())
        ->with('classes',Classes::all());
    }
    public function all()
    {
        return view('Questions.all')
        ->with('questions',Question::all())
        ->with('classes',Classes::all())
        ->with('subjects',Subject::all())
        ->with('topics',Topic::all());
    }
    public function filter(Request $request){
        $question=Question::where([
            'subject'=>$request->subject,
            'class'=>$request->class
        ])->get();
        if(is_null($question) || $question->count()==0){
            Session::flash('error','Questions Not Set, Please Come Back Later');
            return redirect()->back();
        }
        return redirect()->back()
        ->with('classes',Classes::all())
        ->with('subjects',Subject::all())
        ->with('topics',Topic::all())
        ->with('questions',$question);
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

    Public function qfiles(){
        return view('Questions.qfiles')
        ->with('questions',fileQuestion::all())
        ->with('subjects',Subject::all())
        ->with('classes',Classes::all());
    }
    public function answersheet(){
       return view('answersheet')
       ->with('classes',Classes::all())
        ->with('topics',Topic::all())
        ->with('subjects',Subject::all());
    }
    public function answers(Request $request){
        $fileName="AnswerSheet.pdf";
            $mpdf=new \Mpdf\Mpdf([
                'margin_left'=>10,
                'margin_top'=>21,
                'margin_right'=>10,
                'margin_bottom'=>50,
                'margin_header'=>10,
                'margin_footer'=>10,
            ]);
            $html= \View::make('answer')->with('uid',Auth::user()->uid);
            $html=$html->render();
            $mpdf->SetWatermarkText(config('app.name'));
            $mpdf->watermark_font = 'DejaVuSansCondensed';
            $mpdf->SetHeader('Virtual School '.$request->subject.' AnswerSheet <br>'.$request->level.' '.$request->class.' Class <br>Printed on '.date('Y/M/D').'<br><br><div class="pull-right">Unique Identifier...........................................</span>&nbsp;School: '.Auth::user()->schoolName);
            $image='<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4haman", "C39+",3,33,array(1,1,1), true);
            $mpdf->SetFooter('Clearly Number All the Questions {PAGENO}');    
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName,'I');
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
    public function fstore(Request $request)
    {
        $this->validate($request,[
            'level'=>'required',
            'class'=>'required',
            'subject'=>'required',
            'questionfile'=>'required',
            'topic'=>'required'
        ]);
        $file=$request->questionfile;
        $newFileName=time().$file->getClientOriginalName();
        $destination_path=public_path('/uploads');
        $file->move($destination_path,$newFileName);
        fileQuestion::create([
            'level'=>$request->level,
            'class'=> $request->class,
            'subject'=>$request->subject,
            'questionfile'=>$newFileName,
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
        $question=Question::find($id);
        if(is_null($question) || $question->count()==0){
            Session::flash('error','The Question Does Not Exist');
            return redirect()->back();
        }
        return view('Questions.edit')
        ->with('classes',Classes::all())
        ->with('topics',Topic::all())
        ->with('subjects',Subject::all())
        ->with('question',$question);
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
            'level'=>'required',
            'class'=>'required',
            'question'=>'required',
            'marks'=>'required',
            'topic'=>'required'
        ]);
        $question=Question::find($id);
        if(is_null($question) || $question->count()==0){
            Session::flash('error','The Question Does Not Exist');
            return redirect()->back();
        }
        $question->level=$request->level;
        $question->class= $request->class;
        $question->subject=$request->subject;
        $question->marks=$request->marks;
        $question->topic=$request->topic;
        $question->question=$request->question;
        $question->save();
        Session::flash('success','Question Successfully Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question=Question::find($id);
        if(is_null($question) || $question->count()==0){
            Session::flash('error','The Question Does Not Exist');
            return redirect()->back();
        }
        $question->destroy($id);
        Session::flash('error','The Question Has been Deleted');
        return redirect()->back();
    }
}

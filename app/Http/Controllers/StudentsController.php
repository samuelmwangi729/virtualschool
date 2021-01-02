<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Session;
use Auth;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::where('SchoolAffiliate',Auth::user()->schoolName)->paginate(10);
        return view('Students.all')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Students.add');
    }

    //to generate the pdf using mpdf
    public function print(){
        $fileName="Students.pdf";
        $mpdf=new \Mpdf\Mpdf([
            'margin_left'=>10,
            'margin_top'=>21,
            'margin_right'=>10,
            'margin_bottom'=>50,
            'margin_header'=>10,
            'margin_footer'=>10,
        ]);
        $students=Student::where('SchoolAffiliate',Auth::user()->schoolName)->get();
        $html= \View::make('pdf')->with('students',$students);
        $html=$html->render();
        // $mpdf->Image('/img/logo.jpg',90,210);
        $mpdf->SetWatermarkText(config('app.name'));
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->SetHeader('VirtualSchool  {PAGENO}');
        // $mpdf->SetFooter('{PAGENO}');
        // $stylesheet=file_get_contents(url('/css/bootstrap.css'));
        // $mpdf->WriteHTML($stylesheet,1);

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
            'StudentName'=>'required',
            'SchoolAffiliate'=>'required',
            'UniqueIdentifier'=>'required',
        ]);
        if($request->hasFile('Passport')){
            // dd(($request->Passport)->extension());
            //get the image details
            $image=$request->Passport;
            $file=time().$image->getClientOriginalName();
            $image->move('uploads/Students/',$file);
        }else{
            $file='default.png';
        }

        Student::create([
            'studentNames'=>$request->StudentName,
            'SchoolAffiliate'=>$request->SchoolAffiliate,
            'UniqueIdentifier'=>$request->UniqueIdentifier,
            'Passport'=>$file,
        ]);
        Session::flash('success','Student Successfully Added');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        $student=Student::where('UniqueIdentifier','=',$uid)->get()->first();
        return view('Students.single')->with('student',$student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $student=Student::where('UniqueIdentifier','=',$uid)->get()->first();
        if(is_null($student)){
            Session::flash('error','No Such Student Exists');
            return redirect()->back();
        }
        if($student->count()==0){
            Session::flash('error','No Such Student Exists');
            return redirect()->back();
        }
        return view('Students.edit')->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $this->validate($request,[
            'StudentName'=>'required'
        ]);
        $student=Student::where('UniqueIdentifier','=',$uid)->get()->first();
        if($student->count()==0){
            Session::flash('error','No Such Student Exist');
            return redirect()->back();
        }
        $student->studentNames=$request->StudentName;
        $student->save();
        Session::flash('success','Student Details Updated');
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
        $student=Student::where('UniqueIdentifier','=',$uid)->get()->first();
        if(is_null($student) || $student->count()==0){
            Session::flash('error','No Such Student Exist');
            return redirect()->back();
        }
        $student->destroy($id);
        Session::flash('error','Student Deleted');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Session;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Payments.create');
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
        $this->validate($request,[
            'TransactionId'=>'required',
            'Amount'=>'required',
            'ClientNumber'=>'required',
            'AccountName'=>'required',
        ]);
        Payment::create($request->all());
        Session::flash('success','Payments Successfully Recorded');
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
    public function Print(){
        $fileName="Payments.pdf";
        $mpdf=new \Mpdf\Mpdf([
            'margin_left'=>10,
            'margin_top'=>21,
            'margin_right'=>10,
            'margin_bottom'=>50,
            'margin_header'=>10,
            'margin_footer'=>10,
        ]);
        $payments=Payment::all();
        $html= \View::make('payments')->with('payments',$payments);
        $html=$html->render();
        // $mpdf->Image('/img/logo.jpg',90,210);
        $mpdf->SetWatermarkText(config('app.name'));
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->SetHeader('VirtualSchool<br>Payments Statements as at '.date('Y-m-d').'');
        $mpdf->SetFooter('{PAGENO}');
        // $stylesheet=file_get_contents(url('/css/bootstrap.css'));
        // $mpdf->WriteHTML($stylesheet,1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
        // return view('payments')->with('payments',);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payments=Payment::find($id);
        if(is_null($payments) || empty($payments)){
            Session::flash('error','the Transaction does  not exist');
            return redirect()->back();
        }
        $payments->destroy($id);
        Session::flash('error','Transaction successfully deleted');
        return back();
    }
    public function showAll(){
        return view('Payments.all')->with('payments',Payment::all());
    }
}

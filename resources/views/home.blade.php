@extends('layouts.main')


@section('content')
@if(!is_null(App\Suspend::find(Auth::user()->id)))
    <h1 class="text-center"><i class="fa fa-exclamation-circle" style="color:red;font-size:40px"></i>Your Account has been suspended!!!<br>Contact the Administrator for help</h1>
    <span></span>
@else
<!-- Small boxes (Stat box) -->
<div class="row">
    <marquee style="color:red;font-weight:bold">For One to upload the AnswerSheet,Kindly Use a   n Android Application to 
        Scan the Document, save it as a pdf and upload it to our site via the upload answersheet section. We recommend an Application called <b>Camscanner</b> which is available in the playstore
    </marquee>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {{ $files }}
                </h3>
                <p>
                    Documents Uploaded
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-file"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    {{ $Marked }}
                </h3>
                <p>
                    Marked Sheets
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    {{ $students }}
                </h3>
                <p>
                    Students Under Institutions
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                   {{ $amount }}
                </h3>
                <p>
                    Paid Amount
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-usd"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->

<!-- top row -->

<!-- /.row -->

<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-6 connectedSortable"> <!-- /.box -->        
        
       
                            
        <!-- Calendar -->
        <div class="small-box bg-red">
            <div class="h3 box-header">
                <i class="fa fa-money"></i>
                <div class="box-title">Pricing</div>
                
                <!-- tools box -->
                @if(Auth::user()->isInd==0)
                <div class="small-box bg-green">
                    <h2>For Institutions: Ksh. {{ App\Price::where('paperType','Bulk Papers')->get()->first()->Amount ?? 0 }} per Paper</h2>
                    <!-- button with a dropdown -->
                    {{-- <div class="btn-group">
                        <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Add new event</a></li>
                            <li><a href="#">Clear events</a></li>
                            <li class="divider"></li>
                            <li><a href="#">View calendar</a></li>
                        </ul>
                    </div> --}}
                </div> 
                @else
                <div class="small-box bg-green">
                    <h2>For Individuals: Ksh. {{ App\Price::where('paperType','Single Paper')->get()->first()->Amount ?? 0 }} Per Paper</h2>
                </div>
                @endif<!-- /. tools -->                                    
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <!--The calendar -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-6 connectedSortable">
       @if(Auth::user()->isAdmin)
       <div class="col-lg-12 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                   {{ $users }}
                </h3>
                <p>
                    Users
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ url('/Users/Index') }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
       @endif

      {{-- <!-- quick email widget -->
      <div class="box box-info">
        <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Quick Email</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div><!-- /. tools -->
        </div>
        <div class="box-body">
            <form action="#" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="Subject"/>
                </div>
                <div>
                    <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </form>
        </div>
        <div class="box-footer clearfix">
            <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
        </div> --}}
    </div>

        <!-- TO DO List -->
    </section><!-- right col -->
</div><!-- /.row (main row) -->
@endif
@stop
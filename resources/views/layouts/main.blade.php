<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('layouts.head')
  <style>
      .treeview-menu li a{
        font-size: 12px !important;
        font-family: 'Courier' !important;
      }
  </style>
<body class="skin-black">
  <header class="header">
    <a class="navbar-brand logo" style="color:#f04d0c;font-weight:bold" href="{{route('index')}}">
        {{-- <img src="img/logo.png" alt="logo"> --}}
        {{ config('app.name') }}
     </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
       @if(Auth::user()->isAdmin)
       @else
       @if(count(App\Registration::where('UniqueIdentifier','=',Auth::user()->uid)->get())==1)
       @if(App\Registration::where('UniqueIdentifier','=',Auth::user()->uid)->get()[0]->Status)
       @else
       <span style="color:red;font-weight:bold;margin-top:20px !important">Account Registration Pending</span>
       @endif
       @else
       <span style="color:red;font-weight:bold;margin-top:20px !important">Account Not Registered</span> <a href="{{route('users.reg')}}" target="_parent" class="btn btn-danger" style="margin-top:10px">Register Here</a>
       @endif
       @endif
       <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span style="font-family:'Courier New', Courier, monospace"> @if(Auth::user()->isInd == 0)
                            {{Auth::user()->schoolName}}
                            @else
                            {{Auth::user()->name}}
                            @endif <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                        <img src="{{asset('img/avatar3.png')}}" class="img-circle" alt="User Image" />
                            <p>
                                @if(Auth::user()->isInd == 0)
                                {{Auth::user()->schoolName}}
                                @else
                                {{Auth::user()->name}}
                                @endif -
                                @if(Auth::user()->isInd == 1)
                                Individual
                                @endif
                                @if(Auth::user()->isInd == 0)
                                Institution
                                @endif
                                @if(Auth::user()->isInd == 2)
                                Examiner
                                @endif
                                <small>Member since:  {{ (Auth::user()->created_at)->toFormatteddateString() }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        {{-- <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li> --}}
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/Account/Status" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" >Sign out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
@if(!is_null(App\Suspend::find(Auth::user()->id)))

@else
<div class="wrapper row-offcanvas row-offcanvas-left">
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="left-side sidebar-offcanvas">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
              <div class="pull-left image">
              <img src="{{asset('img/avatar3.png')}}" class="img-circle" alt="User Image" />
              </div>
              <div class="pull-left info">
              <p STYLE="font-family:courier;font-size:10px;color:#db5518">Hello, {{Auth::user()->uid}}</p>

                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div>
          <!-- search form -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size:10px; font-family:'Courier New', Courier, monospace">
              @if(Auth::user()->isAdmin)
              <li class="active">
              <a href="{{route('home')}}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  </a>
              </li>
              @endif
              @if(Auth::user()->isAdmin || Auth::user()->isInd==2)
              @else
              <li class="nav-link">
                <a href="{{route('users.reg')}}">
                <i class="fa fa-hand-o-down"></i> <span>Register Your Account</span>
                    </a>
                </li>
              @endif
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-bar-chart-o"></i>
                      <span>Subjects</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    @if(Auth::user()->isAdmin)
                        <li><a href="{{route('subject.create')}}" style="font-size:10px; font-family:'Courier New', Courier, monospace"><i class="fa fa-plus"></i> Add Subject</a></li>
                        <li><a href="/Subjects/Manage" style="font-size:10px; font-family:'Courier New', Courier, monospace"><i class="fa fa-times-circle"></i> Manage Subjects</a></li>
                    @endif
                        <li><a href="{{route('subject.all')}}" style="font-size:10px; font-family:'Courier New', Courier, monospace"><i class="fa fa-eye"></i> View Subjects</a></li>
                  </ul>
              </li>
              <li class="treeview">
                <a href="#">
                    <i class="fa fa-building-o"></i>
                    <span>Classes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->isAdmin)
                        <li><a href="{{route('classes.create')}}"><i class="fa fa-plus"></i> Add Class</a></li>
                        <li><a href="{{route('classes.home')}}"><i class="fa fa-times-circle"></i> Manage Classes</a></li>
                    @endif
                    <li><a href="{{route('classes.all')}}"><i class="fa fa-eye"></i> View Classes</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-check-circle"></i>
                    <span>Topics</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->isAdmin)
                        <li><a href="{{route('topics.create')}}"><i class="fa fa-plus"></i> Add Topic</a></li>
                        <li><a href="{{route('topics.home')}}"><i class="fa fa-times-circle"></i> Manage Topics</a></li>
                    @endif
                        <li><a href="{{route('topics.all')}}"><i class="fa fa-eye"></i> View Topics</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Revision Questions</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->isAdmin)
                        <li><a href="{{ route('questions.create') }}"><i class="fa fa-plus"></i> Add Questions</a></li>
                        <li><a href="{{ route('questions.index') }}"><i class="fa fa-times-circle"></i> Manage Questions</a></li>
                    @endif
                        <li><a href="{{route('questions.home')}}"><i class="fa fa-eye"></i> View Questions</a></li>
                        <li><a href="{{route('questions.print')}}"><i class="fa fa-print"></i> Print Questions</a></li>
                </ul>
            </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-file"></i>
                      <span>Answer Sheets</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{route('files.all')}}"><i class="fa fa-plus"></i> Upload Answer Sheet</a></li>
                      <li><a href="{{route('files.view')}}"><i class="fa fa-eye"></i> Uploaded Answer Sheets</a></li>
                      <li><a href="{{route('answersheet.print')}}"><i class="fa fa-print"></i> Print Answer Sheets</a></li>
                  </ul>
              </li>
              @if(Auth::user()->isAdmin || Auth::user()->isInd==0)
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-user"></i> <span>Students</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                  <li><a href="{{route('students.add')}}"><i class="fa fa-plus-circle"></i> Add Students</a></li>
                  <li><a href="{{route('students.all')}}"><i class="fa fa-eye"></i> Manage Students</a></li>
                      <li><a href="{{route('students.print')}}"><i class="fa fa-print"></i> Print Students List</a></li>
                  </ul>
              </li>
              @endif
            {{-- <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i> <span>Bulk Operations</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('students.marksheet')}}"><i class="fa fa-angle-double-right"></i> Print MarkSheets</a></li>
                <li><a href="{{route('marks.post')}}"><i class="fa fa-angle-double-right"></i> Upload AnswerSheets</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i>Print Results</a></li>
            </ul>
            </li> --}}
            @if(Auth::user()->isInd==2 || Auth::user()->isAdmin)
            <li class="treeview">
            <a href="#">
                <i class="fa fa-check-circle"></i> <span>Marked Exams</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('marked.post')}}" target="_parent"><i class="fa fa-check-circle"></i> Upload MarkedSheets</a></li>
                <li><a href="{{route('marked.Single')}}" target="_parent"><i class="fa fa-eye"></i> View Marked Papers</a></li>
                @if(Auth::user()->isAdmin==1 ||  Auth::user()->isInd==2)
                <li><a href="{{route('markingscheme.add')}}" target="_parent"><i class="fa fa-plus"></i>Add  Marking Schemes</a></li>
                @endif
                <li><a href="{{route('markingscheme.index')}}" target="_parent"><i class="fa fa-check-circle"></i> Marking Schemes</a></li>
                {{-- <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i>Print Results</a></li> --}}
            </ul>
            </li>
            @endif
            @if(Auth::user()->isAdmin)
            <li class="treeview">
            <a href="#">
                <i class="fa fa-money"></i> <span>Pricing</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('prices.all')}}" target="_parent"><i class="fa fa-plus-circle"></i>Add Pricing</a></li>
                <li><a href="{{route('prices.view')}}" target="_parent"><i class="fa fa-edit"></i>View Pricing</a></li>
                {{-- <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i>Print Results</a></li> --}}
            </ul>
            </li>
            <li class="treeview">
            <a href="#">
                <i class="fa fa-credit-card"></i> <span>Payments</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('payments.index')}}" target="_parent"><i class="fa fa-plus-circle"></i>Add Payments</a></li>
                <li><a href="{{route('payments.all')}}" target="_parent"><i class="fa fa-edit"></i>Payment Statement</a></li>
                {{-- <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i>Print Results</a></li> --}}
            </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users.request')}}" target="_parent"><i class="fa fa-wrench"></i>Registration Requests</a></li>
                    <li><a href="{{route('users.index')}}" target="_parent"><i class="fa fa-wrench"></i>Manage Users</a></li>
                    <li><a href="{{route('users.add')}}" target="_parent"><i class="fa fa-plus-circle"></i>Add Users</a></li>
                    {{-- <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i>Print Results</a></li> --}}
                </ul>
                </li>
            @endif
            <li class="treeview">
                  <a href="#">
                      <i class="fa fa-times-circle"></i> <span>Complaints</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                  <li><a href="{{route('complaints.index')}}"><i class="fa fa-plus-circle"></i>Open A Complaint</a></li>
                  <li><a href="{{route('complaints.view')}}"><i class="fa fa-eye"></i>View Status</a></li>
                      {{-- <li><a href="pages/examples/login.html"><i class="fa fa-picture-o"></i> Profile</a></li>
                      <li><a href="pages/examples/register.html"><i class="fa fa-credit-card"></i> Payment Details</a></li>
                      <li><a href="pages/examples/lockscreen.html"><i class="fa fa-print"></i> Payment History</a></li> --}}
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-gears"></i> <span>System Settings</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                  <li><a href="{{route('account')}}"><i class="fa fa-user"></i>Account Status</a></li>
                  <li><a href="{{route('timetable')}}"><i class="fa fa-calendar"></i>Time Table</a></li>
                      {{-- <li><a href="pages/examples/login.html"><i class="fa fa-picture-o"></i> Profile</a></li>
                      <li><a href="pages/examples/register.html"><i class="fa fa-credit-card"></i> Payment Details</a></li>
                      <li><a href="pages/examples/lockscreen.html"><i class="fa fa-print"></i> Payment History</a></li> --}}
                  </ul>
              </li>
              @endif
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>
                <a href="pages/calendar.html">

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form></span>
                </a>
            </li>
          </ul>
      </section>
      <!-- /.sidebar -->
  </aside>

  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Dashboard
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div style="overflow:hidden">
          <main class="py-4">
              @yield('content')
          </main>
      </div>
      </section><!-- /.content -->
  </aside><!-- /.right-side -->
</div>

    </div>
    @include('layouts.js')
</body>
</html>

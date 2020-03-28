<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('layouts.head')
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
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                        <img src="{{asset('img/avatar3.png')}}" class="img-circle" alt="User Image"/>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li><!-- end message -->
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                        </div>
                                        <h4>
                                            AdminLTE Design Team
                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                        </div>
                                        <h4>
                                            Developers
                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                        </div>
                                        <h4>
                                            Sales Department
                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                        </div>
                                        <h4>
                                            Reviewers
                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-warning"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users warning"></i> 5 new members joined
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="ion ion-ios7-cart success"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ion ion-ios7-person danger"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-tasks"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span> @if(Auth::user()->isInd == 0)
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
                                @else
                                Institution
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
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
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
              <p>Hello, {{Auth::user()->uid}}</p>

                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div>
          <!-- search form -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              @if(Auth::user()->isAdmin)
              <li class="active">
              <a href="{{route('home')}}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
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
                        <li><a href="{{route('subject.create')}}"><i class="fa fa-plus"></i> Add Subject</a></li>
                        <li><a href="/Subjects/Manage"><i class="fa fa-times-circle"></i> Manage Subjects</a></li>
                    @endif
                        <li><a href="{{route('subject.all')}}"><i class="fa fa-eye"></i> View Subjects</a></li>
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
            @if(Auth::user()->isAdmin)
            <li class="treeview">
            <a href="#">
                <i class="fa fa-check-circle"></i> <span>Marked Exams</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('marked.post')}}" target="_parent"><i class="fa fa-check-circle"></i> Upload MarkedSheets</a></li>
                {{-- <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i>Print Results</a></li> --}}
            </ul>
            </li>
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
            @endif
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
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
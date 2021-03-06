@extends('layouts.app')


@section('content')

    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            @if(Session::has('error'))
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;

                                </a>
                                    {{ Session::get('error') }}
                            </div>
                            @endif
                            <marquee style="background-color:black;color:white;font-weight:bold">For One to upload the AnswerSheets,Kindly Use an Android Application to
                                Scan the Document, save it as a pdf and upload it to our site via the upload answersheet section. We recommend an Application called <b>Camscanner</b> which is available in the playstore
                            </marquee>
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;

                                </a>
                                    {{ Session::get('success') }}
                            </div>
                            @endif
                            {{-- <h5 style="margin-top:100px" class="hidden-lg">Every Student Counts</h5>
                            <h5 class="hidden-sm hidden-md hidden-xs">Every Student Counts</h5> --}}
                            <h1>Making Your Childs
                                Future Brighter</h1>
                            <p>Shape the future of your child with our services. We provide Online Revision
                                materials for free. <br>Get Started as a Student or register your institution
                            </p>
                        <a href="{{route('register')}}" class="btn_1">Student Registration </a>
                            <a href="{{route('institution')}}" class="btn_2">Institution Registration </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->
<section  id="timetable" class="feature_part">
    <!--timetable -->
<div class="table-responsive">
    <h1 class="text-center">This Weeks Timetable</h1>
    <table class="table table-condensed table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Day</th>
                <th>Date</th>
                <th>Subject 1</th>
                <th>Subject 2</th>
                <th>Subject 3</th>
            </tr>
        </thead>
        <tbody>
            @foreach($timetables as $timetable)
            <tr>
                <td>{{ $timetable->Day }}</td>
                <td>{{ $timetable->Date }}</td>
                <td>{{ $timetable->Subject1 }}</td>
                <td>{{ $timetable->Subject2 }}</td>
                <td>{{ $timetable->Subject3 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!--timetable end-->
<section class="member_counter"  style="color:white;font-weight:bold;font-family:'Times New Roman', Times, serif' !important">
    <div class="container-fluid">
        {{ config('app.name') }}   IS AN ONLINE EDUCATION PLATFORM THAT FACILITATES AND AIDS THE USUAL LEARNING.
        IT PROVIDES LEARNING RESOURCES FOR FREE EXCEPT IF YOU WANT YOUR WORK MARKED.
        WE CHARGE Ksh. 17.00 PER PAPER FOR THREE PAPERS PER DAY 6 DAYS A WEEK FOR A WHOLE MONTH.
        THE PAPERS ARE TIMETABLED AND DISPLAYED IN OUR WEBSITE. THAT TRANSLATES TO A TOTAL OF 18 PAPERS PER WEEK AND THREE PAPERS PER SUBJECT PER WEEK. WE ARE COVERING 6 SUBJECTS FOR NOW.
        THE COMPULSORY SUBJECTS (MATHEMATICS ENGLISH AND KISWAHILI) AND SCIENCES (CHEMISTRY, BIOLOGY AND PHYSICS).
        THE FEE CHARGED CATERS FOR MARKING BY PROFESSIONALS, UPLOADING RESULTS TO INDIVIDUAL STUDENT,
         SECURE FILING AND STORAGE, ANALYSIS AND OTHER CHARGES THAT ARISE OUT OF HANDLING THE TESTS
    </div>
</section>
</section>
    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3 align-self-center">
                    <div class="single_feature_text ">
                        <h2>Awesome <br> Feature</h2>
                        <p>
                            We help students to utilize available resources and give feedback
                         </p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-layers"></i></span>
                            <h4>Better Future</h4>
                            <p>By providing school resources to the students which are highly
                                applicable in real life situation</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                            <h4>Qualified Trainers</h4>
                            <p>Our Trainers
                             provide professional services in testing and help in utilization of available resources.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                            <h4>Job Oppurtunity</h4>
                            <p>Contact Us to be part of the team</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end-->
    <div class="container-fluid">
    <section class="feature_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-4 align-self-center">
                    <div class="single_feature_text ">
                        <h2><span style="color:#f1590d">{{ config('app.name') }} </span> <br> Pricing</h2>
                        <p>We charge a Monthly Subscription fees affordable by everyone.
                         </p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="fa fa-user"></i></span>
                            <h4>For Individuals</h4>
                            <h4>Ksh .1200 per Month </h4>
                            <p>Renewable Monthly</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature" id="pricing">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="fa fa-users"></i></span>
                            <h4>Institutions</h4>
                            <h4>Ksh .2500  </h4>
                            <p>Renewable Yearly</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <!--Start Marking -->
    <div class="container-fluid">
        <section class="feature_part">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xl-4">
                        <div class="single_feature">
                            <div class="single_feature_part">
                                <span class="single_feature_icon"><i class="fa fa-check-circle"></i></span>
                                <h4>Per  One Week </h4>
                                <h4>Ksh .300 </h4>
                                <p>For all 18 Papers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="single_feature" id="pricing">
                            <div class="single_feature_part">
                                <span class="single_feature_icon"><i class="fa fa-check-square"></i></span>
                                <h4>Per Month</h4>
                                <h4>Ksh .1200  </h4>
                                <p>For all 72 Papers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4 align-self-center">
                        <div class="single_feature_text ">
                            <h2><span style="color:#f1590d">{{ config('app.name') }} </span> <br> Marking Prices</h2>
                            <p>Ranking and Report Forms will be Available on Demand!!!
                             </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    <!--end Marking Prices -->
    <!-- member_counter counter start -->
    <section class="member_counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">75</span>
                        <h4>All Teachers</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">1000</span>
                        <h4> All Students</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">400</span>
                        <h4>Online Students</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">600</span>
                        <h4>Ofline Students</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- member_counter counter end -->
    <!-- learning part start-->
    <section class="advance_feature learning_part" id="about">
        <div class="container">
            <div class="row align-items-sm-center align-items-xl-stretch">
                <div class="col-md-6 col-lg-6">
                    <div class="learning_member_text">
                        <h5>Our Services</h5>
                        <h2>Results to the Learner and Institution</h2>
                        <p>We efficiently and timely provide accurate results.
                        </p>
                        <div class="row">
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div class="learning_member_text_iner">
                                    <span class="ti-pencil-alt"></span>
                                    <h4>Learn Anywhere</h4>
                                    <p>Our resources are available and accessible  within the globe.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div class="learning_member_text_iner">
                                    <span class="ti-stamp"></span>
                                    <h4>Expert Teacher</h4>
                                    <p>We have specialists who will always help to analyse and deliver the results to you.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="learning_img">
                        <img src="img/advance_feature_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end-->
    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer_1">
                        <h4 style="color:#f1590d">{{config('app.name')}}</h4><br>
                        <a class="navbar-brand" style="color:#f1590d;font-weight:bold" href="{{route('index')}}">
                            <img src="{{asset('img/logo/logo.png')}}" alt="VirtualSchool" width="50px" height="50px">
                         </a>
                        <p>We provide online solutions to testing and resources to ready educators at an affordable rate </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <marquee><h4>Newsletter</h4></marquee>
                        <p>Stay Updated with the latest articles and resources uploaded. Subscribe and get weekly reports
                        </p>
                       {{-- save this for the subscribers --}}
                    <form action="{{route('subscribe')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    @if($errors->all())
                                        <div class="alert alert-danger">
                                            <a class="close" href="#" data-dismiss="alert">&times;</a>
                                        @foreach($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                        </div>
                                    @endif
                                    <input type="email" class="form-control" name="emailAddress" placeholder='email address'
                                        onfocus="this.placeholder = 'email'"
                                        onblur="this.placeholder = 'Enter email address'">
                                        <button class="btn btn_1" type="submit" style="width:100px">Subscribe</button>
                                </div>
                            </div>
                        </form>
                        <div class="social_icon">
                            <a href="/"> <i class="ti-facebook"></i> </a>
                            <a href="/"> <i class="ti-twitter-alt"></i> </a>
                            <a href="/"> <i class="ti-instagram"></i> </a>
                            <a href="/"> <i class="ti-skype"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4" id="contact">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <div class="contact_info">
                            {{-- <p><span> Address :</span> Times Tower off Jogoo road </p> --}}
                            <p><span> Phone :</span> +254 (07) 94-905-161</p>
                            <p><span> Email : </span>virtualschoollearning@gmail.com </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
{{-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> --}}
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <span style="color:red">virtualschool.co.ke</span> |  made with <i class="fa fa-heart" style="color:red;" aria-hidden="true"></i> by <a href="https://blusoft.co.ke" target="_blank">Blusoft International</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @stop

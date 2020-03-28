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
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;

                                </a>
                                    {{ Session::get('success') }}
                            </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;

                                </a>
                                    {{ Session::get('error') }}
                            </div>
                            @endif
                            <h5>Every Student Counts</h5>
                            <h1>Making Your Childs
                                Future Brighter</h1>
                            <p>Shape the future of your child with our services. We provide revision
                                papers at a low and affordable rate. <br>Get Started as a Student or register your institution
                            </p>
                        <a href="{{route('register')}}" class="btn_1">For Student </a>
                            <a href="{{route('institution')}}" class="btn_2">For Institution </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3 align-self-center">
                    <div class="single_feature_text ">
                        <h2>Awesome <br> Feature</h2>
                        <p>We provide revison papers to students and also act as teachers to the student.
                            We also help teacher to perform their daily daily tasks.
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
                            <p>Our highly trained Trainers with enough experience in testing will provide professional services.</p>
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
                        <p>With our cheap and affordable rates, we are here to help.
                         </p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="fa fa-user"></i></span>
                            <h4>Single Paper Marking</h4>
                            <h4>Ksh .{{ App\Price::where('paperType','Single Paper')->get()->first()->Amount ?? 0 }} Per Paper </h4>
                            <p>This is the price mostly charged by marking a single paper uploaded to our portal</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature" id="pricing">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="fa fa-users"></i></span>
                            <h4>Bulk Papers Marking</h4>
                            <h4>Ksh .{{ App\Price::where('paperType','Bulk Papers')->get()->first()->Amount ?? 0 }} Per Paper </h4>
                            <p>With the education Institutions using our site, we offer a discount to them by reducing the price slightly</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
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
                        <span class="counter">5000</span>
                        <h4> All Students</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">1200</span>
                        <h4>Online Students</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">3800</span>
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
                        <h2>Our Advanced Examination
                             System</h2>
                        <p>With this, we provide fast and efficient ways of delivering the results to the teacher together with the Institution
                            We will always be there to help.
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
        <div class="container">
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
                            <a href="#"> <i class="ti-facebook"></i> </a>
                            <a href="#"> <i class="ti-twitter-alt"></i> </a>
                            <a href="#"> <i class="ti-instagram"></i> </a>
                            <a href="#"> <i class="ti-skype"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4" id="contact">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <div class="contact_info">
                            <p><span> Address :</span> Times Tower off Jogoo road </p>
                            <p><span> Phone :</span> +254 (07) 04-922-042</p>
                            <p><span> Email : </span>mail@virtualschool.co.ke </p>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <span style="color:red">virtualschool.co.ke</span> |  made with <i class="fa fa-heart" style="color:red;" aria-hidden="true"></i> by <a href="#" target="_blank">Samuel Mwangi</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @stop
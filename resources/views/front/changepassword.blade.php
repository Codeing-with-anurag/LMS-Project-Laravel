@extends('layouts.front.masterlayout')
@include('message')
@section('content')
    <!--=====================================-->
    <!--=       Breadcrumb Area Start      =-->
    <!--=====================================-->
    <div class="edu-breadcrumb-area breadcrumb-style-2 "
        style="background-image: url('{{ asset('front/images/backgroundimage.jpg') }}')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="page-title">
                    <h1 class="Dashboard"><i class="fa fa-dashboard"></i>Change Password</h1>
                </div>
                <ul class="edu-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="separator"><i class="icon-angle-right"></i></li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ul>
            </div>
        </div>
    </div>

    <!--=====================================-->
    <!--=       Blog Details Area Start     =-->
    <!--=====================================-->
    <div class="blog-details-area section-gap-equal">
        <div class="container">
            <div class="row row--30">
                <div class="col-lg-4">
                    <div class="edu-blog-sidebar">
                        <!-- Start Single Widget  -->
                        <div class="edu-blog-widget widget-search">
                            <div class="inner">
                                <h4 class="widget-title"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;Dashboard</h4>
                                <div class="content">
                                    <nav id="sidebar">
                                        <div class="sidebar-header">
                                            <h3>Welcome {{ auth()->user()->name }}</h3>
                                        </div>
                                        @include('front.common')
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget  -->
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog-details-content">
                        <div class="entry-content">
                            <span class="category">Welcome</span>
                            <h3 class="title">{{ auth()->user()->name }}</h3>
                            <ul class="blog-meta">
                                <li><i class="icon-27"></i>{{ date('M-d-Y') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="margin-top:50px;">
                        <div class="col-lg-12">
                            <div class="course-sidebar-3">
                                <div class="inner">
                                    <div class="content">
                                        <div class="login-form-box registration-form">
                                            <h3 class="title">Change Password</h3>
                                            <form method="POST" action="{{ route('front.postchangepassword') }}"
                                                id="changepasswordform" name="changepasswordform">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="currentpassword">Current Password<span class="error">*</span></label>
                                                    <input type="password" name="currentpassword" id="currentpassword"
                                                        placeholder="Current Password">
                                                    <span class="password-show" data-value="1"><i
                                                            class="fa fa-eye"></i></span>
                                                    <span class="error">{{ $errors->changepassword->first('currentpassword') }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">New Password<span
                                                            class="error">*</span></label>
                                                    <input type="password" name="password"
                                                        id="password" placeholder="New Password">
                                                    <span class="confirmpassword-show" data-value="1"><i
                                                            class="fa fa-eye"></i></span>
                                                    <span
                                                        class="error">{{ $errors->changepassword->first('password') }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm Password<span
                                                            class="error">*</span></label>
                                                    <input type="password" name="password_confirmation"
                                                        id="password_confirmation" placeholder="Confirm Password">
                                                    <span class="confirmpassword-show" data-value="1"><i
                                                            class="fa fa-eye"></i></span>
                                                    <span
                                                        class="error">{{ $errors->changepassword->first('password_confirmation') }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="edu-btn btn-medium register-btn">Change Password <i
                                                            class="fa fa-spinner fa-spin register-submit-button d-none"
                                                            style="font-size:20px"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================-->
    <!--=        CTA  Area Start            =-->
    <!--=====================================-->
    <!-- Start Ad Banner Area  -->
    <div class="edu-cta-banner-area home-one-cta-wrapper bg-image">
        <div class="container">
            <div class="edu-cta-banner">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up"
                            data-sal-duration="800">
                            <h2 class="title">Get Your Quality Skills <span class="color-secondary">Certificate</span>
                                Through EduBlink</h2>
                            <a href="contact-us.html" class="edu-btn">Get started now <i class="icon-4"></i></a>
                        </div>
                    </div>
                </div>
                <ul class="shape-group">
                    <li class="shape-01 scene">
                        <img data-depth="2.5" src="{{ asset('front/images/cta/shape-10.png') }}" alt="shape">
                    </li>
                    <li class="shape-02 scene">
                        <img data-depth="-2.5" src="{{ asset('front/images/cta/shape-09.png') }}" alt="shape">
                    </li>
                    <li class="shape-03 scene">
                        <img data-depth="-2" src="{{ asset('front/images/cta/shape-08.png') }}" alt="shape">
                    </li>
                    <li class="shape-04 scene">
                        <img data-depth="2" src="{{ asset('front/images/about/shape-13.png') }}" alt="shape">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Ad Banner Area  -->
@section('script')
    <script>
        $(document).ready(function() {
            $("#changepasswordform").validate({
                rules: {               
                    currentpassword:{
                        required: true,
                        min:8,
                    },
                    password:{
                        required: true,
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    },
                    terms_condition: {
                        required: true
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr('id') == "currentpassword" || element.attr('id') == "password" || $(element)
                        .attr("id") == "password_confirmation") {
                        element.parent('div').after(error);
                    } else if ($(element).attr("id") == "terms-condition") {
                        element.parent('div').parent('div').after(error);
                    } else {
                        element.after(error);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "password" || $(element).attr("id") ==
                        "password_confirmation" || $(element).attr("id") ==
                        "email") {
                        $(element).addClass("has-error");
                        $($(element).parent("div")).addClass("is-invalid");
                    } else {
                        $(element).addClass("has-error");
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "password" || $(element).attr("id") ==
                        "email") {
                        $(element).removeClass("has-error");
                        $($(element).parent("div")).addClass("is-invalid");
                    } else {
                        $(element).removeClass("has-error");
                    }
                },
                submitHandler: function(form) {
                    if ($("#registratinform").valid()) {
                        $('.register-submit-button').removeClass('d-none');
                        form.submit();
                    }
                }
            });


            $("body").on('click', '.password-show', function() {
                $(this).empty();
                var input = $("#password");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                    $(this).html("<i class='fa fa-eye-slash'></i>");
                } else {
                    input.attr("type", "password");
                    $(this).html("<i class='fa fa-eye'></i>");
                }
            });

            $("body").on('click', '.confirmpassword-show', function() {
                $(this).empty();
                var input = $("#password_confirmation");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                    $(this).html("<i class='fa fa-eye-slash'></i>");
                } else {
                    input.attr("type", "password");
                    $(this).html("<i class='fa fa-eye'></i>");
                }
            });

            $("#terms-condition").on('click', function() {
                if ($(this).prop('checked') == true) {
                    $('.register-btn').removeAttr('disabled');
                } else {
                    $('.register-btn').attr('disabled', 'disabled');
                }
            })
        });
    </script>
@endsection
@endsection

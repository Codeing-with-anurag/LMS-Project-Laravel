@extends('layouts.front.masterlayout')
@include('message')
@section('content')
    <div class="edu-breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="page-title">
                    <h1 class="title">My Account</h1>
                </div>
                <ul class="edu-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>

                    <li class="separator"><i class="icon-angle-right"></i></li>
                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                </ul>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1">
                <span></span>
            </li>
            <li class="shape-2 scene"><img data-depth="2" src="{{ asset('front/images/about/shape-13.png') }}"
                    alt="shape"></li>
            <li class="shape-3 scene"><img data-depth="-2" src="{{ asset('front/images/about/shape-15.png') }}"
                    alt="shape"></li>
            <li class="shape-4">
                <span></span>
            </li>
            <li class="shape-5 scene"><img data-depth="2" src="{{ asset('front/images/about/shape-07.png') }}"
                    alt="shape"></li>
        </ul>
    </div>
    <!--=====================================-->
    <!--=          Login Area Start         =-->
    <!--=====================================-->
    <section class="account-page-area section-gap-equal">
        <div class="container position-relative">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-5">
                    <div class="login-form-box">
                        <h3 class="title">Sign in</h3>
                        <p>Don’t have an account? <a href="#">Sign up</a></p>
                        <form method="POST" action="{{ route('front.postlogin') }}" id="loginform" name="loginform">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email <span class="error">*</span></label>
                                <input type="email" name="email" id="email" placeholder="Email">
                                <span class="error">{{ $errors->login->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password<span class="error">*</span></label>
                                <input type="password" name="password" id="logpassword" placeholder="Password">
                                <span class="error">{{ $errors->login->first('password') }}</span>
                            </div>
                            <div class="form-group chekbox-area">
                                <div class="edu-form-check">
                                    <input type="checkbox" id="remember-me">
                                    <label for="remember-me">Remember Me</label>
                                </div>
                                <a href="#" class="password-reset">Lost your password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="edu-btn btn-medium">Sign in <i
                                        class="fa fa-spinner fa-spin submit-button d-none"
                                        style="font-size:20px"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="login-form-box registration-form">
                        <h3 class="title">Registration</h3>
                        <p>Already have an account? <a href="#">Sign in</a></p>
                        <form method="POST" action="{{ route('front.register') }}" id="registratinform"
                            name="registratinform">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name<span class="error">*</span></label>
                                <input type="text" name="name" id="name" placeholder="Full name">
                                <span class="error">{{ $errors->register->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email<span class="error">*</span></label>
                                <input type="email" name="email" id="email" placeholder="Email">
                                <span class="error">{{ $errors->register->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password<span class="error">*</span></label>
                                <input type="password" name="password" id="password" placeholder="Password">
                                <span class="password-show" data-value="1"><i class="fa fa-eye"></i></span>
                                <span class="error">{{ $errors->register->first('password') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password<span class="error">*</span></label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="Confirm Password">
                                <span class="confirmpassword-show" data-value="1"><i class="fa fa-eye"></i></span>
                                <span class="error">{{ $errors->register->first('password_confirmation') }}</span>
                            </div>
                            <div class="form-group chekbox-area">
                                <div class="edu-form-check">
                                    <input type="checkbox" id="terms-condition" name="terms_condition">
                                    <label for="terms-condition">I agree the User Agreement and <a href="#">Terms &
                                            Condition.</a> </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="edu-btn btn-medium register-btn" disabled>Create Account <i
                                        class="fa fa-spinner fa-spin register-submit-button d-none"
                                        style="font-size:20px"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <ul class="shape-group">
                <li class="shape-1 scene"><img data-depth="2" src="{{ asset('front/images/about/shape-07.png') }}"
                        alt="Shape"></li>
                <li class="shape-2 scene"><img data-depth="-2" src="{{ asset('front/images/about/shape-13.png') }}"
                        alt="Shape">
                </li>
                <li class="shape-3 scene"><img data-depth="2" src="{{ asset('front/images/counterup/shape-02.png') }}"
                        alt="Shape">
                </li>
            </ul>
        </div>
    </section>
@section('script')
    <script>
        $(document).ready(function() {

            $("#loginform").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.attr('id') == "email" || element.attr('id') == "password") {
                        element.parent('div').after(error);
                    } else {
                        element.after(error);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "password" || $(element).attr("id") ==
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
                    if ($("#loginform").valid()) {
                        $('.submit-button').removeClass('d-none');
                        form.submit();
                    }
                }
            });

            $("#registratinform").validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
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
                    if (element.attr('id') == "email" || element.attr('id') == "password" || $(element)
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

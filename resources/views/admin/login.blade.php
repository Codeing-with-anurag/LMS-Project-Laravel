@extends('layouts.loginmater')
@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('login') }}" class="h1">{{ env('APP_NAME') }}</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form id="loginform" name="login-form" action="{{ route('login-validate') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span class="error">{{ $errors->login->first('email') }}</span>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span class="error">{{ $errors->login->first('password') }}</span>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In
                                  <i class="fa fa-spinner fa-spin submit-button d-none"></i>
                            </button>
                        </div>
                        <div class="col-8 ml-50">
                            <a href="{{ route('forgotpassword') }}">Forgot Password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('script')
    <script>
        $(document).ready(function($) {
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
                    if (element.attr('id') == "email" ||element.attr('id') == "password" ) {                        
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
                     if($("#loginform").valid()){                        
                        $('.submit-button').removeClass('d-none');
                        form.submit();                        
                    }                    
                }
            });
        });
    </script>
@endsection
@endsection

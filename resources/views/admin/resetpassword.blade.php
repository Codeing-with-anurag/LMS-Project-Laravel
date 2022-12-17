@extends('layouts.loginmater')
@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="javascript:void(0)" class="h1">{{ env('APP_NAME') }}</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Reset Your Password</p>
                <form id="resetpasswordform" name="resetpassword-form" action="{{ route('post-resetpassword') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ $resetpasswordData->email }}" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span class="error">{{ $errors->login->first('confirmpassword') }}</span>
                    <div class="row">
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password
                                  <i class="fa fa-spinner fa-spin submit-button d-none"></i>
                            </button>
                        </div>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('script')
    <script>
        $(document).ready(function($) {
            $("#resetpasswordform").validate({
                rules: {                   
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirmpassword:{
                        required:true,
                        minlength: 8,
                        equalTo:"#password"
                    }
                },
                messages:{
                    confirmpassword:{
                        equalTo:"Password and Confirm Password not match."
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr('id') == "password" ||element.attr('id') == "confirmpassword" ) {                        
                        element.parent('div').after(error);
                    } else {
                        element.after(error);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "password" || $(element).attr("id") ==
                        "email") {
                        $(element).addClass("has-error");
                        $($(element).parent("div")).addClass("has-error");
                    } else {
                        $(element).addClass("has-error");
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "password" || $(element).attr("id") ==
                        "email") {
                        $(element).removeClass("has-error");
                        $($(element).parent("div")).addClass("has-error");
                    } else {
                        $(element).removeClass("has-error");
                    }
                },
                submitHandler: function(form) {
                     if($("#resetpasswordform").valid()){                        
                        $('.submit-button').removeClass('d-none');
                        form.submit();                        
                    }                    
                }
            });
        });
    </script>
@endsection
@endsection

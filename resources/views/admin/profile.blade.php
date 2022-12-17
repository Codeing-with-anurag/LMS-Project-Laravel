@extends('layouts.masterlayout')
@section('title') Profile @endsection
@section('content') 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
            <div class="row mb-2">
                @include('message')
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ asset('admin/image/AdminLTELogo.png') }}"
                                     alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ Auth::user()->name}}</h3>
                            <p class="text-muted text-center">{{ (Auth::user()->role == 1) ? 'Admin' : '' }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a  href="to:{{ Auth::user()->email}}"class="float-right">{{ Auth::user()->email }}</a>
                                </li>
                            </ul>
                            <a href="javascript:void(0)"  onclick="logout()" class="btn btn-danger btn-flat">Logout <i class="fa fa-sign-out"></i></a>
                        </div>
                        <!-- /.card-body -->
                    </div>                                       
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="#changepassword" data-toggle="tab">Change Password</a></li>
                                <!--                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>-->
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="profile">
                                    <form method="POST" id="profile-form" action="{{ route('admin.update.profile') }}" class="form-horizontal">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Name<span class="error">*</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{$user->name }}">
                                                <span class="error">{{ $errors->profile->first('name') }}</span>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" id="email" placeholder="Email" value="{{$user->email }}" disabled="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary btn-flat">Submit
                                                    <i class="fa fa-spinner fa-spin submit-button d-none"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>                                

                                <div class="tab-pane" id="changepassword">
                                    <form method="POST" action="{{ route('admin.update.pssword') }}" id="changepassword-form" name="changepassword-form" class="form-horizontal">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="currentpassword" class="col-sm-2 col-form-label">Current Password <span class="error">*</span></label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Current Password">
                                                <span class="error">{{ $errors->changepassword->first('currentpassword') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="newpassword" class="col-sm-2 col-form-label">New Password <span class="error">*</span></label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password">
                                                <span class="error">{{ $errors->changepassword->first('newpassword') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password <span class="error">*</span></label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                                <span class="error">{{ $errors->changepassword->first('password_confirmation') }}</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary btn-flat">Submit
                                                    <i class="fa fa-spinner fa-spin submit-button d-none"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>                                
                            </div>                            
                        </div>
                    </div>                    
                </div>                
            </div>            
        </div>
    </section>    
</div>
@section('script')
<script>
    $(document).ready(function ($) {
        $("#profile-form").validate({
            rules: {
                name: {
                    required: true
                }
            },
            highlight: function (element, errorClass, validClass) {
                if ($(element).attr("id") == "name") {
                    $(element).addClass("has-error");
                    $($(element).parent("div")).addClass("is-invalid");
                } else {
                    $(element).addClass("has-error");
                }
            },
            unhighlight: function (element, errorClass, validClass) {
                if ($(element).attr("id") == "name") {
                    $(element).removeClass("has-error");
                    $($(element).parent("div")).addClass("is-invalid");
                } else {
                    $(element).removeClass("has-error");
                }
            },
            submitHandler: function (form) {
                if ($("#profile-form").valid()) {
                    $('.submit-button').removeClass('d-none');
                    form.submit();
                }
            }
        });

        /* Change Password Validation */
        $("#changepassword-form").validate({
            rules: {
                currentpassword: {
                    required: true
                },
                newpassword: {
                    required: true
                },
                confirmpassword: {
                    required: true,
                    equalTo: "#newpassword"
                }
            },
            highlight: function (element, errorClass, validClass) {
                if ($(element).attr("id") == "currentpassword" || $(element).attr("id") == "newpassword" || $(element).attr("id") == "confirmpassword") {
                    $(element).addClass("has-error");
                    $($(element).parent("div")).addClass("is-invalid");
                } else {
                    $(element).addClass("has-error");
                }
            },
            unhighlight: function (element, errorClass, validClass) {
                if ($(element).attr("id") == "currentpassword" || $(element).attr("id") == "newpassword" || $(element).attr("id") == "confirmpassword") {
                    $(element).removeClass("has-error");
                    $($(element).parent("div")).addClass("is-invalid");
                } else {
                    $(element).removeClass("has-error");
                }
            },
            submitHandler: function (form) {
                if ($("#changepassword-form").valid()) {
                    $('.submit-button').removeClass('d-none');
                    form.submit();
                }
            }
        });
    });

    function logout() {
        Swal.fire({
            title: 'Do you want to Logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Logout',
            confirmButtonColor: '#d33',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.get("{{route('logout')}}", function (data, status) {
                    if (status == "success") {
                        window.location.href = "{{ route('login')}}";
                    }
                });
            }
        })
    }
</script>
@endsection
@endsection
@extends('layouts.masterlayout')
@section('title')
    Create Subject
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.bootstrap4.min.css') }}">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Create Subject</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Create Subject</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Create Subject</h3>
                            </div>
                            <!-- form start -->
                            <form method="POST" id="subjectform" name="subjectform" action="{{ route('admin.subject.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Plan <span class="error">*</span></label>
                                                <select name="plan" id="plan" class="form-control plan">
                                                    <option Selected value="">Select Plan</option>
                                                    @foreach ($plan as $planList)
                                                        <option value="{{ $planList->id }}">{{ $planList->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="error">{{ $errors->state->first('country') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name <span class="error">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Name">
                                                <span class="error">{{ $errors->state->first('name') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description </label>
                                                <textarea name="description" class="form-control" id="description" placeholder="Enter Description"></textarea>                                                                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-flat">Submit
                                        <i class="fa fa-spinner fa-spin submit-button d-none"></i>
                                    </button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('admin.subject') }}" class="btn btn-default btn-flat">Cancle </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
@section('script')
    <script>
        //Initialize Select2 Elements
        $('.plan').select2({
            theme: 'bootstrap4'
        })
        $('.country').on('change', function() {
            $('select').valid();
        });
        $(document).ready(function($) {
            $("#subjectform").validate({
                rules: {
                    plan: {
                        required: true
                    },
                    name: {
                        required: true
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr('id') == "name" || $(element).attr("id") == "plan") {
                        element.parent('div').after(error);
                    } else {
                        element.after(error);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "name" || $(element).attr("id") == "plan") {
                        $(element).addClass("has-error");
                        $($(element).parent("div")).addClass("is-invalid");
                    } else {
                        $(element).addClass("has-error");
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "name" || $(element).attr("id") == "plan") {
                        $(element).removeClass("has-error");
                        $($(element).parent("div")).addClass("is-invalid");
                    } else {
                        $(element).removeClass("has-error");
                    }
                },
                submitHandler: function(form) {
                    if ($("#subjectform").valid()) {
                        $('.submit-button').removeClass('d-none');
                        form.submit();
                    }
                }
            });
        });
    </script>
@endsection
@endsection

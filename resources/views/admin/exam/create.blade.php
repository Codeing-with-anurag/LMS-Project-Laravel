@extends('layouts.masterlayout')
@section('title')
    Create Exam
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
                        <h1> Create Exam</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Create Exam</li>
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
                                <h3 class="card-title">Create Exam</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" id="examform" name="examform" action="{{ route('admin.exam.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="country">Country <span class="error">*</span></label>
                                                <select name="country" id="country" class="form-control country"
                                                    onchange="return getState(this.value)">
                                                    <option Selected value="">Select Country</option>
                                                    @foreach ($country as $countryList)
                                                        <option value="{{ $countryList->id }}">{{ $countryList->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="error">{{ $errors->exam->first('country') }}</span>
                                            </div>
                                        </div>
                                    </div>                                   
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="state">State <span class="error">*</span></label>
                                                <select name="state" id="state" class="form-control state">
                                                    <option Selected value="">Select State</option>
                                                </select>
                                                <span class="error">{{ $errors->exam->first('state') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="state">Exam Category <span class="error">*</span></label>
                                                <select name="examcategory" id="examcategory" class="form-control examcategory">
                                                    <option Selected value="">Select Exam Category</option>
                                                    @foreach ($examCategory as $examCategoryList)
                                                        <option value="{{ $examCategoryList->id }}">{{ $examCategoryList->title }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="error">{{ $errors->exam->first('examcategory') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="name">Name <span class="error">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Name">
                                                <span class="error">{{ $errors->exam->first('name') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="name">Description</label>
                                                <textarea class="form-control" id="description" name="description"></textarea>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-flat">Submit
                                        <i class="fa fa-spinner fa-spin submit-button d-none"></i>
                                    </button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('admin.exam') }}" class="btn btn-default btn-flat">Cancle </a>
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
        $('.country').select2({
            theme: 'bootstrap4'
        })
        $('.state').select2({
            theme: 'bootstrap4'
        })
        $('.country').on('change', function() {
            $('select').valid();
        });
            
        $('.examcategory').select2({
            theme: 'bootstrap4'
        })
      
        $(document).ready(function($) {
            $("#examform").validate({
                rules: {
                    country:{
                        required:true
                    },
                    state: {
                        required: true
                    },
                    examcategory: {
                        required: true
                    },                   
                    name: {
                        required: true
                    }
                },
                errorPlacement: function(error, element) {
                    if ($(element).attr("id") == "name" || $(element).attr("id") == "country" || $(
                            element).attr("id") == "state" || $(element).attr("id") == "examcategory") {
                        element.parent('div').after(error);
                    } else {
                        element.after(error);
                    }
                },
                highlight: function(element, errorClass, validClass) {                                       
                    if ($(element).attr("id") == "name" || $(element).attr("id") == "country" || $(
                            element).attr("id") == "state" || $(element).attr("id") == "examcategory") {
                        $(element).addClass("is-invalid");
                        $($(element).parent("div")).addClass("is-invalid");
                    } else {
                        $(element).addClass("has-error");
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "name" || $(element).attr("id") == "country" || $(
                            element).attr("id") == "state" || $(element).attr("id") == "examcategory") {
                        $(element).removeClass("is-invalid");
                        $($(element).parent("div")).removeClass("is-invalid");
                    } else {
                        $(element).removeClass("has-error");
                    }
                },
                submitHandler: function(form) {
                    if ($("#examform").valid()) {
                        $('.submit-button').removeClass('d-none');
                        form.submit();
                    }
                }
            });
        });

        /* Get State */
        function getState(val) {            
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "POST",
                url: "{{ route('admin.getstate') }}",
                data: {  _token: token, country_id: val},                
                success: function(data) {                                     
                    $(".state").empty();
                    $(data).each(function( index,value ) {
                        $(".state").append("<option value='"+value.id+"'>"+value.name+"</option>")
                    });
                    $('#state').valid();     
                }
            });                    
        }
    </script>
@endsection
@endsection

@extends('layouts.masterlayout')
@section('title')
    Create Test Question
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
                        <h1> Create Test Question</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Create Test Question</li>
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
                                <h3 class="card-title">Create Question</h3>
                            </div>
                            <!-- form start -->
                            <form method="POST" id="testquestionform" name="testquestionform"
                                action="{{ route('admin.question.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="test">Test <span class="error">*</span></label>
                                                <select name="test" id="test" class="form-control test">
                                                    <option Selected value="">Select Test</option>
                                                    @foreach ($test as $testList)
                                                        <option value="{{ $testList->id }}">{{ $testList->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="error">{{ $errors->testquestion->first('test') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="test">Question Type <span class="error">*</span></label></br>
                                                    Text <input type="radio" name="question_type" checked id="question_type" class="question_type" value="text"/>
                                                    Image <input type="radio" name="question_type" id="question_type" class="question_type" value="image"/>
                                                <span class="error">{{ $errors->testquestion->first('test') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 textQuestion">
                                            <div class="form-group">
                                                <label for="question">Question <span class="error">*</span></label>
                                                <textarea name="question" class="form-control" id="question" placeholder="Enter Question"></textarea>
                                                <span class="error">{{ $errors->testquestion->first('question') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-none imageQuestion">
                                            <div class="form-group">
                                                <label for="question">Question <span class="error">*</span></label>
                                                <input type ="file" name="question"/>
                                                <span class="error">{{ $errors->testquestion->first('question') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="question">Option 1 <span class="error">*</span></label>
                                                <textarea name="option_1" class="form-control" id="option_1" placeholder="Enter Option 1"></textarea>
                                                <span class="error">{{ $errors->testquestion->first('option_1') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="question">Option 2 <span class="error">*</span></label>
                                                <textarea name="option_2" class="form-control" id="option_2" placeholder="Enter Option 2"></textarea>
                                                <span class="error">{{ $errors->testquestion->first('option_2') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="question">Option 3 <span class="error">*</span></label>
                                                <textarea name="option_3" class="form-control" id="option_3" placeholder="Enter Option 3"></textarea>
                                                <span class="error">{{ $errors->testquestion->first('option_3') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="question">Option 4 <span class="error">*</span></label>
                                                <textarea name="option_4" class="form-control" id="option_4" placeholder="Enter Option 4"></textarea>
                                                <span class="error">{{ $errors->testquestion->first('option_4') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="question">True Answer<span class="error">*</span></label>
                                                <textarea name="true_answer" class="form-control" id="true_answer" placeholder="Enter True Answer"></textarea>
                                                <span
                                                    class="error">{{ $errors->testquestion->first('true_answer') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="question">Solution<span class="error">*</span></label>
                                                <textarea name="solution" class="form-control" id="solution" placeholder="Enter Solution"></textarea>
                                                <span class="error">{{ $errors->testquestion->first('solution') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-flat">Submit
                                        <i class="fa fa-spinner fa-spin submit-button d-none"></i>
                                    </button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('admin.question') }}" class="btn btn-default btn-flat">Cancle </a>
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
        $('.test').select2({
            theme: 'bootstrap4'
        })
        $('.test').on('change', function() {
            $('select').valid();
        });
        $('.question_type').on("change",function(){
            var questionType =  $(this).val();
            if(questionType == "text"){
                $(".textQuestion").removeClass("d-none");
                $(".imageQuestion").addClass("d-none");
            }else{
                $(".textQuestion").addClass("d-none");
                $(".imageQuestion").removeClass("d-none");
                
            }
        });
        $(document).ready(function($) {
            $("#testquestionform").validate({
                rules: {
                    test: {
                        required: true
                    },                    
                    question: {
                        required: true,
                        maxlength: 100
                    },
                    option_1: {
                        required: true,
                        maxlength: 100

                    },
                    option_2: {
                        required: true,
                        maxlength: 100
                    },
                    option_3: {
                        required: true,
                        maxlength: 100
                    },
                    option_4: {
                        required: true,
                        maxlength: 100
                    },
                    true_answer: {
                        required: true,
                        maxlength: 100
                    },
                    solution: {
                        required: true,
                        maxlength: 100
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr('id') == "question" || $(element).attr("id") == "test") {
                        element.parent('div').after(error);
                    } else {
                        element.after(error);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "question" || $(element).attr("id") == "test") {
                        $(element).addClass("has-error");
                        $($(element).parent("div")).addClass("is-invalid");
                    } else {
                        $(element).addClass("has-error");
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "question" || $(element).attr("id") == "test") {
                        $(element).removeClass("has-error");
                        $($(element).parent("div")).addClass("is-invalid");
                    } else {
                        $(element).removeClass("has-error");
                    }
                },
                submitHandler: function(form) {
                    if ($("#testquestionform").valid()) {
                        $('.submit-button').removeClass('d-none');
                        form.submit();
                    }
                }
            });
        });
    </script>
@endsection
@endsection

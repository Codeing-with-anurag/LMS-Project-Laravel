@extends('layouts.masterlayout')
@section('title')
    Update Plan
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
                        <h1> Update Plan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Update Exam</li>
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
                                <h3 class="card-title">Update Plan</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" id="planform" name="planform"
                                action="{{ route('admin.plan.update', $plan->id) }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="exam">Exam <span class="error">*</span></label>
                                                <select name="exam" id="exam" class="form-control exam">
                                                    <option Selected value="">Select Exam</option>
                                                    @foreach ($exam as $examList)
                                                        @if ($examList->id == $plan->exam_id)
                                                            <option value="{{ $examList->id }}" selected>
                                                                {{ $examList->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $examList->id }}">{{ $examList->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <span class="error">{{ $errors->plan->first('exam') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Name <span class="error">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Enter Name" value={{ $plan->name }}>
                                                <span class="error">{{ $errors->plan->first('name') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="state">Year <span class="error">*</span></label>
                                                <input type="number" name="year" class="form-control" id="year"
                                                    placeholder="Enter Year" min="1" max="9"
                                                    value={{ $plan->year }}>
                                                <span class="error">{{ $errors->plan->first('examcyearategory') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="price">Price <span class="error">*</span></label>
                                                <input type="number" name="price" class="form-control" id="price"
                                                    placeholder="Enter Price" min="1" value={{ $plan->price }}>
                                                <span class="error">{{ $errors->plan->first('price') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="Validity">Validity <span class="error">*</span></label>
                                                <input type="number" name="validity" class="form-control" id="validity"
                                                    placeholder="Enter Validity" min="1"
                                                    value={{ $plan->validity }}>
                                                <span class="error">{{ $errors->plan->first('Validity') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="price">Unlimited Test <span class="error">*</span></label>
                                                <input type="radio" name="unlimited_test_attempt"
                                                    id="unlimited_test_attempt" class="unlimited_test_attempt"
                                                    value="1"
                                                    {{ $plan->unlimited_test_attempt == 1 ? 'checked' : '' }}> Yes
                                                <input type="radio" name="unlimited_test_attempt"
                                                    id="unlimited_test_attempt" class="unlimited_test_attempt"
                                                    value="0"
                                                    {{ $plan->unlimited_test_attempt == 0 ? 'checked' : '' }}> No
                                                <span
                                                    class="error">{{ $errors->plan->first('unlimited_test_attempt') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="attempt" class="col-lg-4 d-none">
                                            <div class="form-group">
                                                <label for="price">Attempt <span class="error">*</span></label>
                                                <select name="attempt" class="form-control">
                                                    <option selected value="">Select Attempt</option>
                                                    @for ($i = 1; $i <= 10; $i++)
                                                        @if($plan->attempt == $i)
                                                            <option selected='selected'> {{ $i }}</option>
                                                        @else
                                                            <option> {{ $i }}</option>
                                                        @endif
                                                    @endfor
                                                </select>
                                                <span class="error">{{ $errors->plan->first('attempt') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="name">Description</label>
                                                <textarea class="form-control" id="description" name="description">{{ $plan->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-flat">Submit
                                        <i class="fa fa-spinner fa-spin submit-button d-none"></i>
                                    </button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('admin.plan') }}" class="btn btn-default btn-flat">Cancle </a>
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
        $('.exam').select2({
            theme: 'bootstrap4'
        })
        $('.exam').on('change', function() {
            $('select').valid();
        });

        $(document).ready(function($) {
            $("#planform").validate({
                rules: {
                    exam: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    year: {
                        required: true,
                        number: true
                    },
                    price: {
                        required: true,
                        number: true
                    },
                    validity: {
                        required: true,
                        number: true
                    },
                    unlimited_test_attempt: {
                        required: true
                    },
                    attempt: {
                        required: {
                            depends: function(element) {
                                if ($('#unlimited_test_attempt').val() == 1) {
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        }
                    }
                },
                errorPlacement: function(error, element) {
                    if ($(element).attr("id") == "exam" || $(element).attr("id") ==
                        "unlimited_test_attempt") {
                        element.parent('div').after(error);
                    } else {
                        element.after(error);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "name" || $(element).attr("id") == "exam" || $(element)
                        .attr("id") == "unlimited_test_attempt") {
                        $(element).addClass("is-invalid");
                        $($(element).parent("div")).addClass("is-invalid");
                    } else {
                        $(element).addClass("has-error");
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    if ($(element).attr("id") == "name" || $(element).attr("id") == "exam") {
                        $(element).removeClass("is-invalid");
                        $($(element).parent("div")).removeClass("is-invalid");
                    } else {
                        $(element).removeClass("has-error");
                    }
                },
                submitHandler: function(form) {
                    if ($("#planform").valid()) {
                        $('.submit-button').removeClass('d-none');
                        form.submit();
                    }
                }
            });
            var test_attempt = $(".unlimited_test_attempt:checked").val();
            if (test_attempt == 0) {
                $("#attempt").removeClass('d-none');
            } else {
                $("#attempt").addClass('d-none');
            }
            /* Hide Show Attempt*/
            $(".unlimited_test_attempt").on("change", function() {
                var test_attempt = $(this).val();

                if (test_attempt == 0) {
                    $("#attempt").removeClass('d-none');
                } else {
                    $("#attempt").addClass('d-none');
                }
            })

        });
    </script>
@endsection
@endsection

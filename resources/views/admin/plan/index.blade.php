@extends('layouts.masterlayout')
@section('title')
    Plan List
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
                        <h1>Plan List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Plan List</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Plan List</h3>
                                <a href="{{ route('admin.plan.add') }}" class="btn btn-primary btn-flat float-right">Add
                                    Plan</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="plan_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Exam</th>
                                            <th>Name</th>
                                            <th>Year</th>
                                            <th>Price</th>
                                            <th>Validity</th>                                            
                                            <th>Unlimitest Test</th>                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            var initaltable = $('#plan_table');
            initaltable.DataTable({
                oLanguage: {
                    sProcessing: ' <i class="fa fa-spinner fa-spin"></i>'
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.get-plan-list') }}",
                    type: "POST",

                    data: function(d) {
                        d._token = $("meta[name=csrf-token]").attr('content')
                    }
                },
                columns: [{
                        data: 'exam',
                        name: 'exam'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'year',
                        name: 'year'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'validity',
                        name: 'validity'
                    },
                    {
                        data: 'unlimited_test_attempt',
                        name: 'unlimited_test_attempt'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });

        $(document).on('click', '.delete_plan', function() {
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            Swal.fire({
                title: 'Do you want to Delete?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.plan.delete') }}",
                        type: "POST",
                        data: {
                            _token: token,
                            id: id
                        },
                        dataType: "josn",
                        success: function(data) {
                            $('#plan_table').DataTable().draw();
                            $(document).Toasts('create', {
                                class: 'bg-success',
                                title: 'Delete',
                                subtitle: 'Exam Delete',
                                body: 'Exam Delete Succefully!.'
                            });
                            $('#toastsContainerTopRight').delay(5000).fadeOut('slow');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {                            
                              $('#plan_table').DataTable().draw();
                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'Opps!',
                                subtitle: 'Server Error',
                                body: 'Some thing went Wrong!.'
                            });
                            $('#toastsContainerTopRight').delay(5000).fadeOut('slow');
                        }
                    });
                }
            })
        });
    </script>
@endsection
@endsection

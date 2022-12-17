@extends('layouts.masterlayout')
@section('title')
    Exam List
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
                        <h1>Exam List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Exam List</li>
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
                                <h3 class="card-title">Exam List</h3>
                                <a href="{{ route('admin.exam.add') }}" class="btn btn-primary btn-flat float-right">Add
                                    Exam</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="exam_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>State</th>
                                            <th>Country</th>                                            
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
            var initaltable = $('#exam_table');
            initaltable.DataTable({
                oLanguage: {
                    sProcessing: ' <i class="fa fa-spinner fa-spin"></i>'
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.get-exam-list') }}",
                    type: "POST",

                    data: function(d) {
                        d._token = $("meta[name=csrf-token]").attr('content')
                    }
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'state',
                        name: 'state'
                    },
                    {
                        data: 'country',
                        name: 'country'
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

        $(document).on('click', '.delete_exam', function() {
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
                        url: "{{ route('admin.exam.delete') }}",
                        type: "POST",
                        data: {
                            _token: token,
                            id: id
                        },
                        dataType: "json",
                        success: function(data) {                                         
                            $('#exam_table').DataTable().draw();                                                        
                            if(data.status == 1){
                                $(document).Toasts('create', {
                                    class: 'bg-success',
                                    title: 'Delete',
                                    subtitle: 'Exam Delete',
                                    body: 'Exam Delete Succefully!.'
                                });
                                $('#toastsContainerTopRight').delay(5000).fadeOut('slow');
                            }else{
                                $(document).Toasts('create', {
                                    class: 'bg-info',
                                    title: 'Info',
                                    subtitle: 'Country Delete',
                                    body: 'Please first Delete state belogs to this country .'
                                });
                                $('#toastsContainerTopRight').delay(5000).fadeOut('slow');
                            }
                            $('#toastsContainerTopRight').delay(5000).fadeOut('slow');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {                                   
                            $('#exam_table').DataTable().draw();
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

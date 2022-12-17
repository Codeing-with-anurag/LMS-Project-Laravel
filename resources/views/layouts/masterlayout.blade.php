<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/image/exam.png') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">>
    <link rel="stylesheet" href="{{ asset('admin/css/select2-bootstrap4.min.css') }}">>
    <link rel="stylesheet" href="{{ asset('admin/css/developer.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.profile') }}" class="nav-link">Profile</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="javascript:void(0)" onclick="logout()" class=" btn btn-danger"><i class="fa fa-sign-out"></i></a>
                </li>
            </ul>
        </nav>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <img src="{{ asset('admin/image/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin/image/AdminLTELogo.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p> Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">
                                <i class="nav-icon ion ion-person-add"></i>
                                <p> Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.examcategory') }}"
                                class="nav-link {{ Route::is('admin.examcategory') ? 'active' : '' }}">
                                <i class="nav-icon  fa fa-calendar-check-o"></i>
                                <p>Exam Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.exam') }}"
                                class="nav-link {{ Route::is('admin.exam') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-question"></i>
                                <p>Exam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.plan') }}"
                                class="nav-link {{ Route::is('admin.plan') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-object-group"></i>
                                <p> Plans</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.subject') }}"
                                class="nav-link {{ Route::is('admin.subject') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-book"></i>
                                <p> Subject</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.test') }}"
                                class="nav-link {{ Route::is('admin.test') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-file"></i>
                                <p> Test</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.question') }}"
                                class="nav-link {{ Route::is('admin.question') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-question-circle-o"></i>
                                <p> Test Question</p>
                            </a>
                        </li>

                        <li
                            class="nav-item {{ Route::is('admin.country') || Route::is('admin.state') ? ' menu-is-opening menu-open' : '' }}">
                            <a href="javascript:void(0)" class="nav-link">
                                <i class="nav-icon fa fa-cog"></i>
                                <p>Settings <i class="fa fa-angle-left right"></i> </p>
                            </a>
                            <ul
                                class="nav nav-treeview {{ Route::is('admin.country') || Route::is('admin.state') ? 'menu-open' : '' }}">
                                <li class="nav-item">
                                    <a href="{{ route('admin.country') }}"
                                        class="nav-link {{ Route::is('admin.country.*') ? 'active' : '' }}">
                                        <i class="fa fa-globe nav-icon"></i>
                                        <p>Country</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.state') }}"
                                        class="nav-link {{ Route::is('admin.state') ? 'active' : '' }}">
                                        <i class="fa fa-globe nav-icon"></i>
                                        <p>State</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a
                    href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b>1.0.0
            </div>
        </footer>
        <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('admin/js/additional-methods.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/js/sparkline.js') }}"></script>
        <script src="{{ asset('admin/js/moment.min.js') }}"></script>
        <script src="{{ asset('admin/js/daterangepicker.js') }}"></script>
        <script src="{{ asset('admin/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('admin/js/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.overlayScrollbars.min.js ') }}""></script>
        <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('admin/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('admin/js/toastr.min.js') }}"></script>
        <script src="{{ asset('admin/js/select2.full.min.js') }}"></script>
        @yield('script')
        <script type="text/javascript">
            function logout() {
                Swal.fire({
                    title: 'Do you want to Logout?',
                    showCancelButton: true,
                    confirmButtonText: 'Logout',
                    confirmButtonColor: '#d33',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.get("{{ route('logout') }}", function(data, status) {
                            if (status == "success") {
                                window.location.href = "{{ route('login') }}";
                            }
                        });
                    }
                })
            }
        </script>

</body>

</html>

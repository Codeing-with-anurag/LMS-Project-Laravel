@extends('layouts.masterlayout')
@section('title')
    Question View
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
                        <h1>Question View</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.question') }}"></a>Question List</li>
                            <li class="breadcrumb-item active">Question View</li>
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
                                <h3 class="card-title">Question View</h3>
                            </div>                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fa fa-question"></i> {{ $testquestion->question}}                                            
                                        </h4>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-3">                                        
                                        <i class="fa fa-circle-o"></i> {{ $testquestion->option_1}}                                                                                    
                                    </div>                                    
                                    <div class="col-3">                                        
                                        <i class="fa fa-circle-o"></i> {{ $testquestion->option_2}}                                                                                    
                                    </div>                                    
                                    <div class="col-3">                                        
                                        <i class="fa fa-circle-o"></i> {{ $testquestion->option_3}}                                                                                    
                                    </div>                                    
                                    <div class="col-3">                                        
                                        <i class="fa fa-circle-o"></i> {{ $testquestion->option_4}}                                                                                    
                                    </div>                                    
                                </div>
                                 <div class="row">
                                    <div class="col-6">                                        
                                        <i class="fa fa-check"></i> {{ $testquestion->true_answer}}                                                                                    
                                    </div>                                                                        
                                    <div class="col-6">                                        
                                        <i class="fa fa-lightbulb-o"></i> {{ $testquestion->solution}}                                                                                    
                                    </div>                                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
@endsection

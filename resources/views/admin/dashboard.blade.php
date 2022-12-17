@extends('layouts.masterlayout')
@section('title')
Dashboard
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row mb-2">
                @include('message')
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-indigo elevation-1"><i class="fa fa-user-plus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Students</span>
                            <span class="info-box-number">
                                10                                
                            </span>
                        </div>                        
                    </div>                    
                </div>               
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-gradient-olive elevation-1"><i class="fa fa-question-circle-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Exams</span>
                            <span class="info-box-number">{{ $data['totalExam']  }}</span>
                        </div>
                    </div>                    
                </div>                                
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-gradient-lightblue elevation-1"><i class="fa fa-object-group"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Plan</span>
                            <span class="info-box-number">{{ $data['totalPlan'] }}</span>
                        </div>                        
                    </div>                    
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-gradient-red elevation-1"><i class="fa fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Subject</span>
                            <span class="info-box-number">{{ $data['totalSubject']  }}</span>
                        </div>                        
                    </div>                    
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fa fa-file"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Test</span>
                            <span class="info-box-number">{{$data['totalTest'] }}</span>
                        </div>                      
                    </div>                    
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-gradient-gray-dark elevation-1"><i class="fa fa-question"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Test Question</span>
                            <span class="info-box-number">{{$data['totalTest'] }}</span>
                        </div>                      
                    </div>                    
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-gradient-lime elevation-1"><i class="fa fa-globe"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Country</span>
                            <span class="info-box-number">{{$data['totalCountry'] }}</span>
                        </div>                      
                    </div>                    
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fa fa-globe"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">State</span>
                            <span class="info-box-number">{{$data['totalState'] }}</span>
                        </div>                      
                    </div>                    
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
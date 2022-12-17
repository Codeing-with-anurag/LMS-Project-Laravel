@extends('layouts.front.masterlayout')
@section('content')
    <!--=====================================-->
    <!--=       Breadcrumb Area Start      =-->
    <!--=====================================-->
    <div class="edu-breadcrumb-area breadcrumb-style-2 " style="background-image: url('{{ asset('front/images/backgroundimage.jpg') }}')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="page-title">
                    <h1 class="Dashboard"><i class="fa fa-dashboard"></i>Dashboard</h1>
                </div>
                <ul class="edu-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="separator"><i class="icon-angle-right"></i></li>                                        
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>

    <!--=====================================-->
    <!--=       Blog Details Area Start     =-->
    <!--=====================================-->
    <div class="blog-details-area section-gap-equal">
        <div class="container">
            <div class="row row--30">
                <div class="col-lg-4">
                    <div class="edu-blog-sidebar">
                        <!-- Start Single Widget  -->
                        <div class="edu-blog-widget widget-search">
                            <div class="inner">
                                <h4 class="widget-title"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;Dashboard</h4>
                                <div class="content">
                                    <nav id="sidebar">
                                        <div class="sidebar-header">
                                            <h3>Welcome {{ auth()->user()->name }}</h3>
                                        </div>
                                        @include('front.common')
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget  -->
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog-details-content">
                        <div class="entry-content">
                            <span class="category">Welcome</span>
                            <h3 class="title">{{ auth()->user()->name }}</h3>
                            <ul class="blog-meta">
                                <li><i class="icon-27"></i>{{ date('M-d-Y') }}</li>
                            </ul>                          
                        </div>                                              
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================-->
    <!--=        CTA  Area Start            =-->
    <!--=====================================-->
    <!-- Start Ad Banner Area  -->
    <div class="edu-cta-banner-area home-one-cta-wrapper bg-image">
        <div class="container">
            <div class="edu-cta-banner">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up"
                            data-sal-duration="800">
                            <h2 class="title">Get Your Quality Skills <span class="color-secondary">Certificate</span>
                                Through EduBlink</h2>
                            <a href="contact-us.html" class="edu-btn">Get started now <i class="icon-4"></i></a>
                        </div>
                    </div>
                </div>
                <ul class="shape-group">
                    <li class="shape-01 scene">
                        <img data-depth="2.5" src="{{asset('front/images/cta/shape-10.png')}}" alt="shape">
                    </li>
                    <li class="shape-02 scene">
                        <img data-depth="-2.5" src="{{asset('front/images/cta/shape-09.png')}}" alt="shape">
                    </li>
                    <li class="shape-03 scene">
                        <img data-depth="-2" src="{{asset('front/images/cta/shape-08.png')}}" alt="shape">
                    </li>
                    <li class="shape-04 scene">
                        <img data-depth="2" src="{{asset('front/images/about/shape-13.png')}}" alt="shape">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Ad Banner Area  -->
@endsection
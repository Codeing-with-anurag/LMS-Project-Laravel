<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Data -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ env('APP_NAME') }} | Online Education Platform</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('front/images/favicon.png')}}">
        <!-- CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('front/css/vendor/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/vendor/icomoon.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/vendor/remixicon.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/vendor/magnifypopup.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/vendor/odometer.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/vendor/lightbox.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/vendor/animation.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/vendor/jqueru-ui-min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/vendor/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/vendor/tipped.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.2/css/all.min.css" />
        <!-- Site Stylesheet -->
        <link rel="stylesheet" href="{{asset('front/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/developer.css')}}">
    </head>
    <body class="sticky-header dark-mode">
        <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
            <![endif]-->
        <div id="edublink-preloader">
            <div class="loading-spinner">
                <div class="preloader-spin-1"></div>
                <div class="preloader-spin-2"></div>
            </div>
            <div class="preloader-close-btn-wraper">
                <span class="btn btn-primary preloader-close-btn">
                    Cancel Preloader</span>
            </div>
        </div>
        <div id="main-wrapper" class="main-wrapper">
            <!--=====================================-->
            <!--=        Header Area Start       	=-->
            <!--=====================================-->
            <header class="edu-header header-style-1 header-fullwidth">
                <div class="header-top-bar">
                    <div class="container-fluid">
                        <div class="header-top">
                            <div class="header-top-left">
                                <div class="header-notify">
                                    {{-- First 20 students get 50% discount. <a href="#">Hurry up!</a> --}}
                                </div>
                            </div>
                            <div class="header-top-right">
                                <ul class="header-info">
                                    @if (Auth::check())
                                        <li>Welcome {{ auth()->user()->name }}</li>   
                                        <li><a href="{{ route('front.dashboard') }}">Dahsboard</a></li>
                                        <li><a href="{{ route('front.logout') }}">Logout</a></li>        
                                    @else
                                    <li><a href="{{ route('front.login') }}">Login</a></li>
                                    <li><a href="{{ route('front.login') }}">Register</a></li>
                                    @endif
                                    <li><a href="tel:+011235641231"><i class="icon-phone"></i>Call: 123 4561 5523</a></li>
                                    <li><a href="mailto:info@edublink.com" target="_blank"><i class="icon-envelope"></i>Email: info@edublink.com</a></li>
                                    <li class="social-icon">
                                        <a href="#"><i class="icon-facebook"></i></a>
                                        <a href="#"><i class="icon-instagram"></i></a>
                                        <a href="#"><i class="icon-twitter"></i></a>
                                        <a href="#"><i class="icon-linkedin2"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="edu-sticky-placeholder"></div>
                <div class="header-mainmenu">
                    <div class="container-fluid">
                        <div class="header-navbar">
                            <div class="header-brand">
                                <div class="logo">
                                    <a href="{{ route('front.index') }}">
                                        {{-- <img class="logo-light" src="{{asset('front/images/logo/logo-dark.png')}}" alt="Corporate Logo"> --}}
                                        {{-- <img class="logo-dark" src="{{asset('front/images/logo/logo-white.png')}}" alt="Corporate Logo"> --}}
                                        <h4>{{ env('APP_NAME') }}</h4>
                                    </a>
                                </div>
                                <div class="header-category">
                                    <nav class="mainmenu-nav">
                                        <ul class="mainmenu">
                                            <li class="has-droupdown">
                                                <a href="#"><i class="icon-1"></i>Category</a>
                                                <ul class="submenu">
                                                    <li><a href="course-one.html">Design</a></li>
                                                    <li><a href="course-one.html">Development</a></li>
                                                    <li><a href="course-one.html">Architecture</a></li>
                                                    <li><a href="course-one.html">Life Style</a></li>
                                                    <li><a href="course-one.html">Data Science</a></li>
                                                    <li><a href="course-one.html">Marketing</a></li>
                                                    <li><a href="course-one.html">Music</a></li>
                                                    <li><a href="course-one.html">Photography</a></li>
                                                    <li><a href="course-one.html">Finance</a></li>
                                                    <li><a href="course-one.html">Motivation</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="header-mainnav">
                                <nav class="mainmenu-nav">
                                    <ul class="mainmenu">
                                        <li class=""><a href="{{ route('front.index') }}">Home</a>
                                           
                                        </li>
                                        <li class="has-droupdown"><a href="#">Pages</a>
                                            <ul class="mega-menu">
                                                <li>
                                                    <h6 class="menu-title">Inner Pages</h6>
                                                    <ul class="submenu mega-sub-menu-01">
                                                        <li><a href="about-one.html">About Us 1</a></li>
                                                        <li><a href="about-two.html">About Us 2</a></li>
                                                        <li><a href="about-three.html">About Us 3</a></li>
                                                        <li><a href="team-one.html">Instructor 1</a></li>
                                                        <li><a href="team-two.html">Instructor 2</a></li>
                                                        <li><a href="team-three.html">Instructor 3</a></li>
                                                        <li><a href="team-details.html">Instructor Profile</a></li>
                                                        <li><a href="faq.html">Faq's</a></li>
                                                        <li><a href="404.html">404 Error</a></li>
                                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h6 class="menu-title">Inner Pages</h6>
                                                    <ul class="submenu mega-sub-menu-01">
                                                        <li><a href="gallery-grid.html">Gallery Grid</a></li>
                                                        <li><a href="gallery-masonry.html">Gallery Masonry</a></li>
                                                        <li><a href="event-grid.html">Event Grid</a></li>
                                                        <li><a href="event-list.html">Event List</a></li>
                                                        <li><a href="event-details.html">Event Details</a></li>
                                                        <li><a href="pricing-table.html">Pricing Table</a></li>
                                                        <li><a href="purchase-guide.html">Purchase Guide</a></li>
                                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                                        <li><a href="terms-condition.html">Terms & Condition</a></li>
                                                        <li><a href="my-account.html">Sign In</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h6 class="menu-title">Shop Pages</h6>
                                                    <ul class="submenu mega-sub-menu-01">
                                                        <li><a href="shop.html">Shop</a></li>
                                                        <li><a href="product-details.html">Product Details</a></li>
                                                        <li><a href="cart.html">Cart</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="has-droupdown"><a href="#">Courses</a>
                                            <ul class="submenu">
                                                <li><a href="course-one.html">Course Style 1</a></li>
                                                <li><a href="course-two.html">Course Style 2</a></li>
                                                <li><a href="course-three.html">Course Style 3</a></li>
                                                <li><a href="course-four.html">Course Style 4</a></li>
                                                <li><a href="course-five.html">Course Style 5</a></li>
                                                <li><a href="course-details.html">Course Details 1</a></li>
                                                <li><a href="course-details-2.html">Course Details 2</a></li>
                                                <li><a href="course-details-3.html">Course Details 3</a></li>
                                            </ul>
                                        </li>

                                        <li class="has-droupdown"><a href="#">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog-standard.html">Blog Standard</a></li>
                                                <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                                <li><a href="blog-list.html">Blog List</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-droupdown"><a href="#">Contact</a>
                                            <ul class="submenu">
                                                <li><a href="contact-us.html">Contact Us</a></li>
                                                <li><a href="contact-me.html">Contact Me</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right">
                                <ul class="header-action">
                                    <li class="search-bar">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <button class="search-btn" type="button"><i class="icon-2"></i></button>
                                        </div>
                                    </li>
                                    <li class="icon search-icon">
                                        <a href="javascript:void(0)" class="search-trigger">
                                            <i class="icon-2"></i>
                                        </a>
                                    </li>
                                    <li class="icon cart-icon">
                                        <a href="#" class="cart-icon">
                                            <i class="icon-3"></i>
                                            <span class="count">0</span>
                                        </a>
                                    </li>
                                  
                                    <li class="mobile-menu-bar d-block d-xl-none">
                                        <button class="hamberger-button">
                                            <i class="icon-54"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popup-mobile-menu">
                    <div class="inner">
                        <div class="header-top">
                            <div class="logo">
                                <a href="index.html">
                                    <img class="logo-light" src="{{asset('front/images/logo/logo-dark.png')}}" alt="Corporate Logo">
                                    <img class="logo-dark" src="{{asset('front/images/logo/logo-white.png')}}" alt="Corporate Logo">
                                </a>
                            </div>
                            <div class="close-menu">
                                <button class="close-button">
                                    <i class="icon-73"></i>
                                </button>
                            </div>
                        </div>
                        <ul class="mainmenu">
                            <li class="has-droupdown"><a href="#">Home</a>
                                <ul class="submenu">
                                    <li><a href="index.html">EduBlink Education <span class="badge-1">hot</span></a></li>
                                    <li><a href="index-distant-learning.html">Distant Learning</a></li>
                                    <li><a href="index-university.html">University</a></li>
                                    <li><a href="index-online-academy.html">Online Academy</a></li>
                                    <li><a href="index-modern-schooling.html">Modern Schooling <span class="badge">new</span></a></li>
                                    <li><a href="index-kitchen.html">Kitchen Coach</a></li>
                                    <li><a href="index-yoga.html">Yoga Instructor</a></li>
                                    <li><a href="index-kindergarten.html">Kindergarten</a></li>
                                    <li><a href="index-health-coach.html">Health Coch <span class="badge">new</span></a></li>
                                    <li><a href="index-landing.html">Landing Demo</a></li>
                                </ul>
                            </li>
                            <li class="has-droupdown"><a href="#">Pages</a>
                                <ul class="mega-menu">
                                    <li>
                                        <h6 class="menu-title">Inner Pages</h6>
                                        <ul class="submenu mega-sub-menu-01">
                                            <li><a href="about-one.html">About Us 1</a></li>
                                            <li><a href="about-two.html">About Us 2</a></li>
                                            <li><a href="about-three.html">About Us 3</a></li>
                                            <li><a href="team-one.html">Instructor 1</a></li>
                                            <li><a href="team-two.html">Instructor 2</a></li>
                                            <li><a href="team-three.html">Instructor 3</a></li>
                                            <li><a href="team-details.html">Instructor Profile</a></li>
                                            <li><a href="faq.html">Faq's</a></li>
                                            <li><a href="404.html">404 Error</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <h6 class="menu-title">Inner Pages</h6>
                                        <ul class="submenu mega-sub-menu-01">
                                            <li><a href="gallery-grid.html">Gallery Grid</a></li>
                                            <li><a href="gallery-masonry.html">Gallery Masonry</a></li>
                                            <li><a href="event-grid.html">Event Grid</a></li>
                                            <li><a href="event-list.html">Event List</a></li>
                                            <li><a href="event-details.html">Event Details</a></li>
                                            <li><a href="pricing-table.html">Pricing Table</a></li>
                                            <li><a href="purchase-guide.html">Purchase Guide</a></li>
                                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                            <li><a href="terms-condition.html">Terms & Condition</a></li>
                                            <li><a href="my-account.html">Sign In</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <h6 class="menu-title">Shop Pages</h6>
                                        <ul class="submenu mega-sub-menu-01">
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-droupdown"><a href="#">Courses</a>
                                <ul class="submenu">
                                    <li><a href="course-one.html">Course Style 1</a></li>
                                    <li><a href="course-two.html">Course Style 2</a></li>
                                    <li><a href="course-three.html">Course Style 3</a></li>
                                    <li><a href="course-four.html">Course Style 4</a></li>
                                    <li><a href="course-five.html">Course Style 5</a></li>
                                    <li><a href="course-details.html">Course Details 1</a></li>
                                    <li><a href="course-details-2.html">Course Details 2</a></li>
                                    <li><a href="course-details-3.html">Course Details 3</a></li>
                                </ul>
                            </li>

                            <li class="has-droupdown"><a href="#">Blog</a>
                                <ul class="submenu">
                                    <li><a href="blog-standard.html">Blog Standard</a></li>
                                    <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                    <li><a href="blog-list.html">Blog List</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="has-droupdown"><a href="#">Contact</a>
                                <ul class="submenu">
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="contact-me.html">Contact Me</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Start Search Popup  -->
                <div class="edu-search-popup">
                    <div class="content-wrap">
                        <div class="site-logo">
                            <img class="logo-light" src="{{asset('front/images/logo/logo-dark.png')}}" alt="Corporate Logo">
                            <img class="logo-dark" src="{{asset('front/images/logo/logo-white.png')}}" alt="Corporate Logo">
                        </div>
                        <div class="close-button">
                            <button class="close-trigger"><i class="icon-73"></i></button>
                        </div>
                        <div class="inner">
                            <form class="search-form" action="#">
                                <input type="text" class="edublink-search-popup-field" placeholder="Search Here...">
                                <button class="submit-button"><i class="icon-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Search Popup  -->
            </header>
            <!--=========== Main Content Start ==========================-->

            @yield('content')


            <!--=========== Main Content End ==========================-->
            <!--=        Footer Area Start       	=-->
            <!--=====================================-->
            <!-- Start Footer Area  -->
            <footer class="edu-footer footer-lighten bg-image footer-style-1">
                <div class="footer-top">
                    <div class="container">
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-6">
                                <div class="edu-footer-widget">
                                    <div class="logo">
                                        <a href="index.html">
                                            <img class="logo-light" src="{{asset('front/images/logo/logo-dark.png')}}" alt="Corporate Logo">
                                            <img class="logo-dark" src="{{asset('front/images/logo/logo-white.png')}}" alt="Corporate Logo">
                                        </a>
                                    </div>
                                    <p class="description">Lorem ipsum dolor amet consecto adi pisicing elit sed eiusm tempor incidid unt labore dolore.</p>
                                    <div class="widget-information">
                                        <ul class="information-list">
                                            <li><span>Add:</span>70-80 Upper St Norwich NR2</li>
                                            <li><span>Call:</span><a href="tel:+011235641231">+01 123 5641 231</a></li>
                                            <li><span>Email:</span><a href="mailto:info@edublink.com" target="_blank">info@edublink.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="edu-footer-widget explore-widget">
                                    <h4 class="widget-title">Online Platform</h4>
                                    <div class="inner">
                                        <ul class="footer-link link-hover">
                                            <li><a href="about-one.html">About</a></li>
                                            <li><a href="course-one.html">Plan</a></li>                                         
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="edu-footer-widget quick-link-widget">
                                    <h4 class="widget-title">Links</h4>
                                    <div class="inner">
                                        <ul class="footer-link link-hover">
                                            <li><a href="#">Contact Us</a></li>
                                            <li><a href="#">Gallery</a></li>
                                            <li><a href="#">News & Articles</a></li>
                                            <li><a href="#">FAQ's</a></li>
                                            <li><a href="{{ route('front.login') }}">Sign In/Registration</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="edu-footer-widget">
                                    <h4 class="widget-title">Contacts</h4>
                                    <div class="inner">
                                        <p class="description">Enter your email address to register to our newsletter subscription</p>
                                        <div class="input-group footer-subscription-form">
                                            <input type="email" class="form-control" placeholder="Your email">
                                            <button class="edu-btn btn-medium" type="button">Subscribe <i class="icon-4"></i></button>
                                        </div>
                                        <ul class="social-share icon-transparent">
                                            <li><a href="#" class="color-fb"><i class="icon-facebook"></i></a></li>
                                            <li><a href="#" class="color-linkd"><i class="icon-linkedin2"></i></a></li>
                                            <li><a href="#" class="color-ig"><i class="icon-instagram"></i></a></li>
                                            <li><a href="#" class="color-twitter"><i class="icon-twitter"></i></a></li>
                                            <li><a href="#" class="color-yt"><i class="icon-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner text-center">
                                    <p>Copyright 2022 <a href="{{ route('front.index') }}" target="_blank">{{ env('APP_NAME') }}</a> Designed By <a href="{{ route('front.index') }}" target="_blank">{{ env('APP_NAME') }}</a>. All Rights Reserved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer Area  -->
        </div>

        <div class="rn-progress-parent">
            <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

        <!-- JS
            ============================================ -->
        <!-- Modernizer JS -->
        <script src="{{asset('front/js/vendor/modernizr.min.js')}}"></script>
        <!-- Jquery Js -->
        <script src="{{asset('front/js/vendor/jquery.min.js')}}"></script>
        <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('admin/js/additional-methods.min.js') }}"></script>
        <script src="{{asset('front/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/sal.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/backtotop.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/magnifypopup.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/jquery.countdown.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/odometer.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/isotop.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/imageloaded.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/lightbox.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/paralax.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/paralax-scroll.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/jquery-ui.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/svg-inject.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/vivus.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/tipped.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/smooth-scroll.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/isInViewport.jquery.min.js')}}"></script>
        <!-- Site Scripts -->
        <script src="{{asset('front/js/app.js')}}"></script>

        @yield('script')
    </body>
</html>
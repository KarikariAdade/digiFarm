<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="{{ asset('assets/main/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/responsive.css') }}">
    @stack('extra-css')
</head>
<body>
    <header class="ab fixed animated slideInDown">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="index.html" title="">
                        <img src="images/logo.png" alt="">
                    </a>
                </div><!--logo end-->
                <nav>
                    <ul>
                        <li><a href="{{ route('website.home') }}" title="">Home</a></li>
                        <li><a href="{{ route('website.about') }}">About</a></li>
                        <li><a href="{{ route('website.farmers') }}" title="">Our Farmers</a></li>
                        <li><a href="{{ route('website.market') }}" title="">Market</a></li>
                        <li><a href="{{ route('website.forum') }}" title="">Forum</a></li>
                        <li><a href="">Companies</a></li>
{{--                        </li>--}}
                        {{-- <li><a href="#" title="">Pages</a>
                            <ul>
                                <li><a href="shop.html" title="">Shop</a>
                                    <ul>
                                        <li><a href="shop-details.html" title="">Shop Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="shopping-cart.html" title="">Shopping Cart</a></li>
                                <li><a href="checkout.html" title="">Checkout</a></li>
                                <li><a href="faqs.html" title="">FAQs</a></li>
                                <li><a href="coming-soon.html" title="">Coming Soon</a></li>
                                <li><a href="404.html" title="">Error 404</a></li>
                                <li><a href="sign-in.html" title="">Sign In</a></li>
                                <li><a href="sign-up.html" title="">Sign Up</a></li>
                            </ul>
                        </li>
                        <li><a class="active" href="contact.html" title="">Contact</a></li> --}}
                    </ul>
                </nav><!--navigation end-->
                <div class="menu-bar">
                    <a href="#" title="">
                        <span class="bar1"></span>
                        <span class="bar2"></span>
                        <span class="bar3"></span>
                    </a>
                </div><!--menu-btn end-->
                <div class="contact">
                    <img src="images/user_icon.png" alt="">
                    <div class="contact-info">
                       <a href="{{ route('login') }}" class="btn btn-primary header-btn">Accounts</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div><!--header-content end-->
        </div>
    </header><!--header end-->

    <div class="mobile-menu">
        <div class="menu-bar">
            <a href="#" title="">
                <span class="bar1"></span>
                <span class="bar2"></span>
                <span class="bar3"></span>
            </a>
        </div><!--menu-btn end-->
        <ul>
            <li><a href="{{ route('home') }}" title="">Home</a></li>
            <li><a href="{{ route('website.about') }}" title="">Our Farmers</a></li>
            <li><a href="services.html" title="">Market</a></li>
            <li><a href="team.html" title="">Forum</a></li>
            <li><a href="">Companies</li>
            {{-- <li><a href="#" title="">Pages</a>
                <ul>
                    <li><a href="shop.html" title="">Shop</a></li>
                    <li><a href="shop-details.html" title="">Shop Details</a></li>
                    <li><a href="shopping-cart.html" title="">Shopping Cart</a></li>
                    <li><a href="checkout.html" title="">Checkout</a></li>
                    <li><a href="faqs.html" title="">FAQs</a></li>
                    <li><a href="coming-soon.html" title="">Coming Soon</a></li>
                    <li><a href="404-2.html" title="">Error 404</a></li>
                </ul>
            </li> --}}
            <li><a class="active" href="contact.html" title="">Contact</a></li>
        </ul>
    </div><!--mobile-menu end-->
    @yield('content')

    <footer>
            <div class="top-footer no-bg">
                <div class="container">
                    <div class="footer-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="widget widget-logo">
                                    <img src="images/ft-logo.png" alt="">
                                    <p>Lorem ipsum dolor amet consectetur adip- ielit sed eiusm tempor incididunt ut labore dolore magna aliqua enim ad minim veniam quis....</p>
                                </div><!--widget-about end-->
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <div class="widget widget-links">
                                    <h3 class="widget-title">QUICK LINKS</h3>
                                    <ul class="lnks-list">
                                        <li><a href="#" title="">How It Works</a></li>
                                        <li><a href="#" title="">Guarantee</a></li>
                                        <li><a href="#" title="">Report Bug</a></li>
                                        <li><a href="#" title="">Pricing</a></li>
                                    </ul>
                                </div><!--widget-links end-->
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="widget widget-contact">
                                    <h3 class="widget-title">Contact Us</h3>
                                    <ul class="lnks-list">
                                        <li>Street Number &amp; Name Postal Code 2034 UCC</li>
                                        <li>+233548876922</li>
                                        <li><a href="mailto:example@example.com" title="">www.digifarm.com</a></li>
                                    </ul>
                                </div><!--widget-links end-->
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6">
                                <div class="widget widget-about">
                                    <h3 class="widget-title">ABOUT</h3>
                                    <ul class="lnks-list">
                                        <li><a href="#" title="">About Singleton</a></li>
                                        <li><a href="#" title="">Team</a></li>
                                        <li><a href="#" title="">Testimonials</a></li>
                                        <li><a href="#" title="">Blog</a></li>
                                    </ul>
                                </div><!--widget-links end-->
                            </div>
                            <div class="col-lg-3 col-md-5">
                                <div class="widget widget-app">
                                    <h3 class="widget-title">Download the App</h3>
                                    <ul class="download-btns">
                                        <li><a href="#" title=""><img src="images/btn1.png" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/btn2.png" alt=""></a></li>
                                    </ul>
                                    <h3>Follow Us Now</h3>
                                    <ul class="social-links">
                                        <li><a href="#" title=""><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#" title=""><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" title=""><i class="fab fa-skype"></i></a></li>
                                        <li><a href="#" title=""><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div><!--widget-links end-->
                            </div>
                        </div>
                    </div><!--footer-content end-->
                </div>
            </div><!--top-footer end-->
            <div class="bottom-strip">
                <div class="container">
                    <div class="copyright-text">
                        <p><a href="">DigiFarm</a></p>
                        <ul class="ft-links">
                            <li><a href="#" title="">Privacy</a></li>
                            <li><a href="#" title="">FAQs</a></li>
                            <li><a href="#" title="">Account</a></li>
                        </ul><!--ft-links end-->
                        <div class="clearfix"></div>
                    </div><!--copyright-text end-->
                </div>
                <a href="#" title="" class="scrollTop"><i class="fa fa-arrow-up"></i></a>
            </div><!--bottom-strip end-->
        </footer>

    <script src="{{ asset('assets/main/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/scripts.js') }}"></script>
    @include('sweetalert::alert')
@stack('extra-js')
</body>
</html>

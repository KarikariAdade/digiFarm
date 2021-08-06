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
                        <li><a href="index.html" title="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="about.html" title="">Our Farmers</a></li>
                        <li><a href="services.html" title="">Market</a></li>
                        <li><a href="team.html" title="">Forum</a></li>
                        <li><a href="">Companies</li>
                        </li>
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
                       <a href="" class="btn btn-primary header-btn">Accounts</a>
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
            <li><a href="index.html" title="">Home</a></li>
                        <li><a href="about.html" title="">Our Farmers</a></li>
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

    <script src="{{ asset('assets/main/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/scripts.js') }}"></script>
</body>
</html>

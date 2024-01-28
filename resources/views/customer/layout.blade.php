<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bk-EShop - @yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}"/>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
          rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('customer/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/js/fancybox/source/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/jquery.scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/custom.css') }}">
    @yield('css')
</head>
<body class="home">
    <input type="hidden" id="auth-value" value="{{ $customer_data["is_login"] }}">
    <header class="header style7">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-left">
                    <div class="header-message">
                        Welcome to our online store!
                    </div>
                </div>
                <div class="top-bar-right"> 
                    <ul class="header-user-links">
                        <?php if (!$customer_data['is_login']): ?>  
                        <li>
                            <a href="{{ route("customer.view.login") }}">Đăng nhập</a>
                        </li>
                        <?php endif ?> 
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-header">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('customer/assets/logo1.png') }}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                        <div class="block-search-block">
                            <div class="form-search form-search-width-category">
                                <div class="form-content">
                                    <div class="category">
                                        <select title="cate" data-placeholder="All Categories" id="category-search" class="chosen-select category-list-top "
                                                tabindex="1"> 
                                        </select>
                                    </div>
                                    <div class="inner searchProduct">
                                        <input type="text" class="input search-input-wrapper" name="keywords" value="" placeholder="Bạn cần tìm gì ?">
                                        <div class="suggest-list"> 
                                            
                                        </div>
                                    </div>
                                    <button class="btn-search" type="submit">
                                        <span class="icon-search"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                        <div class="header-control">
                            <div class="block-minicart stelina-mini-cart block-header ">
                                <a href="{{ route("customer.view.cart") }}" class="shopcart-icon" data-stelina="stelina-dropdown">
                                    Giỏ hàng
                                    <span class="count"> 0 </span>
                                </a> 
                            </div>
                            <?php if ($customer_data['is_login']): ?>   
                            <div class="block-account block-header">
                                <a href="/profile">
                                    <div class="user-avatar" style="background-image: url('/<?php echo $customer_data['avatar'] ?>');"></div>
                                </a>
                            </div>
                            {{-- <?php else: ?>
                            <div class="block-account block-header stelina-dropdown">
                                <a href="javascript:void(0);" data-stelina="stelina-dropdown">
                                    <span class="flaticon-user"></span>
                                </a>
                                <div class="header-account stelina-submenu">
                                    <div class="header-user-form-tabs">
                                        <ul class="tab-link">
                                            <li class="active">
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">LOGIN</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Đăng ký thành viên</a>
                                            </li>
                                        </ul>
                                        <div class="tab-container">
                                            <div id="header-tab-login" class="tab-panel active">
                                                <form class="login form-login" id="login">
                                                    <div class="js-validate"></div>
                                                    <div class="error-log"></div>
                                                    <p class="form-row form-row-wide">
                                                        <input type="email" placeholder="Email" class="input-text data-email">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" class="input-text data-password" placeholder="Password">
                                                    </p> 
                                                    <p class="form-row lost_password">
                                                        <a href="#">Lấy mật khẩu</a>
                                                    </p>
                                                    <p class="form-row"> 
                                                        <button type="button" class="button form-submit" atr="Login">LOGIN</button>
                                                    </p>
                                                </form>
                                            </div>
                                            <form id="header-tab-rigister" class="tab-panel">
                                                <div class="register form-register" id="signup">
                                                    <div class="js-validate"></div>
                                                    <div class="error-log"></div>
                                                    <p class="form-row form-row-wide">
                                                        <input type="text" placeholder="Name" class="input-text data-name">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="email" placeholder="Email" class="input-text data-email">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" class="input-text data-password" placeholder="Password">
                                                    </p>
                                                    <p class="form-row"> 
                                                        <button type="button" class="button form-submit" atr="Register">Đăng ký thành viên</button>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}
                            <?php endif ?>
                            <a class="menu-bar mobile-navigation menu-toggle" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav-container rows-space-20">
            <div class="container">
                <div class="header-nav-wapper main-menu-wapper">
                    <div class="vertical-wapper block-nav-categori">
                        <div class="block-title">
							<span class="icon-bar">
								<span></span>
								<span></span>
								<span></span>
							</span>
                            <span class="text">Tất cả danh mục</span>
                        </div>
                        <div class="block-content verticalmenu-content">
                            <ul class="stelina-nav-vertical vertical-menu stelina-clone-mobile-menu clone-mobile-category">

                            </ul>
                        </div>
                    </div>
                    <div class="header-nav">
                        <div class="container-wapper">
                            <ul class="stelina-clone-mobile-menu stelina-nav main-menu " id="menu-main-menu">
                                <li class="menu-item">
                                    <a href="/" class="stelina-menu-item-title" title="Home">Trang Chủ</a> 
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.about") }}" class="stelina-menu-item-title" title="About Us">Giới thiệu</a>  
                                </li>  
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.rule_pay") }}">Thanh toán</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.rule_order") }}">Cách Thức Đặt Hàng</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.rule_ship") }}">Giao Hàng</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.contact") }}">Liên Hệ</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="header-device-mobile">
        <div class="wapper">
            <div class="item mobile-logo">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('customer/assets/logo1.png') }}" alt="img">
                    </a>
                </div>
            </div>
            <div class="item item mobile-search-box has-sub">
                <a href="#">
    						<span class="icon">
    							<i class="fa fa-search" aria-hidden="true"></i>
    						</span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="header-searchform-box">
                        <form class="header-searchform">
                            <div class="searchform-wrap">
                                <input type="text" class="search-input" placeholder="Enter keywords to search...">
                                <input type="submit" class="submit button" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <div class="item menu-bar">
                <a class=" mobile-navigation  menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </div>
    </div>
    <div>
        @yield('body')
    </div> 
    <footer class="footer style7">
        <div class="container">
            <div class="container-wapper">
                <div class="row">
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-sm hidden-md hidden-lg">
                        <div class="stelina-newsletter style1">
                            <div class="newsletter-head">
                                <h3 class="title">Tin tức</h3>
                            </div>
                            <div class="newsletter-form-wrap">
                                <div class="list">
                                    Bk-EShop - Nước hoa chính hãng, nước hoa Auth nhập khẩu từ các thương hiệu dầu thơm nổi tiếng trên thế giới
                                </div>
                                <input type="email" class="input-text email email-newsletter"
                                       placeholder="Tin nhắn của bạn">
                                <button class="button btn-submit submit-newsletter">Đăng ký thành viên
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="stelina-custommenu default">
                            <h2 class="widgettitle">Loại mặt hàng</h2>
                            <ul class="menu category-list-footer">

                            </ul>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs">
                        <div class="stelina-newsletter style1">
                            <div class="newsletter-head">
                                <h3 class="title">Tin tức</h3>
                            </div>
                            <div class="newsletter-form-wrap">
                                <div class="list">
                                    Bk-EShop chuyên nước hoa chính hãng, nước hoa Auth nhập khẩu từ các thương hiệu dầu thơm nổi tiếng trên thế giới
                                </div>
                                <input type="email" class="input-text email email-newsletter"
                                       placeholder="Tin nhắn của bạn">
                                <button class="button btn-submit submit-newsletter">Đăng ký thành viên
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="stelina-custommenu default">
                            <h2 class="widgettitle">Giới thiệu</h2>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.about") }}">Thông tin công ty</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.rule_privacy") }}">Chính sách bảo mật</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.rule_pay") }}">Thanh Toán</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.rule_order") }}">Cách Thức Đặt Hàng</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.rule_back") }}">Đổi trả</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.rule_product") }}">Về sản phẩm</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.rule_ship") }}">Giao Hàng</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.rule_recruit") }}">Thông tin tuyển dụng</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route("customer.view.contact") }}">Liên Hện Với Chúng Tôi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-end">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="stelina-socials">
                                <ul class="socials">
                                    <li>
                                        <a href="https://www.facebook.com" class="social-item" target="_blank">
                                            <i class="icon fa fa-facebook"></i>
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="https://www.instagram.com" class="social-item" target="_blank">
                                            <i class="icon fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="coppyright">
                                Copyright © 2023
                                <a href="#">Bk-EShop</a>
                                . All rights reserved
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-device-mobile">
        <div class="wapper">
            <div class="footer-device-mobile-item device-home">
                <a href="/">
    					<span class="icon">
    						<i class="fa fa-home" aria-hidden="true"></i>
    					</span>
                    Trang Chủ
                </a>
            </div> 
            <div class="footer-device-mobile-item device-home device-cart">
                <a href="{{ route("customer.view.cart") }}">
    					<span class="icon">
    						<i class="fa fa-shopping-basket" aria-hidden="true"></i>
    						<span class="count-icon">
    							0
    						</span>
    					</span>
                    <span class="text">Giỏ hàng</span>
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-user">
                <a href="<?php if ($customer_data['is_login']): ?>  /profile <?php else: ?> /login <?php endif ?>">
    					<span class="icon">
    						<i class="fa fa-user" aria-hidden="true"></i>
    					</span>
                    <?php if ($customer_data['is_login']): ?>  Trang của tôi <?php else: ?> LOGIN <?php endif ?> 
                </a>
            </div>
        </div>
    </div>
    <a href="#" class="backtotop">
        <i class="fa fa-angle-double-up"></i>
    </a>
    <script src="https://kit.fontawesome.com/d8162761f2.js"></script>
    <script src="{{ asset('customer/assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/jquery.plugin-countdown.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/jquery-countdown.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/mobile-menu.js') }}"></script>
    <script src="{{ asset('customer/assets/js/chosen.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/slick.js') }}"></script>
    <script src="{{ asset('customer/assets/js/jquery.elevateZoom.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/jquery.actual.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/fancybox/source/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('customer/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/owl.thumbs.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/frontend-plugin.js') }}"></script>

    <script src="{{ asset('customer/assets/js/api.js') }}"></script>
    <script src="{{ asset('customer/assets/js/pagination.js') }}"></script>
    <script src="{{ asset('customer/assets/js/page/layout.js') }}"></script>


    @yield('js')
</body>
</html>
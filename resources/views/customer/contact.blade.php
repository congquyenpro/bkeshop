@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')

<div class="main-content main-content-contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Liên hệ với chúng tôi
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-contact col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">Liên hệ với chúng tôi</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="page-main-content">
        <div class="google-map"> 
            <iframe width="100%" height="500" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7156114524396!2d105.84229207486176!3d21.00403398063914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ec11422d%3A0x2791469add0b8b05!2zxJDDoG8gdOG6oW8gUXXhu5FjIHThur8gKFNJRSkgLSBUcsaw4budbmcgxJDhuqFpIGjhu41jIELDoWNoIEtob2EgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1699197894790!5m2!1svi!2s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-contact">
                        <div class="col-lg-8 no-padding">
                            <div class="form-message">
                                <h2 class="title">
                                    Gửi tin nhắn cho chúng tôi
                                </h2>
                                <form action="#" class="stelina-contact-fom">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Tên của bạn *</span>
                                                <span class="form-control-wrap your-name">
                                                        <input title="your-name" type="text" name="your-name" size="40"
                                                               class="form-control form-control-name">
                                                    </span>
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>
                                                    <span class="form-label">
                                                        Email của bạn *
                                                    </span>
                                                <span class="form-control-wrap your-email">
                                                        <input title="your-email" type="email" name="your-email" size="40"
                                                               class="form-control form-control-email">
                                                    </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Số điện thoại</span>
                                                <span class="form-control-wrap your-phone">
                                                        <input title="your-phone" type="text" name="your-phone"
                                                               class="form-control form-control-phone">
                                                    </span>
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>
                                                    <span class="form-label">
                                                        Công ty
                                                    </span>
                                                <span class="form-control-wrap your-company">
                                                        <input title="your-company" type="text" name="your-company"
                                                               class="form-control your-company">
                                                    </span>
                                            </p>
                                        </div>
                                    </div>
                                    <p>
                                            <span class="form-label">
                                                Lời nhắn của bạn
                                            </span>
                                        <span class="wpcf7-form-control-wrap your-message">
                                                <textarea title="your-message" name="your-message" cols="40" rows="9"
                                                          class="form-control your-textarea"></textarea>
                                            </span>
                                    </p>
                                    <p>
                                        <input type="submit" value="Gửi tin nhắn"
                                               class="form-control-submit button-submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 no-padding">
                            <div class="form-contact-information">
                                <form action="#" class="stelina-contact-info">
                                    <h2 class="title">
                                        Thông tin liên hệ
                                    </h2>
                                    <div class="info">
                                        <div class="item address">
                                                <span class="icon">
                                                    
                                                </span>
                                            <span class="text">
                                                     Home-Choice
                                                </span>
                                        </div>
                                        <div class="item phone">
                                                <span class="icon">
                                                    
                                                </span>
                                            <span class="text">
                                                    09-6632-0416
                                                </span>
                                        </div>
                                        <div class="item email">
                                                <span class="icon">
                                                    
                                                </span>
                                            <span class="text">
                                                    homchoiceshop@gmail.com
                                            </span>
                                        </div>
                                    </div>
                                    <div class="socials">
                                        <a href="https://www.facebook.com" class="social-item" target="_blank">
                                                <span class="icon fa fa-facebook">
                                                    
                                                </span>
                                        </a> 
                                        <a href="https://www.instagram.com" class="social-item" target="_blank">
                                                <span class="icon fa fa-instagram">
                                                    
                                                </span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/assets/js/page/index.js') }}"></script>
@endsection()
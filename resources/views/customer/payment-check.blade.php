@extends('customer.layout')
@section('title', "Trang Chủ")


@section('css')

@endsection()


@section('body')

    <div class="main-content main-content-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="/">Trang Chủ</a>
                            </li>
                            <li class="trail-item trail-end active">
                                Thanh toán
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <h3 class="custom_blog_title">
                            Thanh toán hóa đơn
                        </h3>
                        <div class="customer_login">

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-3">
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3">
                                    <div style="text-align: center;">
                                        <img style="height: 7rem;" src="https://vinpearlbooking.com.vn/wp-content/uploads/2021/10/icon-thanh-cong-300x300.png" alt="" srcset="">
                                        <p></p>
                                        <p>Thanh toán thành công !</p>
                                        <p>Thông tin đơn hàng sẽ được cập nhật liên tục.</p>
                                        <a  href="{{ route("customer.view.index") }}" class="btn-auth-action button-submit form-submit m-r-20">Tiếp tục mua hàng</a>  
                                        <a href="{{ route("customer.view.login") }}" type="button" class="btn-auth-action register-button" atr="Login">Theo dõi đơn hàng</a>   
                                    </div>
                                    

                                </div> 
                                <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-3">
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
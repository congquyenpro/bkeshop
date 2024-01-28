@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')
<div class="main-content main-content-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="trail-item trail-end active">
                            GIAO HÀNG
                        </li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="row m-t-50">
            <div class="content-area content-about col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="about-wrapper">
                        <h3 class="custom_blog_title">GIAO HÀNG</h3>
                        <div class="page-main-content about-us-content">
                            <p>-Mất bao lâu để nhận được đơn đặt hàng của tôi?</p> 
                            <p>Có thể giao hàng trong 3 ngày.</p>
                            <p>-Số ngày và thời gian giao hàng sẽ khác nhau tùy thuộc vào sản phẩm bạn đặt hàng và khu vực giao hàng. Nếu khu vực giao hàng là TP HCM, về nguyên tắc có thể giao hàng vào ngày hôm sau sau khi vận chuyển.</p>
                            <p>-Sau khi sản phẩm bạn đặt hàng được vận chuyển, chúng tôi sẽ thông báo cho bạn số theo dõi của đơn vị vận chuyển để bạn có thể kiểm tra chi tiết gói hàng của mình trên trang web đơn vị vận chuyển.</p> 
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
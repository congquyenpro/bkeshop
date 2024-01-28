@extends('customer.layout')
@section('title', "Trang chủ")


@section('css')

@endsection()


@section('body')    
    <div class="fullwidth-template">
        <div class="home-slider-banner">
            <div class="container">
                <div class="row10">
                    <div class="col-lg-8 silider-wrapp">
                        <div class="home-slider">
                            <div class="slider-owl owl-slick equal-container nav-center product-trending-list"
                                 data-slick='{"autoplay":true, "autoplaySpeed":9000, "arrows":false, "dots":true, "infinite":true, "speed":1000, "rows":1}'
                                 data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 banner-wrapp">
                        <div class="banner">
                            <div class="item-banner style7">
                                <div class="inner" style="background-image: url('{{ asset("dior.jpg")  }}');">
                                    <div class="banner-content">
                                        <h3 class="title">Sản Phẩm Bán Chạy</h3>
                                        <div class="description">
                                        </div>
                                        <a href="/category?status=hot" class="button btn-lets-do-it">Mua Ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banner">
                            <div class="item-banner style8">
                                <div class="inner">
                                    <div class="banner-content">
                                        <h3 class="title">Sản Phẩm Mới</h3>
                                        <div class="description">
                                        </div>
                                        <a href="/category?status=new" class="button btn-lets-do-it">Mua Ngay</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="stelina-product produc-featured rows-space-65">
            <div class="container">
                <h3 class="custommenu-title-blog">
                    Ưu Đãi Hôm Nay
                </h3>
                <div class="owl-products owl-slick equal-container nav-center product-new-list"
                     data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":false, "speed":800, "rows":1}'
                     data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":4}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'> 

                </div>
            </div>
        </div>
               
               
 
 

            <!-- </div>
                <div class="owl-products owl-slick equal-container nav-center product-new-list"
                     data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":false, "speed":800, "rows":1}'
                     data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":4}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'> 

                </div>
            </div> -->
        </div>
        <div class="banner-wrapp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="banner">
                            <div class="item-banner style4">
                                <div class="inner">
                                    <div class="banner-content">
                                        {{-- <h4 class="stelina-subtitle">TOP STAFF PICK</h4> --}}
                                        <h3 class="title">Bộ Sưu Tập</h3>
                                        {{-- <div class="description">
                                            Proin interdum magna primis id consequat
                                        </div> --}}
                                        <a href="/category?status=colections" class="button btn-shop-now">Mua Ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="banner">
                            <div class="item-banner style5">
                                <div class="inner">
                                    <div class="banner-content">
                                        <h3 class="title">Tất Cả Sản Phẩm</h3> 
                                        <a href="/category?category=0" class="button btn-shop-now">Mua Ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-wrapp rows-space-65">
            <div class="container">
                <div class="banner">
                    <div class="item-banner style17">
                        <div class="inner">
                            <div class="banner-content">
                                <h3 class="title">Dior</h3>
								<div class="description">
                                    You have no items &amp; Are you <br>ready to use? come &amp; shop with us!
                                </div>
                                <a href="/category?category=3" class="button btn-shop-now">Mua Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="stelina-tabs  default rows-space-40">
            <div class="container">
                <div class="tab-head">
                    <ul class="tab-link">
                        <!-- <li class="active">
                            <a data-toggle="tab" aria-expanded="true" href="#bestseller">Bestseller</a>
                        </li> -->
                        <li class="active">
                            <a data-toggle="tab" aria-expanded="true" href="#new_arrivals">Sản Phẩm Mới</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" aria-expanded="true" href="#top-rated">Sản Phẩm Hot</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-container"> 
                    <div id="new_arrivals" class="tab-panel active">
                        <div class="stelina-product">
                            <ul class="row list-products auto-clear equal-container product-grid">

                            </ul>
                        </div>
                    </div>
                    <div id="top-rated" class="tab-panel">
                        <div class="stelina-product">
                            <ul class="row list-products auto-clear equal-container product-grid">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stelina-iconbox-wrapp default">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="stelina-iconbox  default">
                            <div class="iconbox-inner">
                                <div class="icon-item">
                                    <span class="icon flaticon-rocket-ship"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        Chuyển phát nhanh/Giao hàng miễn phí
                                    </h4>
                                    <div class="text">
                                        Phí vận chuyển bổ sung có thể áp dụng cho các đảo xa và một số khu vực.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="stelina-iconbox  default">
                            <div class="iconbox-inner">
                                <div class="icon-item">
                                    <span class="icon flaticon-return"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        Có thể trả/trao đổi được không?
                                    </h4>
                                    <div class="text">
                                        Chúng tôi sẽ chỉ chấp nhận trả lại hoặc trao đổi nếu sản phẩm chưa được sử dụng (chưa mở) và không được cấp nguồn trong vòng 3 ngày kể từ ngày nhận sản phẩm.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="stelina-iconbox  default">
                            <div class="iconbox-inner">
                                <div class="icon-item">
                                    <span class="icon flaticon-padlock"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        Bảo vệ thông tin cá nhân
                                    </h4>
                                    <div class="text">
                                        Khi Home Choice xử lý thông tin này, chúng tôi sẽ đảm bảo không rò rỉ thông tin cho bên thứ ba trong mọi trường hợp xử lý. Chúng tôi sẽ xử lý thông tin của bạn với sự cẩn trọng tối đa và tiêu chuẩn bảo mật cao nhất.
                                    </div>
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
        
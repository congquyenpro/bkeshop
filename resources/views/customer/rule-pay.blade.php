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
                            Thanh toán
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="row m-t-50">
            <div class="content-area content-about col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="about-wrapper">
                        <h3 class="custom_blog_title">Về thanh toán</h3>
                        <div class="page-main-content about-us-content">
                            <p class="bold">○ Thanh toán khi nhận hàng</p>
                            <br>
                            <p>Vui lòng thanh toán khi nhận được sản phẩm.(Phí do khách hàng chịu)</p> 
                            <p>*Nếu bạn đặt hàng bằng tiền mặt khi giao hàng, tổng số tiền bao gồm phí xử lý lên tới 300.000₫  cho mỗi đơn hàng. Đối với đơn hàng trên 300.000₫, vui lòng chia đơn hàng thành nhiều đơn hàng.</p>
                            <br>
                            <p class="bold">○ Chuyển khoản ngân hàng(Phí do khách hàng chịu)</p>
                            <p>Tài khoản đại diện của Cửa hàng HomeChoice
                            <br>
                            <p>1: Ngân hàng Viettinbank </p>
                            <p>Tên chi nhánh :CN Hai Bà Trưng</p>
                            <p>Số tài khoản: 108872276485</p>
                            <p>TRAN MINH HOAN</p>
                            <br>
                            <p>2: Ngân hàng MBbank </p>
                            <p>Tên chi nhánh :CN Hai Bà Trưng</p>
                            <p>Số tài khoản: 0856056567</p>
                            <p>NGUYEN VAN HUY</p>
                            <br>
                            <p>3: Ngân hàng MBbank </p>
                            <p>Tên chi nhánh :CN Hai Bà Trưng</p>
                            <p>Số tài khoản: 0818618635</p>
                            <p>NGUYEN CONG QUYEN</p>
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
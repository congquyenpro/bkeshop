@extends('customer.layout')
@section('title', "AboutUs")


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
                            Thông tin công ty
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="row m-t-50">
            <div class="content-area content-about col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="about-wrapper">
                        <h3 class="custom_blog_title">Thông tin công ty</h3>
                        <div class="layout-table-container">
                            <div class="table-item-wrapper">
                                <div class="item-title">
                                    Tên công ty
                                </div>
                                <div class="item-data">
                                    <p> Home-Choice </p> 
                                </div>
                            </div>
                            <div class="table-item-wrapper">
                                <div class="item-title">
                                    Tên các cổ đông
                                </div>
                                <div class="item-data">
                                    <p>Nguyễn Công Quyền, Trần Minh Hoàn, Nguyễn Văn Huy </p>
                                </div>
                            </div>
                            <div class="table-item-wrapper">
                                <div class="item-title">
                                    Trụ sở chính
                                </div>
                                <div class="item-data">
                                    <p> Ha Noi </p>
                                </div>
                            </div> 
                            <div class="table-item-wrapper">
                                <div class="item-title">
                                    Chi tiết doanh nghiệp
                                </div>
                                <div class="item-data">
                                    <p> 1. Lập kế hoạch, sản xuất, kinh doanh và xuất nhập khẩu các thiết bị điện tử, đồ gia dụng, sản phẩm nhãn hiệu riêng, v.v. </p>
                                    <p> 2.Mua bán đồ gia dụng cũ và mới</p>
                                    <p> 3. Phân loại, đóng gói, vận chuyển và giao hàng務 </p>
                                    <p> 4.Quảng cáo và khuyến mãi sử dụng Internet</p>
                                    <p> 5. Quy hoạch và vận hành hệ thống  </p>
                                    <p> 6.Tất cả các hoạt động liên quan đến các mục trước</p>
                                </div>
                            </div>  
                            <div class="table-item-wrapper">
                                <div class="item-title">
                                    Địa điểm trụ sở chính
                                </div>
                                <div class="item-data">
                                    <p> 68 Phố Trần Đại Nghĩa, Hai Bà Trưng, Hà Nội </p>
                                    <p> Điện thoại : 0923456789 </p>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="about-wrapper">
                        <h3 class="custom_blog_title">Bản đồ truy cập trụ sở chính</h3>
                        <iframe width="100%" height="500" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7156114524396!2d105.84229207486176!3d21.00403398063914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ec11422d%3A0x2791469add0b8b05!2zxJDDoG8gdOG6oW8gUXXhu5FjIHThur8gKFNJRSkgLSBUcsaw4budbmcgxJDhuqFpIGjhu41jIELDoWNoIEtob2EgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1699197894790!5m2!1svi!2s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
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
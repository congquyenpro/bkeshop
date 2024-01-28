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
                            Cách thức đặt hàng
                        </li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="row m-t-50">
            <div class="content-area content-about col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="about-wrapper">
                        <h3 class="custom_blog_title">Cách thức đặt hàng</h3>
                        <div class="page-main-content about-us-content">
                            <p class="bold">Bước 1: Tìm kiếm sản phẩm</p> 
                            <p>Tìm kiếm theo tên sản phẩm hoặc từ khóa</p>
                            <p>Trong hộp tìm kiếm ở đầu trang đầu, hãy nhập tên sản phẩm hoặc từ khóa bạn đang tìm kiếm và tìm kiếm.</p>
                            <p>Bạn có thể chọn thể loại sản phẩm bạn đang tìm kiếm và tìm kiếm sản phẩm.</p>
                            <br>
                            <p class="bold">Bước 2: Lựa chọn sản phẩm</p> 
                            <p> Nhấp vào sản phẩm bạn muốn mua từ kết quả tìm kiếm</p>
                            <p>Khi bạn tìm thấy sản phẩm bạn đang tìm kiếm, vui lòng nhấp vào nó</p>
                            <br>
                            <p class="bold">Bước 3: Thủ tục mua hàng</p> 
                            <p> -Kiểm tra sản phẩm và nhấp vào nút "Thanh toán".</p>
                            <p>-Nếu bạn là thành viên, vui lòng nhập ID người dùng và mật khẩu của bạn. Xác nhận ID người dùng và mật khẩu của bạn, sau đó nhấp vào "Đăng nhập".</p>
                            <p>-Đối với người dùng lần đầu và những người không đăng ký làm thành viên</p>
                            <p>1.Nhập thông tin của bạn</p>
                            <p>Nhập thông tin người đặt hàng của bạn, chẳng hạn như tên, mã zip và địa chỉ của bạn.</p>
                            <p>2. Chỉ định địa chỉ giao hàng</p>
                            <p>Nếu địa chỉ giao hàng giống với thông tin của người đặt hàng, hãy chọn "Giống như người đặt hàng". Nếu bạn muốn yêu cầu một địa chỉ giao hàng khác, vui lòng kiểm tra "Chỉ định địa chỉ giao hàng khác".</p>
                            <p>3. Chọn phương thức thanh toán của bạn</p>
                            <br>
                            <p class="bold">Bước 4: Xác nhận chi tiết đơn hàng của bạn</p> 
                            <p>Vui lòng kiểm tra chi tiết đơn hàng và nhấp vào nút "Xác nhận đơn hàng".</p>
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
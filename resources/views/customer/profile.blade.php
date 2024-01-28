@extends('customer.layout')
@section('title', '')


@section('css')
    <link rel="stylesheet" href="{{ asset('customer/assets/css/more/profile.css') }}">
@endsection()


@section('body')
    <div class="main-content main-content-about">

        <div class="container I-profile">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="profile-control-wrapper">
                        <div class="profile-info-wrapper">
                            <div class="info-avatar" style="background-image: url('/');"></div>
                            <div class="info-data">
                                <h5 class="name"></h5>
                                <h6 class="email"></h6>
                            </div>
                        </div>
                        <div class="profile-action-wrapper">
                            <div class="action-item is-select" tab-item="Information"><i class="fas fa-user"></i>Chỉnh sửa
                                Thông tin</div>
                            <div class="action-item" tab-item="Order"><i class="fas fa-clipboard-list"></i>Lịch sử đặt hàng
                            </div>
                            <div class="action-item" tab-item="Password"><i class="fas fa-key"></i>Thay đổi mật khẩu của bạn
                            </div>
                            <div class="action-item"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit(); localStorage.removeItem('card')">
                                <i class="fas fa-sign-out-alt"></i>Đăng xuất
                            </div>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                                @csrf </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="profile-data-wrapper is-open" view-data="Profile">
                        <div class="profile-data-block is-open" tab-data="Information">
                            <div class="profile-wrapper">
                                <div class="profile-header">
                                    <h3>Chỉnh sửa thông tin thành viên</h3>
                                    <p>Chỉnh sửa thông tin thành viên</p>
                                </div>
                                <div class="profile-body">
                                    <div class="row">
                                        <form autocomplete="off" class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                            <div class="error-log"></div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Địa chỉ email
                                                </div>
                                                <div class="profile-value">
                                                    {{ $customer_data['email'] }}
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Tên
                                                </div>
                                                <div class="profile-value">
                                                    <input type="text" value="" class="data-name">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Địa chỉ
                                                </div>
                                                <div class="profile-value">
                                                    <input type="text" value="" class="data-address">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Số điện thoại
                                                </div>
                                                <div class="profile-value">
                                                    <input type="text" value="" class="data-phone">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Giới tính
                                                </div>
                                                <div class="profile-value">
                                                    <input type="radio" id="male-option" name="sex" class="data-sex" value="1">
                                                    <label for="Nam">Nam</label><br>
                                                    <input type="radio" id="female-option" name="sex" class="data-sex" value="2">
                                                    <label for="Nữ">Nữ</label><br>
                                                    {{-- <div class="data-sex-option"></div> --}}
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Ngày sinh
                                                </div>
                                                <div class="profile-value">
                                                    <input type="text" value="" class="data-birthday"
                                                        placeholder="dd/mm/yyyy" maxlength="10" oninput="formatDate(this)"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="profile-component">
                                                <div class="profile-title">

                                                </div>
                                                <div class="profile-value">
                                                    <div class="action-save" atr="Save">
                                                        Lưu
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 avatar-wrapper">
                                            <div>
                                                <div class="image-wrapper"> </div>
                                                <label for="avatar">Thay đổi ảnh hồ sơ của bạn</label>
                                                <input type="file" id="avatar" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-data-block order-block" tab-data="Order">
                            <div class="order-wrapper">
                                <div class="order-nav">
                                    <div class="order-nav-item is-select">
                                        Tất cả
                                    </div>
                                    <div class="order-nav-item" order-status="0">
                                        Đang xác nhận
                                    </div>
                                    <div class="order-nav-item" order-status="3">
                                        Chờ lấy hàng
                                    </div>
                                    <div class="order-nav-item" order-status="4">
                                        Đang vận chuyển
                                    </div>
                                    <div class="order-nav-item" order-status="6">
                                        Giao hàng hoàn tất
                                    </div>
                                    <div class="order-nav-item" order-status="7">
                                        Đơn hàng hủy
                                    </div>
                                </div>
                                <div class="order-main">
                                    {{-- <form class="order-item-search" autocomplete="off">
                                    <input type="text" placeholder="Tìm kiếm theo mã đơn hàng, sản phẩm,...">
                                </form> --}}
                                    <div class="order-item-list">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-data-block " tab-data="Password">
                            <div class="profile-wrapper">
                                <div class="profile-header">
                                    <h3>Thay đổi mật khẩu của bạn</h3>
                                </div>
                                <div class="profile-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                            <div class="error-log"></div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Mật khẩu trước đó
                                                </div>
                                                <div class="profile-value">
                                                    <input type="password" value="" class="data-oldpass">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Mật khẩu mới
                                                </div>
                                                <div class="profile-value">
                                                    <input type="password" value="" class="data-newpass">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Xác minh mã
                                                </div>
                                                <div class="profile-value">
                                                    <input type="text" value="" class="data-code">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">

                                                </div>
                                                <div class="profile-value">
                                                    <div class="action-save" atr="Send">
                                                        Gửi mã xác minh
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-data-wrapper order-tab-wrapper" view-data="OrderDetail">
                        <div class="go-back">
                            <div class="do-action"><i class="fas fa-caret-left m-r-20"></i>Trở lại</div>
                        </div>
                        <div class="profile-data-block is-open">
                            <div class="order-procedure-wrapper">
                                <h5 class="title">Thông tin</h5>
                                <div class="row description-wrapper">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <div class="user-data">
                                            <i class="fas fa-user m-r-20"></i><span class="data-name"> </span>
                                        </div>
                                        <div class="user-data">
                                            <i class="fas fa-map-marked-alt m-r-20"></i><span class="data-address">
                                            </span>
                                        </div>
                                        <div class="user-data">
                                            <i class="fas fa-phone m-r-20"></i><span class="data-phone"> </span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 procedure-border procedure-timeline">
                                    </div>
                                </div>
                            </div>
                            <div class="profile-fill"></div>
                            <div class="order-item-wrapper">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function formatDate(input) {
            // Chỉ xử lý khi độ dài của ngày là 2, 5, 10
            if ([2, 5].includes(input.value.length) && input.value[input.value.length - 1] !== '/') {
                input.value += '/';
            }
        }
    </script>
@endsection()

@section('sub_layout')

@endsection()


@section('js')
    <script type="text/javascript" src="{{ asset('customer/assets/js/page/profile.js') }}"></script>
@endsection()

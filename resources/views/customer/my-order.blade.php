@extends('customer.layout')
@section('title', '')


@section('css')
    <style>
        .order-table {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        .table-success {
            background-color: #29bb94;
            color: #fff;
        }
    </style>
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
                                Theo dõi đơn hàng
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content-area content-about col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="about-wrapper">
                        <h3 class="custom_blog_title">Theo dõi đơn hàng</h3>
                    </div>
                    <div class="order-table">
                        <div class="row">
                            <div class="col-sm-4 ">
                                <table class="table">
                                    <thead class="table-success">
                                        <tr>
                                            <th colspan="2">Người gửi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Shop</td>
                                            <td>Bk-eShop</td>
                                        </tr>
                                        <tr>
                                            <td>Điện thoại</td>
                                            <td>0888222666</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>167 Trương Định, Hai Bà Trưng, Hà Nội</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-4 ">
                                <table class="table">
                                    <thead class="table-success">
                                        <tr>
                                            <th colspan="2">Người nhận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tên người nhận</td>
                                            <td>Cong Quyen</td>
                                        </tr>
                                        <tr>
                                            <td>Điện thoại</td>
                                            <td>0888336888</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>Phường 14, Quận 10, Hồ Chí Minh, Vietnam</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-4 ">
                                <table class="table">
                                    <thead class="table-success">
                                        <tr>
                                            <th colspan="2">Thông tin đơn hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mã vận đơn</td>
                                            <td>JHGN7</td>
                                        </tr>
                                        <tr>
                                            <td>Mã đơn khách hàng</td>
                                            <td>12</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày dự kiến giao</td>
                                            <td>25-12-2023</td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái</td>
                                            <td>Đã thanh toán</td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái giao hàng</td>
                                            <td>{{ $last_status }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <table class="table">
                                    <thead class="table-success">
                                        <tr>
                                            <th colspan="2">Chi tiết đơn hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sản phẩm</td>
                                            <td>Nước hoa x3</td>
                                        </tr>
                                        <tr>
                                            <td>Cân nặng</td>
                                            <td>600 gram</td>
                                        </tr>
                                        <tr>
                                            <td>Người trả</td>
                                            <td>Người gửi trả phí</td>
                                        </tr>
                                        <tr>
                                            <td>Lưu ý giao hàng</td>
                                            <td>Cho thử hàng</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-8">
                              <table class="table">
                                  <thead class="table-success">
                                      <tr>
                                          <th colspan="3">Chi tiết đơn hàng</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        <th>Thời gian</th>
                                        <th>Trạng thái đơn</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </tbody>
                                <tbody id="order-log-table">
                                    @foreach ($order_log as $item)
                                        <tr>
                                            <td>{{ $item[1] }}</td>
                                            <td>{{ $item[0] }}</td>
                                            <td>{{ $item[2] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                          </div>
{{--                             <div class="col-sm-8">
                                <table class="table">
                                    <table class="table">
                                        <thead class="table-success">
                                            <tr>
                                                <th colspan="3">Theo dõi đơn hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Thời gian</th>
                                                <th>Trạng thái đơn</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </tbody>
                                        <tbody id="order-log-table">
                                            @foreach ($order_log as $item)
                                                <tr>
                                                    <td>{{ $item[1] }}</td>
                                                    <td>{{ $item[0] }}</td>
                                                    <td>{{ $item[2] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div> --}}
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

    {{-- API GHN --}}
    <script src="{{ asset('manager/assets/js/page/more/api-ghn/order.js') }}"></script>
    <script src="{{ asset('manager/assets/js/page/more/api-ghn/api.js') }}"></script>
    <script src="{{ asset('manager/assets/js/page/more/api-ghn/my-order.js') }}"></script>

@endsection()

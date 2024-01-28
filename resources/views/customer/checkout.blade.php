@extends('customer.layout')
@section('title', "Về chúng tôi")


@section('css')

@endsection()


@section('body')
<div class="main-content main-content-checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="/">Trang Chủ</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Thanh Toán
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <h3 class="custom_blog_title">
            Thanh Toán
        </h3>
        <div class="checkout-wrapp cart-form-data"  >
            <div class="shipping-address-form-wrapp">
                <div class="shipping-address-form  checkout-form">
                    <div class="row-col-1 row-col">
                        <div class="shipping-address js-validate"> 
                            <h3 class="title-form">
                                Thông Tin Đơn Hàng
                            </h3>
                            <div class="error-log"></div>
                            <input title="id" type="hidden" class="input-text data-id" value="{{ $customer_data["is_login"] == 1 ? $customer_data["id"] : "" }}">
                            <p class="form-row form-row-first">
                                <label class="text">Tên</label>
                                <input title="Name" type="text" class="input-text data-name" value="{{ $customer_data["is_login"] == 1 ? $customer_data["name"] : "" }}">
                            </p> 
                            <p class="form-row form-row-last">
                                <label class="text">Zipcode</label>
                                <input title="Zipcode" type="text" class="input-text data-zipcode" value="{{ $customer_data["is_login"] == 1 ? $customer_data["zipcode"] : "" }}">
                            </p>
                            <p class="form-row form-row-first">
                                <label class="text">Email</label>
                                <input title="Email" type="text" class="input-text data-email" value="{{ $customer_data["is_login"] == 1 ? $customer_data["email"] : "" }}">
                            </p>
                            <p class="form-row form-row-last">
                                <label class="text">SĐT</label>
                                <input title="Telephone" type="text" class="input-text data-phone data-number" value="{{ $customer_data["is_login"] == 1 ? $customer_data["phone"] : "" }}">
                            </p>
                            <p class="form-row form-row-first">
                                <label class="text">Địa chỉ</label>
                                <input title="Address" type="text" class="input-text data-address" value="{{ $customer_data["is_login"] == 1 ? $customer_data["address"] : "" }}">
                            </p>
                            <div> 
                                <label class="text">Ghi chú thêm</label>
                                <textarea title="Description" type="text" class="input-text data-description">
                                    
                                </textarea> 
                            </div>
                            <div class="m-t-15">
                                <div>
                                    <input type="radio" id="account1" value="1" name="payment_method" checked="" style="width: auto; height: auto;">
                                    <label for="account1">Thanh toán khi nhận hàng</label>
                                </div>
                                <div>
                                    <input type="radio" id="account2" value="2" name="payment_method" style="width: auto; height: auto;">
                                    <label for="account2">Thanh toán ngay với VNPay</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-col-2 row-col">
                        <div class="your-order">
                            <h3 class="title-form">
                                Đơn Hàng Của Bạn
                            </h3>
                            <ul class="list-product-order"><li class="product-item-order">
                            </ul>
                            <div class="order-total">
                                <span class="title">
                                    Tổng Giá Trị:
                                </span>
                                <span class="total-price">300.000₫</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="button button-payment">Đặt Hàng</a>
            </div> 
        </div>
    </div>
</div>
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/assets/js/page/checkout.js') }}"></script>
@endsection()
@extends('customer.layout')
@section('title', "Gio hang")


@section('css')

@endsection()


@section('body')
<main class="site-main  main-container no-sidebar">
    <div class="container">
        <div class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin">
                    <a href="">
                            <span>
                                Trang chủ
                            </span>
                    </a>
                </li>
                <li class="trail-item trail-end active">
                        <span>
                            Giỏ hàng
                        </span>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="main-content-cart main-content col-sm-12">
                <h3 class="custom_blog_title">
                    Giỏ hàng
                </h3>
                <div class="page-main-content">
                    <div class="shoppingcart-content">
                        <form action="shoppingcart.html" class="cart-form">
                            <table class="shop_table">
                                <thead>
                                <tr>
                                    <th class="product-remove"></th>
                                    <th class="product-thumbnail"></th>
                                    <th class="product-name"></th>
                                    <th class="product-price"></th>
                                    <th class="product-quantity"></th>
                                    <th class="product-subtotal"></th>
                                </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                        <td class="actions">
                                            <div class="coupon">

                                            </div>
                                            <div class="order-total">
                                                <span class="title">
                                                    Total Price:
                                                </span>
                                                <span class="total-price">
                                                    
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div class="control-cart">
                            <a href="/category" class="button btn-continue-shopping">
                                 Tiếp tục mua sắm
                            </a>
                            <a href="<?php if ($customer_data['is_login']): ?>  /checkout <?php else: ?> /checkout-login <?php endif ?> " class="button btn-cart-to-checkout">
                                Mua ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/assets/js/page/cart.js') }}"></script>
@endsection()
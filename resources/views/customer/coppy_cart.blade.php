{{-- @extends('customer.layout')
@section('title', "Trang Chủ")


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
                                Trang Chủ
                            </span>
                    </a>
                </li>
                <li class="trail-item trail-end active">
                        <span>
                            Giỏ Hàng
                        </span>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="main-content-cart main-content col-sm-12">
                <h3 class="custom_blog_title">
                    Giỏ Hàng
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
                                <tbody><tr class="cart_item" product-id="15" metadata="{&quot;data&quot;:[{&quot;id&quot;:1,&quot;size&quot;:90,&quot;prices&quot;:9500,&quot;discount&quot;:0}]}" prices="9500" qty="1">
                            <td class="product-remove">
                                <a class="remove"></a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="http://127.0.0.1:8000/ProductDetail" target="_blank">
                                    <img src="https://sbtc.co.jp/image-upload/1656937410guc1452-sale_1.jpg" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                </a>
                            </td>
                            <td class="product-name" data-title="Product">
                                <a href="http://127.0.0.1:8000/ProductDetail" target="_blank" class="title">Nước Hoa Chanel</a>
                                <span class="attributes-select attributes-color">90 ml</span> 
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <div class="control"> 
                                        <input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4"> 
                                    </div>
                                </div>
                            </td>
                            <td class="product-price" data-title="Price">
                                <span class="woocommerce-Price-amount amount">
                                	<span class="woocommerce-Price-currencySymbol">3.000.000₫</span>
                                </span>
                            </td>
                        </tr><tr class="cart_item" product-id="3" metadata="{&quot;data&quot;:[{&quot;id&quot;:1,&quot;size&quot;:35,&quot;prices&quot;:13700,&quot;discount&quot;:0},{&quot;id&quot;:2,&quot;size&quot;:50,&quot;prices&quot;:18000,&quot;discount&quot;:0},{&quot;id&quot;:3,&quot;size&quot;:100,&quot;prices&quot;:25000,&quot;discount&quot;:0}]}" prices="13700" qty="1">
                            <td class="product-remove">
                                <a class="remove"></a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="/product/3-no.5-edp・sp" target="_blank">
                                    <img src="https://sbtc.co.jp/image-upload/1656934647cha-6046289.webp" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                </a>
                            </td>
                            <td class="product-name" data-title="Product">
                                <a href="/product/3-no.5-edp・sp" target="_blank" class="title">Nước Hoa Gucci</a>
                                <span class="attributes-select attributes-color">35 ml</span> 
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <div class="control"> 
                                        <input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4"> 
                                    </div>
                                </div>
                            </td>
                            <td class="product-price" data-title="Price">
                                <span class="woocommerce-Price-amount amount">
                                	<span class="woocommerce-Price-currencySymbol">1.300.000₫</span>
                                </span>
                            </td>
                        </tr> 
                                    <tr>
                                        <td class="actions">
                                            <div class="coupon">

                                            </div>
                                            <div class="order-total">
                                                <span class="title">
                                                    Tổng Giá Trị:
                                                </span>
                                                <span class="total-price">4.300.000₫</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div class="control-cart">
                            <a href="/category" class="button btn-continue-shopping">
                                Tiếp Tục Mua Sắm
                            </a>
                            <a href=" /checkout-login  " class="button btn-cart-to-checkout">
                                Mua Ngay
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
@endsection() --}}
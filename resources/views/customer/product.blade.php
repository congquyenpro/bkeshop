@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')
<div class="main-content main-content-details single no-sidebar">
    <input type="hidden" class="product-id" value="{{ $id }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="trail-item category-data-name">
                            <a href="#"> </a>
                        </li>
                        <li class="trail-item trail-end active item-data-name"> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="details-product">
                        <div class="details-thumd">
                            <div class="image-preview-container image-thick-box image_preview_container">
                                <img src="" alt="img">
                                <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                            <div class="product-preview image-small product_preview">
                                <div id="thumbnails" class="thumbnails_carousel owl-carousel image-list-carousel" data-nav="true"
                                     data-autoplay="false" data-dots="false" data-loop="false" data-margin="10"
                                     data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}'>
                                     
                                </div>
                            </div>
                        </div>
                        <div class="details-infor">
                            <h1 class="product-title"> </h1> 
                            <div class="availability" id="avail-status">
                                Tình trạng：
                                <a href="#">Còn hàng</a>
                            </div>
                            <div class="price">
                                <del class="data-discount"></del>
                                <span class="data-prices"></span>
                            </div> 
                            <div class="product-details-description">
                                <ul>

                                </ul>
                            </div>
                            <div class="variations">
                                <div class="attribute attribute_color">
                                    <div class="color-text text-attribute">
                                        Giới tính:
                                    </div>
                                    <div class="list-sex list-item">

                                    </div>
                                </div>
                                <div class="attribute attribute_size">
                                    <div class="size-text text-attribute">
                                        Dung tích:
                                    </div>
                                    <div class="list-size list-item">

                                    </div>
                                </div>
                            </div>
                            <div class="group-button"> 
                                <div class="quantity-add-to-cart"> 
                                    <button class="single_add_to_cart_button button action-add-to-card" atr="Add to card">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-details-product">
                        <ul class="tab-link">
                            <li class="active">
                                <a data-toggle="tab" aria-expanded="true" href="#product-detail">Thông tin sản phẩm </a>
                            </li> 
                        </ul>
                        <div class="tab-container">
    
                            <ul class="nav nav-tabs nav-justified" id="myTabJustified" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-justified" role="tab" aria-controls="home-justified" aria-selected="true" aria-expanded="true">Mô tả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-justified" role="tab" aria-controls="profile-justified" aria-selected="false" aria-expanded="false">Chi tiết</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab-justified" data-toggle="tab" href="#contact-justified" role="tab" aria-controls="contact-justified" aria-selected="false">Cách sử dụng &amp; bảo quản</a>
                                </li>
                            </ul>
                            <div class="tab-content m-t-15" id="myTabContentJustified">
                                <div class="tab-pane fade active in" id="home-justified" role="tabpanel" aria-labelledby="home-tab-justified">
                                    
                                    
                                    <div class="content-t active" data-gallery="detail-products-gallery">
                                        <div class="des_pro">
                                            <div class="des_pro_item">
                                                <p class = "product_des">
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab-justified">
                                    
                                    <div class="thong-so-table">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>                                                     
                                                        <th scope="col" colspan="2">Chi tiết</th>                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Thương hiệu</th>
                                                        
                                                        <td class = "producct_title"></td>
                                                    </tr>
                                                        <tr><th scope="row">Nồng độ</th>
                                                        <td id = "nong-do-id"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Phong cách</th>
                                                        <td id = "phong-cach-id"></td>                                                     
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nhóm hương</th>
                                                        <td id ="nhom-huong-id"></td>                                                     
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Độ tuổi</th>
                                                        <td id = "do-tuoi-id"></td>                                                     
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Thành Phần</th>
                                                        <td id = "thanh-phan-id"></td>                                                     
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
    
                                            <table class="table">
                                                <thead>
                                                    <tr>                                                     
                                                        <th scope="col" colspan="2">More</th>                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Bảo hành đổi trả</th>
                                                        <td>Có</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab-justified">
                                    <p style="margin-bottom:10px !important"><span style="font-size: 14pt;"><b>Cách sử dụng nước hoa:</b></span></p>
        <ul>
    <li style="font-weight: 400"><span style="font-weight: 400">Xịt nước hoa khi cơ thể sạch, khô, hoặc sau khi thoa dưỡng ẩm để giữ mùi lâu hơn</span></li>
    <li style="font-weight: 400"><span style="font-weight: 400">Giữ chai xịt cách cơ thể khoảng 12cm – 15cm và hướng đầu vòi xịt về mình. Nếu nước hoa làm ướt da thì nghĩa là bạn đang xịt ở khoảng cách quá gần. Chờ "điểm mạch" khô tự nhiên mà không chà xát(thói quen này làm bay mùi và biến mùi nước hoa)</span></li>
    <li style="font-weight: 400"><span style="font-weight: 400">Xịt nước hoa vào các điểm mạch đập(cổ, ngực, các điểm mạch, cẳng tay hoặc khuỷu tay): đây là những vùng có mạch máu nằm gần bề mặt da. Các điểm này ấm hơn những nơi khác, hơi ấm giúp khuếch tán mùi hương tốt.</span></li>
    <li style="font-weight: 400"><span style="font-weight: 400">Sử dụng nước hoa phù hợp theo mùa, thời tiết: vì sức nóng và độ ẩm sẽ tăng mạnh mùi hương, nên hãy sử dụng một loại nước hoa có mùi dịu nhẹ hơn (các loại được gọi là lotion, cologne hay toilette) vào mùa hè. Hãy để dành các loại nước hoa có tên perfume hay parfum, với nồng độ mùi cao hơn, cho mùa đông.</span></li>
    <li style="font-weight: 400"><span style="font-weight: 400">Nước hoa có thể bám và tỏa mùi tốt hay không còn phụ thuộc vào cơ địa, thời gian, không gian sử dụng.</span></li>
    <li style="font-weight: 400"><span style="font-weight: 400">Chọn hương nước hoa phù hợp: nếu bạn chỉ đi dạo phố, đi làm hay đi biển, hãy dùng hương nước hoa ban ngày. Nếu chuẩn bị cho buổi hẹn hò hay ra ngoài ăn tối, có thể bạn nên thử dùng hương nước hoa ban đêm.</span></li>
    <li style="font-weight: 400"><span style="font-weight: 400">Nước hoa ban đêm thường được xịt lên cổ hoặc gần vùng cổ. Lý do là vì hương nước hoa ban đêm không lưu lại lâu</span></li>
    <li style="font-weight: 400"><span style="font-weight: 400">Nước hoa ban ngày thường được xịt vào hông hoặc đầu gối. Đó là vì hương nước hoa ban ngày tỏa hương suốt ngày và thơm dai hơn. Bạn nên dùng thêm chút kem dưỡng ẩm gần chỗ định xức nước hoa để mùi hương lưu lại lâu hơn.</span></li>
    </ul>
        <p style="margin-top:10px !important"><span style="font-size: 14pt"><b>Bảo quản nước hoa:</b></span></p>
        <p><span style="font-weight: 400">Nước hoa không chỉ loãng và mất hương thơm theo thời gian, mà còn bị biến màu, biến chất dẫn đến mùi nước hoa có mùi khó chịu. Nếu bảo quản không đúng cách, nước hoa có thể bắt đầu hỏng sau vài tháng.&nbsp;</span></p>
        <p><b>Ánh sáng: </b><span style="font-weight: 400">tiếp xúc trực tiếp với ánh sáng trong một khoảng thời gian chắc chắn sẽ khiến nước hoa bị biến chất. Nên để nước hoa trong hộp, nơi tối, khô thoáng(tủ đồ, kệ tủ).</span></p>
        <p><b>Nhiệt độ: </b><span style="font-weight: 400">nhiệt độ dao động quá cao sẽ nhanh chóng làm hỏng mùi hương. Vì vậy để nước hoa trong nhà tắm có khả năng hư hỏng nhanh hơn nhiều so với nước hoa được lưu trữ trong không gian khác(tủ đồ, kệ tủ,...).</span></p>
        <p style="text-align: center"><iframe src="https://www.youtube.com/embed/tFIR2TCULzw" width="600" height="350" allowfullscreen="allowfullscreen"></iframe></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear: left;"></div>
                    <div class="related products product-grid">
                        <h2 class="product-grid-title">Có thể bạn quan tâm</h2>
                        <div class="owl-products owl-slick equal-container nav-center product-related-list"  data-slick ='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":2}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>

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
<script type="text/javascript" src="{{ asset('customer/assets/js/page/product.js') }}"></script>
@endsection()
@extends('customer.layout')
@section('title', "Loai")


@section('css')
<link href="{{asset('manager/assets/vendors/select2/select2.css')}}" rel="stylesheet">

@endsection()


@section('body')

<div class="main-content main-content-product left-sidebar category-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Loại
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area shop-grid-content no-banner col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="site-main"> 
                    <div class="shop-top-control"> 
                        <form class="filter-choice select-form">
                            <span class="title">Sort by</span>
                            <select title="sort-by" class="sort-by" data-placeholder="Price: Low to High" class="chosen-select">
                                <option value="0">-----------</option> 
                                <option value="1">Sản phẩm mới nhất</option> 
                                <option value="2">Tên sản phẩm: A to Z</option> 
                                <option value="3">Tên sản phẩm: Z to A</option> 
                                <option value="4">Giá từ thấp đến cao</option> 
                                <option value="5">Giá giảm dần</option>
                            </select>
                        </form>
                        <div class="grid-view-mode">
                            <div class="inner">
                                <a class="modes-mode mode-list" atr="list">
                                    <span></span>
                                    <span></span>
                                </a>
                                <a class="modes-mode mode-grid active" atr="grid">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="row list-products auto-clear equal-container product-grid active" option-control="grid">
                         
                    </ul>
                    <ul class="row list-products auto-clear equal-container product-list" option-control="list">
                        
                    </ul>
                    <div class="pagination-navigation">

                    </div> 
                </div>
            </div>
            <div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="wrapper-sidebar shop-sidebar">
                    <div class="widget woof_Widget">
                        <div class="widget widget-categories">
                            <h3 class="widgettitle">Gợi ý</h3>
                            <ul class="tagcloud category-list-tag">
                            </ul>
                        </div>
                        <h3 class="widgettitle">Giới tính</h3>
                        <div class="widget widget-tags"> 
                            <ul class="tagcloud">
                                <li class="tag-cloud-link">
                                    <a >Nam</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a >Nữ</a>
                                </li>
                                <li class="tag-cloud-link active">
                                    <a >Bất kỳ</a>
                                </li> 
                            </ul>
                        </div>
                        <div class="widget widget_filter_price">
                            <h4 class="widgettitle">
                                Độ tuổi
                            </h4>
                            <div class="widget widget-tags"> 
                                <ul class="tagcloud">
                                    <li class="tag-cloud-link">
                                        <a>18-25</a>
                                    </li>
                                    <li class="tag-cloud-link">
                                        <a>28-40</a>
                                    </li>
                                    <li class="tag-cloud-link">
                                        <a>41-45</a>
                                    </li>
                                    <li class="tag-cloud-link">
                                        <a>55+</a>
                                    </li>
                                    <li class="tag-cloud-link active">
                                        <a >Tất cả</a>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        
                        <div class="widget widget_filter_price">
                            <h4 class="widgettitle">
                                Giá
                            </h4>
                            <div class="price-slider-wrapper">
                                <div data-label-reasult="Range:" data-min="0" data-max="50000" data-unit="₫"
                                     class="slider-range-price " data-value-min="0" data-value-max="50000">
                                </div>
                                <input type="hidden" class="js-range-slider" value="0;50000">
                                <div class="price-slider-amount">
                                    <span class="from">0 ₫</span>
                                    <span class="to">50000 ₫</span>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div style="padding-left: 20px;padding-right:20px">
                    <form action="/action_page.php">
                        <label class="form-label">Bootstrap 5 DataList</label>
                        <input class="form-control form-control-sm " list="browsers" name="browser" id="browser">
                        <datalist id="browsers">
                          <option value="Edge">
                          <option value="Firefox">
                          <option value="Chrome">
                          <option value="Opera">
                          <option value="Safari">
                        </datalist>

                        <label for="browser" class="form-label">Nhóm mùi hương:</label>
                        <input class="form-control form-control-sm" list="browsers2" name="browser" id="browser">
                        <datalist id="browsers2">
                          <option value="Edge">
                          <option value="Firefox">
                          <option value="Chrome">
                          <option value="Opera">
                          <option value="Safari">
                        </datalist>
                        
                        <label for="browser" class="form-label">Nhóm mùi hương:</label>
                        <input class="form-control form-control-sm" list="browsers2" name="browser" id="browser">
                        <datalist id="browsers2">
                          <option value="Edge">
                          <option value="Firefox">
                          <option value="Chrome">
                          <option value="Opera">
                          <option value="Safari">
                        </datalist> 
                        
                      </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/assets/js/page/category.js') }}"></script>

<script type="text/javascript" src="{{ asset('manager/assets/vendors/select2/select2.min.js') }}"></script>

@endsection()
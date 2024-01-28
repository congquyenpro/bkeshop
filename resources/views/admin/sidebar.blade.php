<div class="side-nav">
    <input type="hidden" name="admin_rule" value="{{ isset($rule) ? $rule : 1 }}" id="adminRuleInput">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li menu-rule="1" class="nav-item dropdown statistic-group">
                <a class="dropdown-toggle statistic statistic-href-control" href="{{ route('admin.statistic.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Thống kê</span>
                </a>
            </li>
            <li menu-rule="2" class="nav-item dropdown manager-group">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Sản phẩm</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu"> 
                    <li class="category"> <a href="{{ route('admin.category.index') }}">Thương hiệu</a> </li>
                    <li class="product"> <a href="{{ route('admin.product.index') }}">Sản phẩm</a> </li>
                </ul>
            </li> 
            <li menu-rule="3" class="nav-item dropdown order-group">
                <a class="dropdown-toggle order" href="{{ route('admin.order.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-shopping-cart"></i>
                    </span>
                    <span class="title">Đơn hàng</span>
                </a>
            </li>

            <li menu-rule="4" class="nav-item dropdown">
                <a class="dropdown-toggle" >
                    <span class="icon-holder">
                        <i class="fas fa-shipping-fast"></i>
                    </span>
                    <span class="title">Vận chuyển</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu"> 
                    <li class="category1"> <a href="{{ route('admin.transport.index') }}">Quản lý vận đơn</a> </li>
                    <li class="category1"> <a href="{{ route('admin.transport.doi-soat') }}">Đối soát COD và Phí</a> </li>
                    <li class="product1"> <a href="{{ route('admin.transport.config') }}">Cấu hình giao hàng</a> </li>
                </ul>
            </li>

{{--             <li class="nav-item dropdown manager2-group">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-warehouse"></i>
                    </span>
                    <span class="title">Kho hàng</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu"> 
                    <li class="product1"> <a href="{{ route('admin.category.index') }}">Tạo đơn và giao hàng</a> </li>
                    <li class="product1"> <a href="{{ route('admin.product.index') }}">Danh sách đơn hàng</a> </li>
                    <li class="product1"> <a href="{{ route('admin.product.index') }}">Quản lý đóng gói</a> </li>
                    <li class="product1"> <a href="{{ route('admin.product.index') }}">Khách trả hàng</a> </li>
                </ul>
            </li> --}}
            <li menu-rule="5" class="nav-item dropdown">
                <a class="dropdown-toggle" href="{{ route('admin.warehouse.index') }}">
                    <span class="icon-holder">
                        {{-- <i class="anticon anticon-dashboard"></i> --}}
                        <i class="fas fa-warehouse"></i>
                    </span>
                    <span class="title">Kho hàng</span>
                </a>
            </li>

            <li menu-rule="6" class="nav-item dropdown ">
                <a class="dropdown-toggle " href="{{ route('admin.manager.customer') }}">
                    <span class="icon-holder">
                    {{-- <i class="anticon anticon-dashboard"></i> --}}
                    <i class="anticon anticon-idcard"></i>
                    </span>
                    <span class="title">Khách hàng</span>
                </a>
            </li>
            
            <li menu-rule="7" class="nav-item dropdown ">
                <a class="dropdown-toggle " href="{{ route('admin.manager.staff') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-team"></i>
                    </span>
                    <span class="title">Nhân viên</span>
                </a>
            </li>

            <li menu-rule="8" class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-holder">
                        {{-- <i class="anticon anticon-dashboard"></i> --}}
                        <i class="anticon anticon-bar-chart"></i>
                    </span>
                    <span class="title">Báo cáo</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu"> 
                    <li class="product1"> <a href="{{ route('admin.manager.report-general') }}">Báo cáo tổng quan</a> </li>
                    <li class="product1"> <a href="{{ route('admin.manager.report-sales') }}">Báo cáo bán hàng</a> </li>
                    <li class="product1"> <a href="{{ route('admin.manager.report-financial') }}">Báo cáo tài chính</a> </li>
                    <li class="product1"> <a href="{{ route('admin.manager.report-warehouse') }}">Báo cáo kho</a> </li>
                </ul>
            </li>

            <li menu-rule="9" class="nav-item dropdown manager3-group">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-setting"></i>
                    </span>
                    <span class="title">Cấu hình</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu"> 
                    <li class="product1"> <a href="{{ route('admin.category.index') }}">Cấu hình hệ thống</a> </li>
                </ul>
            </li> 

            <li menu-rule="10" class="nav-item dropdown ">
                <a class="dropdown-toggle" href="{{ route('admin.watermark.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-tool"></i>
                    </span>
                    <span class="title">Công cụ</span>
                </a>
            </li>

            <hr class="hr" />
            {{-- Dashboard cho nhân viên kho --}}
            <li menu-rule="11" class="nav-item dropdown ">
                <a class="dropdown-toggle" href="{{ route('admin.watermark.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-build"></i>
                    </span>
                    <span class="title">Quản lý đóng gói</span>
                </a>
            </li>

            <li menu-rule="12" class="nav-item dropdown ">
                <a class="dropdown-toggle" href="{{ route('admin.watermark.index') }}">
                    <span class="icon-holder">
                        <i class="fas fa-warehouse"></i>
                    </span>
                    <span class="title">Quản lý tồn kho</span>
                </a>
            </li>

        </ul>
    </div>
</div>
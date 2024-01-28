@extends('admin.layout')
@section('title', 'Sản phẩm')
@section('menu-data')
    <input type="hidden" name="" class="menu-data" value="manager-group | product">
@endsection()


@section('css')
    <link href="{{ asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('manager/assets/css/app.min.css') }}" rel="stylesheet">

    <link href="{{ asset('manager/assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@endsection()

@section('body')

    <div class="page-header no-gutters">
        <div class="row align-items-md-center">
            <div class="col-md-6">
                <div class="media m-v-10">
                    <div class="avatar avatar-cyan avatar-icon avatar-square">
                        <i class="anticon anticon-star"></i>
                    </div>
                    <div class="media-body m-l-15">
                        <h6 class="mb-0">Vận chuyển</h6>
                        <span class="text-gray font-size-13">Cấu hình giao hàng</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="dashboard">
        <ul class="nav nav-tabs nav-justified" id="myTabJustified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-justified" role="tab"
                    aria-controls="home-justified" aria-selected="true">Cấu hình chung</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-justified" role="tab"
                    aria-controls="profile-justified" aria-selected="false">Cấu hình đơn vị vận chuyển</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab-justified" data-toggle="tab" href="#contact-justified" role="tab"
                    aria-controls="contact-justified" aria-selected="false">Contact</a>
            </li>
        </ul>
        <div class="tab-content m-t-15" id="myTabContentJustified">

            {{-- Tab: Cấu hình chung --}}
            @include('admin.manager.transport.cau-hinh-chung')

            {{-- Tab: Cấu hình đơn vị vận chuyển --}}
            @include('admin.manager.transport.cau-hinh-dvvc')
                   
            <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab-justified">
                Cấu hình giao hàng3
                Cấu hình giao hàng
            </div>
        </div>
    </div>




@endsection()

@section('js')
    <script src="{{ asset('manager/assets/js/page/staff_customer.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core Vendors JS -->
    <script src="{{ asset('manager/assets/js/vendors.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('manager/assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('manager/assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('manager/assets/js/pages/e-commerce-order-list.js') }}"></script>

    <!-- Core JS -->
    <script src="{{ asset('manager/assets/js/app.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('manager/assets/js/pages/icon.js') }}"></script>

    <!-- Address select -->
    <script src="{{ asset('manager/assets/js/page/more/address_select.js') }}"></script>

@endsection()

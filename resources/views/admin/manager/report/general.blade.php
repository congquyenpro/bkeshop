@extends('admin.layout')
@section('title', 'Thống kê')
@section('menu-data')
<input type="hidden" name="" class="menu-data" value="statistic-group | statistic">
@endsection()


@section('css')
    
<link href="{{ asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('manager/assets/css/app.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    #print-report:hover, #question-ans:hover{
        cursor: pointer;
        color: #070572;
    }

</style>
@endsection()


@section('body')



<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Doanh thu trong tháng</h5>
                    <div>
                        <div class="btn-group">
                            <button class="btn btn-default active">
                                <span>Xem chi tiết</span>
                            </button>
                            <!--                                                 <button class="btn btn-default">
                                <span>Year</span>
                            </button> -->
                        </div>
                    </div>
                </div>
                <div class="m-t-50" style="height: 330px">
                    <canvas class="chart" id="revenue-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 m-b-50">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="m-b-0">235,225,450</h2>
                        <p class="m-b-0 text-muted">Doanh thu trung bình</p>
                    </div>
                    <div>
                        <span class="badge badge-pill badge-cyan font-size-15">
                            <span class="font-weight-semibold m-l-5">+5.7%</span>
                        </span>
                    </div>
                </div>
                <div class="m-t-50" style="height: 375px">
                    <canvas class="chart" id="bar-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <!-- 3 tables: type, age, sex -->
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 id="type_customer" class="m-b-0">Theo loại khách hàng</h5>
                    <div class="m-v-60 text-center" style="height: 200px">
                        <div class="ct-chart" id="donut-chart3"></div>
                    </div>
                    <div class="row border-top p-t-25">
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-success badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <!-- <h4 class="m-b-0">350</h4> -->
                                        <p class="m-b-0 muted">Mới</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-secondary badge-dot m-r-10"></span>
                                    <div class="m-l-3">
                                        <!-- <h4 class="m-b-0">450</h4> -->
                                        <p class="m-b-0 muted">Quay lại</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-warning badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <!-- <h4 class="m-b-0">100</h4> -->
                                        <p class="m-b-0 muted">Khác</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-12 col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="m-b-0">Theo độ tuổi</h5>
                    <div class="m-v-60 text-center" style="height: 200px">
                        <div class="ct-chart" id="donut-chart2"></div>
                    </div>
                    <div class="row border-top p-t-25">
                        <div class="col-3">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-success badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <!-- <h4 class="m-b-0">350</h4> -->
                                        <p class="m-b-0 muted">18-25</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-secondary badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <!-- <h4 class="m-b-0">450</h4> -->
                                        <p class="m-b-0 muted">25-35</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-warning badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <!-- <h4 class="m-b-0">100</h4> -->
                                        <p class="m-b-0 muted">35-45</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-danger badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <!-- <h4 class="m-b-0">100</h4> -->
                                        <p class="m-b-0 muted">50+</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="m-b-0">Theo giới tính</h5>
                    <div class="m-v-60 text-center" style="height: 200px">
                        <div class="ct-chart" id="donut-chart"></div>
                    </div>
                    <div class="row border-top p-t-25">
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-secondary badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <!-- <h4 class="m-b-0">450</h4> -->
                                        <p class="m-b-0 muted">Nam</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-success badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <!--  <h4 class="m-b-0">100</h4> -->
                                        <p class="m-b-0 muted">Nữ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-Warning badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <!--  <h4 class="m-b-0">100</h4> -->
                                        <p class="m-b-0 muted">Unisex</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-body">

            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-b-0">Thống kê kho</h5>
                    <div>
                        <a href="/admin/report/warehouse" class="btn btn-sm btn-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="m-t-10">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-today">Tồn kho</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-week1"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-month1"></a>
                    </li>
                </ul>
                <div class="tab-content m-t-15">
                    <div class="tab-pane card-body fade active show" id="tab-today">
                        <div class="alert alert-primary">
                            <p class="font-weight-bold"> Số tồn kho:</p>
                            <p> 250</p>
                        </div>
                        <div class="alert alert-primary">
                            <p class="font-weight-bold"> Giá trị tồn kho:</p>
                            <p>300,000,000</p>
                        </div>
                    </div>
                    <div class="tab-pane card-body fade" id="tab-week">
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-week-1" type="checkbox">
                                    <label for="task-week-1" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Verify connectivity</h5>
                                            <p class="m-b-0 text-muted font-size-13">Bugger bag
                                                egg's old boy willy jolly</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-week-2" type="checkbox">
                                    <label for="task-week-2" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Order console machines</h5>
                                            <p class="m-b-0 text-muted font-size-13">Value
                                                proposition alpha crowdsource</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-week-3" type="checkbox" checked="">
                                    <label for="task-week-3" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Customize Template</h5>
                                            <p class="m-b-0 text-muted font-size-13">Do you see any
                                                Teletubbies in here</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-week-4" type="checkbox" checked="">
                                    <label for="task-week-4" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Batch schedule</h5>
                                            <p class="m-b-0 text-muted font-size-13">Trillion a very
                                                small stage in a vast</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-week-5" type="checkbox" checked="">
                                    <label for="task-week-5" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Prepare implementation</h5>
                                            <p class="m-b-0 text-muted font-size-13">Drop in axle
                                                roll-in rail slide</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane card-body fade" id="tab-month">
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-month-1" type="checkbox">
                                    <label for="task-month-1" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Create user groups</h5>
                                            <p class="m-b-0 text-muted font-size-13">Nipperkin run a
                                                rig ballast chase</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-month-2" type="checkbox" checked="">
                                    <label for="task-month-2" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Design Wireframe</h5>
                                            <p class="m-b-0 text-muted font-size-13">Value
                                                proposition alpha crowdsource</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-month-3" type="checkbox">
                                    <label for="task-month-3" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Customize Template</h5>
                                            <p class="m-b-0 text-muted font-size-13">I'll be sure to
                                                note that</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-month-4" type="checkbox">
                                    <label for="task-month-4" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Management meeting</h5>
                                            <p class="m-b-0 text-muted font-size-13">Hand-crafted
                                                exclusive finest</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-month-5" type="checkbox" checked="">
                                    <label for="task-month-5" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Extend data model</h5>
                                            <p class="m-b-0 text-muted font-size-13">European minnow
                                                priapumfish mosshead</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-b-0">Latest Upload</h5>
                    <div>
                        <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                    </div>
                </div>
                <div class="m-t-30">
                    <div class="m-b-25">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="media align-items-center">
                                <div class="font-size-35">
                                    <i class="anticon anticon-file-word text-primary"></i>
                                </div>
                                <div class="m-l-15">
                                    <h6 class="m-b-0">
                                        <a class="text-dark"
                                            href="javascript:void(0);">Documentation.doc</a>
                                    </h6>
                                    <p class="text-muted m-b-0">1.2MB</p>
                                </div>
                            </div>
                            <div class="dropdown dropdown-animated scale-left">
                                <a class="text-gray font-size-18" href="javascript:void(0);"
                                    data-toggle="dropdown">
                                    <i class="anticon anticon-ellipsis"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-download"></i>
                                        <span class="m-l-10">Download</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-delete"></i>
                                        <span class="m-l-10">Remove</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-b-25">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="media align-items-center">
                                <div class="font-size-35">
                                    <i class="anticon anticon-file-excel text-success"></i>
                                </div>
                                <div class="m-l-15">
                                    <h6 class="m-b-0">
                                        <a class="text-dark"
                                            href="javascript:void(0);">Expensess.xls</a>
                                    </h6>
                                    <p class="text-muted m-b-0">518KB</p>
                                </div>
                            </div>
                            <div class="dropdown dropdown-animated scale-left">
                                <a class="text-gray font-size-18" href="javascript:void(0);"
                                    data-toggle="dropdown">
                                    <i class="anticon anticon-ellipsis"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-download"></i>
                                        <span class="m-l-10">Download</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-delete"></i>
                                        <span class="m-l-10">Remove</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-b-25">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="media align-items-center">
                                <div class="font-size-35">
                                    <i class="anticon anticon-file-text text-secondary"></i>
                                </div>
                                <div class="m-l-15">
                                    <h6 class="m-b-0">
                                        <a class="text-dark"
                                            href="javascript:void(0);">Receipt.txt</a>
                                    </h6>
                                    <p class="text-muted m-b-0">355KB</p>
                                </div>
                            </div>
                            <div class="dropdown dropdown-animated scale-left">
                                <a class="text-gray font-size-18" href="javascript:void(0);"
                                    data-toggle="dropdown">
                                    <i class="anticon anticon-ellipsis"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-download"></i>
                                        <span class="m-l-10">Download</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-delete"></i>
                                        <span class="m-l-10">Remove</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-b-25">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="media align-items-center">
                                <div class="font-size-35">
                                    <i class="anticon anticon-file-word text-primary"></i>
                                </div>
                                <div class="m-l-15">
                                    <h6 class="m-b-0">
                                        <a class="text-dark" href="javascript:void(0);">Project
                                            Requirement.doc</a>
                                    </h6>
                                    <p class="text-muted m-b-0">1.6MB</p>
                                </div>
                            </div>
                            <div class="dropdown dropdown-animated scale-left">
                                <a class="text-gray font-size-18" href="javascript:void(0);"
                                    data-toggle="dropdown">
                                    <i class="anticon anticon-ellipsis"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-download"></i>
                                        <span class="m-l-10">Download</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-delete"></i>
                                        <span class="m-l-10">Remove</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-b-25">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="media align-items-center">
                                <div class="font-size-35">
                                    <i class="anticon anticon-file-pdf text-danger"></i>
                                </div>
                                <div class="m-l-15">
                                    <h6 class="m-b-0">
                                        <a class="text-dark" href="javascript:void(0);">App
                                            Flow.pdf</a>
                                    </h6>
                                    <p class="text-muted m-b-0">19.8MB</p>
                                </div>
                            </div>
                            <div class="dropdown dropdown-animated scale-left">
                                <a class="text-gray font-size-18" href="javascript:void(0);"
                                    data-toggle="dropdown">
                                    <i class="anticon anticon-ellipsis"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-download"></i>
                                        <span class="m-l-10">Download</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-delete"></i>
                                        <span class="m-l-10">Remove</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="media align-items-center">
                                <div class="font-size-35">
                                    <i class="anticon anticon-file-ppt text-warning"></i>
                                </div>
                                <div class="m-l-15">
                                    <h6 class="m-b-0">
                                        <a class="text-dark"
                                            href="javascript:void(0);">Presentation.ppt</a>
                                    </h6>
                                    <p class="text-muted m-b-0">2.7MB</p>
                                </div>
                            </div>
                            <div class="dropdown dropdown-animated scale-left">
                                <a class="text-gray font-size-18" href="javascript:void(0);"
                                    data-toggle="dropdown">
                                    <i class="anticon anticon-ellipsis"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-download"></i>
                                        <span class="m-l-10">Download</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-delete"></i>
                                        <span class="m-l-10">Remove</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-b-0">Latest Upload</h5>
                    <div>
                        <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                    </div>
                </div>
                <div class="m-t-30">
                    <div class="overflow-y-auto scrollable relative" style="height: 437px">
                        <ul class="timeline p-t-10 p-l-10">
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-text avatar-sm bg-primary">
                                        <span>V</span>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <h5 class="m-b-5">Virgil Gonzales</h5>
                                        <p class="m-b-0">
                                            <span class="font-weight-semibold">Complete task </span>
                                            <span class="m-l-5"> Prototype Design</span>
                                        </p>
                                        <span class="text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">10:44 PM</span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-text avatar-sm bg-success">
                                        <span>L</span>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <h5 class="m-b-5">Lilian Stone</h5>
                                        <p class="m-b-0">
                                            <span class="font-weight-semibold">Attached file </span>
                                            <span class="m-l-5"> Mockup Zip</span>
                                        </p>
                                        <span class="text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">8:34 PM</span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-text avatar-sm bg-warning">
                                        <span>E</span>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <h5 class="m-b-5">Erin Gonzales</h5>
                                        <p class="m-b-0">
                                            <span class="font-weight-semibold">Commented </span>
                                            <span class="m-l-5"> 'This is not our work!'</span>
                                        </p>
                                        <span class="text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">8:34 PM</span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-text avatar-sm bg-primary">
                                        <span>R</span>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <h5 class="m-b-5">Riley Newman</h5>
                                        <p class="m-b-0">
                                            <span class="font-weight-semibold">Commented </span>
                                            <span class="m-l-5"> 'Hi, please done this before
                                                tommorow'</span>
                                        </p>
                                        <span class="text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">8:34 PM</span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-text avatar-sm bg-danger">
                                        <span>P</span>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <h5 class="m-b-5">Pamela Wanda</h5>
                                        <p class="m-b-0">
                                            <span class="font-weight-semibold">Removed </span>
                                            <span class="m-l-5"> a file</span>
                                        </p>
                                        <span class="text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">8:34 PM</span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-text avatar-sm bg-secondary">
                                        <span>M</span>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <h5 class="m-b-5">Marshall Nichols</h5>
                                        <p class="m-b-0">
                                            <span class="font-weight-semibold">Create </span>
                                            <span class="m-l-5"> this project</span>
                                        </p>
                                        <span class="text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">5:21 PM</span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-b-0">Task</h5>
                    <div>
                        <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="m-t-10">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-today">Today</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-week">Week</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-month">Month</a>
                    </li>
                </ul>
                <div class="tab-content m-t-15">
                    <div class="tab-pane card-body fade show active" id="tab-today">
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-today-1" type="checkbox">
                                    <label for="task-today-1" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Define users and workflow</h5>
                                            <p class="m-b-0 text-muted font-size-13">A cheeseburger
                                                is more than sandwich</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-today-2" type="checkbox" checked="">
                                    <label for="task-today-2" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Schedule jobs</h5>
                                            <p class="m-b-0 text-muted font-size-13">I'm gonna build
                                                me an airport</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-today-3" type="checkbox" checked="">
                                    <label for="task-today-3" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Extend the data model</h5>
                                            <p class="m-b-0 text-muted font-size-13">Let us wax
                                                poetic about cheeseburger</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-today-4" type="checkbox">
                                    <label for="task-today-4" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Change interface</h5>
                                            <p class="m-b-0 text-muted font-size-13">Efficiently
                                                unleash cross-media information</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-today-5" type="checkbox">
                                    <label for="task-today-5" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Create databases</h5>
                                            <p class="m-b-0 text-muted font-size-13">Here's the
                                                story of a man named Brady</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane card-body fade" id="tab-week">
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-week-1" type="checkbox">
                                    <label for="task-week-1" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Verify connectivity</h5>
                                            <p class="m-b-0 text-muted font-size-13">Bugger bag
                                                egg's old boy willy jolly</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-week-2" type="checkbox">
                                    <label for="task-week-2" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Order console machines</h5>
                                            <p class="m-b-0 text-muted font-size-13">Value
                                                proposition alpha crowdsource</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-week-3" type="checkbox" checked="">
                                    <label for="task-week-3" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Customize Template</h5>
                                            <p class="m-b-0 text-muted font-size-13">Do you see any
                                                Teletubbies in here</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-week-4" type="checkbox" checked="">
                                    <label for="task-week-4" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Batch schedule</h5>
                                            <p class="m-b-0 text-muted font-size-13">Trillion a very
                                                small stage in a vast</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-week-5" type="checkbox" checked="">
                                    <label for="task-week-5" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Prepare implementation</h5>
                                            <p class="m-b-0 text-muted font-size-13">Drop in axle
                                                roll-in rail slide</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane card-body fade" id="tab-month">
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-month-1" type="checkbox">
                                    <label for="task-month-1" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Create user groups</h5>
                                            <p class="m-b-0 text-muted font-size-13">Nipperkin run a
                                                rig ballast chase</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-month-2" type="checkbox" checked="">
                                    <label for="task-month-2" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Design Wireframe</h5>
                                            <p class="m-b-0 text-muted font-size-13">Value
                                                proposition alpha crowdsource</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-month-3" type="checkbox">
                                    <label for="task-month-3" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Customize Template</h5>
                                            <p class="m-b-0 text-muted font-size-13">I'll be sure to
                                                note that</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-month-4" type="checkbox">
                                    <label for="task-month-4" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Management meeting</h5>
                                            <p class="m-b-0 text-muted font-size-13">Hand-crafted
                                                exclusive finest</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <div class="d-flex align-items-center">
                                <div class="checkbox">
                                    <input id="task-month-5" type="checkbox" checked="">
                                    <label for="task-month-5" class="d-flex align-items-center">
                                        <div class="inline-block m-l-10">
                                            <h5 class="m-b-0">Extend data model</h5>
                                            <p class="m-b-0 text-muted font-size-13">European minnow
                                                priapumfish mosshead</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@endsection()

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Bar Chart
        const barChart = document.getElementById("bar-chart");
        const barCtx = barChart.getContext('2d');
        barChart.height = 120;
        const themeColors = {
            blue: '#3498db',
            blueLight: '#5d9cec'
        };
    
        const barConfig = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', ' Tháng 9','Tháng 10','Tháng 10', 'Tháng 11', ' Tháng 12'],
                datasets: [

                {
                    label: 'Doanh thu',
                    backgroundColor: themeColors.blueLight,
                    borderWidth: 0,
                    data: [86, 27, 90, 43, 65, 76, 87, 85, 90, 43, 65, 76,80]
                }]
            },
            options: {
                scaleShowVerticalLines: false,
                responsive: true,
                scales: {
                    xAxes: [{
                        categoryPercentage: 0.45,
                        barPercentage: 0.70,
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        },
                        gridLines: false,
                        ticks: {
                            display: true,
                            beginAtZero: true,
                            fontSize: 13,
                            padding: 10
                        }
                    }],
                    yAxes: [{
                        categoryPercentage: 0.35,
                        barPercentage: 0.70,
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Value'
                        },
                        gridLines: {
                            drawBorder: false,
                            offsetGridLines: false,
                            drawTicks: false,
                            borderDash: [3, 4],
                            zeroLineWidth: 1,
                            zeroLineBorderDash: [3, 4]
                        },
                        ticks: {
                            max: 100,
                            stepSize: 20,
                            display: true,
                            beginAtZero: true,
                            fontSize: 13,
                            padding: 10
                        }
                    }]
                }
            }
        });
    
        // Chartist Charts
        new Chartist.Pie('#donut-chart', { series: [55, 45] }, {
            donut: true,
            donutWidth: 60,
            donutSolid: true,
            startAngle: 270,
            showLabel: true
        });
    

        Api.Report.getGeneral()
        .then((res)=>{
            console.log(res);
            var age_18_25 = res.ageGroups["18-25"];
            var age_26_35 = res.ageGroups["26-35"];
            var age_36_45 = res.ageGroups["36-45"];
            var age_gt_50 = res.ageGroups[">50"];
            var age_all = age_18_25 + age_26_35 + age_36_45 + age_gt_50;

            new Chartist.Pie('#donut-chart2', { series: [(age_18_25/age_all*100).toFixed(2), (age_26_35/age_all*100).toFixed(2) , (age_36_45/age_all*100).toFixed(2), (age_gt_50/age_all*100).toFixed(2)] }, {
                donut: true,
                donutWidth: 60,
                donutSolid: true,
                startAngle: 270,
                showLabel: true
        });
        });

        Api.Report.getGeneral()
        .then((res)=>{
            console.log(res.sexGroups);
            var sex_all_num = res.sexGroups["male"] + res.sexGroups["female"] +  res.sexGroups["all"];
            var sex_male = ((res.sexGroups["male"]/sex_all_num)*100).toFixed(2)
            var sex_female = ((res.sexGroups["female"]/sex_all_num)*100).toFixed(2)
            var sex_all = (100 - sex_male -sex_female).toFixed(2);
            var sex_all_num = sex_male + sex_female + sex_all;

            new Chartist.Pie('#donut-chart', { series: [sex_male, sex_female,sex_all] }, {
                donut: true,
                donutWidth: 60,
                donutSolid: true,
                startAngle: 270,
                showLabel: true
            });
        });

        //Khách quay lại
        Api.Report.getGeneral()
        .then((res)=>{
            console.log(res.returngroups);
                var new_customer = res.returngroups["new_customer"];
                var return_customer = res.returngroups["return_customer"];
                var no_return_customer = res.returngroups["no_return_customer"];
                var return_all = new_customer + return_customer + no_return_customer;
                var rate1 = ((new_customer/return_all)*100).toFixed(2);
                var rate2 = ((return_customer/return_all)*100).toFixed(2);
                var rate3 = ((no_return_customer/return_all)*100).toFixed(2);

            new Chartist.Pie('#donut-chart3', { series: [rate1,rate2,rate3] }, {
                donut: true,
                donutWidth: 60,
                donutSolid: true,
                startAngle: 270,
            showLabel: true
            });
        })
    
        new Chartist.Pie('#donut-chart3', { series: [30, 60, 10] }, {
            donut: true,
            donutWidth: 60,
            donutSolid: true,
            startAngle: 270,
            showLabel: true
        });
    
        new Chartist.Line('#simple-line-chart', {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            series: [
                [2, 11, 6, 8, 15, 20, 22],
            ]
        }, {
            fullWidth: true,
            chartPadding: { right: 50 }
        });
    
        new Chartist.Bar('#horizontal-bar', {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            series: [
                [5, 4, 3, 7, 5, 10, 3, 6, 9, 10, 12, 14]
            ]
        }, {
            seriesBarDistance: 10,
            axisY: { offset: 70 }
        });
    });
    </script>

@section('sub_layout')
@endsection()

@section('js')
<script src="{{ asset('manager/assets/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('manager/assets/js/pages/dashboard-project.js') }}"></script>

<script src="{{ asset('manager/assets/vendors/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('manager/assets/js/pages/dashboard-default.js') }}"></script>

    <!-- Core Vendors JS -->
    <script src="{{asset('manager/assets/js/vendors.min.js')}}"></script>

    <!-- page js -->
    <script src="{{asset('manager/assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('manager/assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('manager/assets/js/pages/form-elements.js')}}"></script>
        

        
@endsection()
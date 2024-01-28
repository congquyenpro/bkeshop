@extends('admin.layout')
@section('title', 'Báo cáo tài chính')
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
        .explain{
        white-space: pre-line;
        }
    </style>
@endsection()


@section('body')

    <ul class="nav nav-tabs nav-justified" id="myTabJustified" role="tablist">
        <li class="nav-item">
            <a class="nav-link active font-weight-bold" id="home-tab-justified" data-toggle="tab" href="#home-justified" role="tab"
                aria-controls="home-justified" aria-selected="true">Báo cáo lãi lỗ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" id="profile-tab-justified" data-toggle="tab" href="#profile-justified" role="tab"
                aria-controls="profile-justified" aria-selected="false">Báo cáo công nợ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" id="contact-tab-justified" data-toggle="tab" href="#contact-justified" role="tab"
                aria-controls="contact-justified" aria-selected="false">Sổ quỹ</a>
        </li>
    </ul>
    <div class="tab-content m-t-15" id="myTabContentJustified">
            @include('admin.manager.report.financial-profit')

        <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab-justified">

            Báo cáo công nợ khách hàng
            Theo dõi các khoản công nợ phải thu hoặc phải trả khách hàng
        </div>
        <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab-justified">

            Sổ quỹ
            Theo dõi các khoản thu chi của cửa hàng
        </div>
    </div>
@endsection()


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

        <script src="{{asset('manager/assets/js/page/more/report.js')}}"></script>
        {{-- <script src="{{asset('manager/assets/js/app.min.js')}}"></script> --}}
@endsection()

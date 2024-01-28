@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')

    <div class="main-content main-content-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="/">ホーム</a>
                            </li>
                            <li class="trail-item trail-end active">
                                Authentication
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <h3 class="custom_blog_title">
                            Authentication
                        </h3>
                        <div class="customer_login">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3">
                                    <p>登録に成功しました</p> 
                                    <a href="https://mail.google.com/mail/u/0" target="_blank" class="btn-auth-action button-submit form-submit m-r-20">メールを開く</a>   
                                </div> 
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
<script type="text/javascript" src="{{ asset('customer/assets/js/page/index.js') }}"></script>
@endsection()
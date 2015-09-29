@extends('layouts.master',['pageTitle' => '404 الصفحة غير متوفرة'])

@section('content')
    <style>
        .error-actions {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .error-actions .btn {
            margin-right: 10px;
        }
    </style>
    <div class="col-md-5">
        <img class="center-block" style="width: 100%" src="{{asset('images/404.jpg')}}">
    </div>

    <div class="col-md-7">
        <h2 class="text-info"><span class="text-warning">404</span> عفواَ... الصفحة غير موجودة</h2>
        @if(isset($error))<!--findOrFail-->
        <hr>
        <h4 class="text-warning">وصف إضافي للخطأ</h4>

        <h5 class="text-muted">{{$error->getMessage()}}</h5>
        <hr>
        @endif
        <div class="row">
            <div class="error-actions">
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-home"></span>
                    الصفحة الرئيسية
                </a>
                <a href="{{ route('contactUs') }}" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-envelope"></span>
                    تواصل معنا
                </a>
            </div>
        </div>
    </div>

@stop
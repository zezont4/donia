@extends('layouts.master',['pageTitle' => '403 - لاتملك صلاحيات'])

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
        <img class="center-block" src="{{asset('images/403.png')}}">
    </div>

    <div class="col-md-7">
        <h2 class="text-info"><span class="text-warning">403</span>عفوا، لاتملك صلاحيات لدخول الصفحة</h2>
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
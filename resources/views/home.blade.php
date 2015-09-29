@extends('layouts.master',['pageTitle'=>'الرئيسية'])

@section('content')
    <div class="container">
        @if(session('isLoggedIn'))
            <div class="container-fluid">
                <div class="alert alert-info">
                    <div>{{session('isLoggedIn')}}</div>
                </div>
            </div>
        @endif
        <div class="row">
            <a href="{!! route('client.search') !!}" class="btn btn-primary">Search بحث</a>
            <a href="{!! route('client.create') !!}" class="btn btn-primary">New Client إضافة عميل</a>
            <hr>
        </div>

    </div>
@endsection

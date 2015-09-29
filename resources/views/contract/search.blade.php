@extends('layouts.master',['pageTitle' => 'Search for a client بحث عن عميل'])
<?php $helper = new Helper(); ?>


@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            {!! Form::open(['route' => 'client.searchResult']) !!}
            <div class="row">
                {!! $helper->formText('mobile_no','Mobile No رقم الجوال',$errors,3) !!}
            </div>
            <div class="row">
                {!! $helper->formText('name1','First Name الاسم' , $errors,3) !!}
                {!! $helper->formText('name2','Second Name الأب', $errors,3) !!}
                {!! $helper->formText('name3','Third Name الجد', $errors,3) !!}
                {!! $helper->formText('name4','Family Name العائلة', $errors,3) !!}
            </div>
            {!! $helper->formButton('Search بحث') !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop



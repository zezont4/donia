@inject('myForm','App\MyForm()')

@extends('layouts.master',['pageTitle' => 'Search for a client بحث عن عميل'])

@section('content')

    {!! Form::open([ 'route' => 'client.index', 'role'  => 'form', 'class' => 'form-horizontal','method'=>'GET' ]) !!}

    {!! $myForm->formText([ 'label' => 'Mobile No رقم الجوال', 'name'  => 'mobile_no', ]) !!}

    {!! $myForm->formText([ 'label' => 'First Name الاسم', 'name'  => 'name1', ]) !!}

    {!! $myForm->formText([ 'label' => 'Second Name الأب', 'name'  => 'name2', ]) !!}

    {!! $myForm->formText([ 'label' => 'Third Name الجد', 'name'  => 'name3', ]) !!}

    {!! $myForm->formText([ 'label' => 'Family Name العائلة', 'name'  => 'name4', ]) !!}

    <hr>

    {!! $myForm->formButton([ 'label' => 'Search بحث', 'class' => 'primary', ]) !!}

    {!! Form::close() !!}

@stop
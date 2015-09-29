@extends('layouts.master',['pageTitle' => 'إضافة'])

@section('content')

    {!! Form::open(['route' => 'technical.store','role'=>'form','class' => 'form-horizontal']) !!}

    @include('technical._form',['btnLabel' => 'إضافة','formType' => 'create'])

    {!! Form::close() !!}

@stop
    
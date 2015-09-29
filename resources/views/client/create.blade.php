@extends('layouts.master',['pageTitle' => 'إضافة عميل'])

@section('content')

    {!! Form::open(['route' => 'client.store','role'=>'form','class' => 'form-horizontal']) !!}

    @include('client._form',['btnLabel' => 'Add إضافة','formType' => 'new'])

    {!! Form::close() !!}

@stop

@extends('layouts.master',['pageTitle' => 'New Ticket  تذكرة صيانة جديدة'])

@section('content')

    <h4 class="text-primary">بطاقة صيانة لـ : {{$client_id->FullName}}</h4>
<hr>
    {!! Form::open(['route' => ['contract.store',$client_id],'class' => 'form-horizontal']) !!}

    @include('contract._form',['btnLabel' => 'Save حفظ','formType' => 'create'])

@stop

@extends('layouts.master',['pageTitle' => 'Edit Contract تعديل عقد'])

@section('content')
    <h4 class="text-primary">بطاقة صيانة لـ : {{$contract->client->FullName}}</h4>
    <hr>
    {!! Form::model($contract,['route' => ['contract.update',$contract->id],'method' => 'put','class' => 'form-horizontal']) !!}

    @include('contract._form',['btnLabel' => 'Update تحديث','formType' => 'edit'])
@stop

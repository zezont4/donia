@inject('myForm','App\MyForm()')

@extends('layouts.master',['pageTitle' => 'تعديل'])

@section('content')

    {!! Form::model($technical, ['route' => ['technical.update', $technical->id], 'method' => 'put', 'role' => 'form', 'class' => 'form-horizontal']) !!}
    @include('technical._form',['btnLabel' => 'تحديث','formType' => 'update'])
    {!! Form::close() !!}

    @if($technical->trashed())
        <div class='col-md-6'>
            <h4 class='text-danger text-center'>هذا السجل محذوف</h4>
        </div>

        {!! Form::open(['route' => ['technical.restore', $technical->id], 'class' => 'form-horizontal']) !!}
        {!! $myForm->formButton(['label' => 'استعادة', 'class' => 'success']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['technical.destroy', $technical->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}
        {!! $myForm->formButton(['label' => ' حذف', 'class' => 'danger']) !!}
        {!! Form::close() !!}
    @endif

@stop
@inject('myForm','App\MyForm()')

@extends('layouts.master',['pageTitle' => 'عرض'])

@section('content')

    <form class='form-horizontal'>
        {!! $myForm->formStatic(['label' => 'الاسم', 'name' => 'name', 'value' => $technical->name]) !!}

        <hr>
        <div class='form-group '>
            <div class='col-sm-offset-3 col-sm-9'>
                <a class='btn material_button btn-primary' href='{{route('technical.edit',$technical->id)}}'>تعديل</a>
            </div>
        </div>

    </form>

@stop        
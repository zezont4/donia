@inject('myForm','App\MyForm()')

@extends('layouts.master',['pageTitle' => 'تعديل عميل'])

@section('content')

    {!! Form::model($client, ['route' => ['client.update', $client->id], 'method' => 'put', 'role' => 'form', 'class' => 'form-horizontal']) !!}

    @include('client._form',['btnLabel' => 'Update تحديث','formType' => 'update'])

    {!! Form::close() !!}

    @if($client->trashed())

        <div class="col-md-6">
            <h4 class="text-danger text-center">This Client is deleted - هذا العميل محذوف</h4>
        </div>

        {!! Form::open(['route' => ['client.restore', $client->id], 'class' => 'form-horizontal']) !!}

        {!! $myForm->formButton(['label' => ' Undo Delete - استعادة', 'class' => 'success']) !!}

        {!! Form::close() !!}

    @else

        {!! Form::open(['route' => ['client.destroy', $client->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}

        {!! $myForm->formButton(['label' => ' Delete - حذف', 'class' => 'danger']) !!}

        {!! Form::close() !!}
    @endif
@stop


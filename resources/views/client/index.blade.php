@extends('layouts.master',['pageTitle' => 'العملاء'])

@section('content')

    @if(count($clients))

        <table class="table table-hover">
            <thead>
            <tr class="active2">
                <th><a href="{{route('client.index', Input::except('sort') + ['sort' => 'full_name']  ) }}">Client Name اسم العميل</a></th>
                <th class="hidden-xs"><a href="{{route('client.index',Input::except('sort') +['sort' => 'mobile_no']) }}">Mobile No رقم الجوال</a></th>
                <th class="hidden-xs"><a href="{{route('client.index', Input::except('sort') +['sort' => 'notes'] ) }}">Notes ملاحظات</a></th>
                <th>Edit تعديل</th>
                <th>New Ticket تذكرة جديدة</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->full_name }}</td>
                    <td class="hidden-xs">{{$client->mobile_no }}</td>
                    <td class="hidden-xs">{{$client->notes }}</td>
                    <td><a href="{{route('client.edit',['id' => $client->id]) }}">Edit تعديل</a></td>
                    <td><a href="{{route('contract.newTicket',['id' => $client->id]) }}">New Ticket تذكرة جديدة</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="container-fluid">
            {!! $clients->appends(Input::query())->render() !!}
            {{--{!! $clients->render() !!}--}}
        </div>
    @else
        <div class="alert text-danger text-center">
            <h3>لا توجد نتائج مطابقة للبحث</h3>

            <h3>No results founts</h3>
        </div>
    @endif

    @if($clients->currentPage()>=$clients->lastPage())
        @include('layouts.trashed',
        ['trashed' => $trashedClients,
         'data' => [
        'الاسم'=>'fullName',
        'الجوال'=>'mobile_no',
 'ملاحظات'=>'notes',
        ]
        ])
    @endif
@stop
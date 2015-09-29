@extends('layouts.master',['pageTitle' => 'عقود الصيانة'])

@section('content')
    @if(count($contracts))
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr class="active">
                    <th class="hidden-xs">Device Name<br>نوع الجهاز</th>
                    <th class="hidden-xs">Required<br>المطلوب</th>
                    <th>Client<br>العميل</th>
                    <th>Repaired<br>الصيانة</th>
                    <th>Delivery<br>التسليم</th>
                    <th>Edit<br>تعديل</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contracts as $contract)
                    <tr>
                        <td class="hidden-xs">{{ $contract->device_name or '-'}}</td>
                        <td class="hidden-xs">{{ $contract->required  or '-'}}</td>
                        <td>{{ $contract->client->full_name or '#Client Deleted - العميل محذوف#' }}</td>
                        <td>{!! $contract->is_repaired_Image or '-'!!}</td>
                        <td>{!! $contract->is_delivered_image or '-'!!}</td>
                        <td>{!! link_to_route('contract.edit', 'Edit تعديل' , ['id' => $contract->id] ) !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="well-sm">
                {!! $contracts->render() !!}
            </div>
        </div>
    @else
        <div class="panel panel-danger text-danger text-center">
            <div class="panel-heading"><h3 class="panel-title">Sory عفوا</h3></div>
            <h3>لا توجد نتائج مطابقة للبحث</h3>

            <h3>No results founts</h3>
        </div>
    @endif
@stop

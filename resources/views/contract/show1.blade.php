@extends('layouts.master',['pageTitle' => 'تفاصيل العقد'])

@section('content')
    <div class="print col-xs-10 col-xs-offset-2 text-center">
        <h3 class="text-center">بطاقة صيانة</h3>
        <hr>
        <table class="table table-bordered table-condensed">
            <tr class="w4">
                <td class="bg-success">رقم الوصل</td>
                <td>{{$contract->id}}</td>
                <td class="bg-success">تاريخه</td>
                <td>{{\Carbon\Carbon::parse($contract->created_at)->format('Y-m-d h:iA')}}</td>
            </tr>
        </table>

        <table class="table table-bordered table-condensed">
            <tr class="w4">
                <td class="bg-success">المستلم</td>
                <td>{{$contract->recipient->name}}</td>
                <td class="bg-success">نوع الجهاز</td>
                <td>{{$contract->device_name}}</td>
            </tr>
        </table>

        <table class="table table-bordered table-condensed">
            <tr class="w4">
                <td class="bg-success">اسم العميل</td>
                <td>{{$contract->client->full_name}}</td>
                <td class="bg-success">رقم الجوال</td>
                <td>{{$contract->client->mobile_no}}</td>
            </tr>
        </table>

        <table class="table table-bordered table-condensed">
            <tr class="w4">
                <td class="bg-success">المطلوب</td>
                <td>{{$contract->required}}</td>
                <td class="bg-success">ملحقات</td>
                <td>{{$contract->accessories}}</td>

            </tr>
        </table>
        <table class="table table-bordered table-condensed">
            <tr class="w2">
                <td class="bg-success">البرامج المطلوبة</td>
                <td>{{$contract->apps_needed}}</td>
            </tr>
        </table>
        <hr/>
    </div>

    <div class="print col-xs-10 col-xs-offset-2 text-center">
        <h3 class="text-center">بطاقة صيانة</h3>
        <hr>
        <table class="table table-bordered table-condensed">
            <tr class="w4">
                <td class="bg-success">رقم الوصل</td>
                <td>{{$contract->id}}</td>
                <td class="bg-success">تاريخه</td>
                <td>{{\Carbon\Carbon::parse($contract->created_at)->format('Y-m-d h:iA')}}</td>
            </tr>
        </table>

        <table class="table table-bordered table-condensed">
            <tr class="w4">
                <td class="bg-success">المستلم</td>
                <td>{{$contract->recipient->name}}</td>
                <td class="bg-success">نوع الجهاز</td>
                <td>{{$contract->device_name}}</td>
            </tr>
        </table>

        <table class="table table-bordered table-condensed">
            <tr class="w4">
                <td class="bg-success">اسم العميل</td>
                <td>{{$contract->client->full_name}}</td>
                <td class="bg-success">رقم الجوال</td>
                <td>{{$contract->client->mobile_no}}</td>
            </tr>
        </table>

        <table class="table table-bordered table-condensed">
            <tr class="w4">
                <td class="bg-success">المطلوب</td>
                <td>{{$contract->required}}</td>
                <td class="bg-success">ملحقات</td>
                <td>{{$contract->accessories}}</td>

            </tr>
        </table>
        <table class="table table-bordered table-condensed">
            <tr class="w2">
                <td class="bg-success">البرامج المطلوبة</td>
                <td>{{$contract->apps_needed}}</td>
            </tr>
        </table>
    </div>
@stop
@section('footer')
    <style>
        .h1, .h2, .h3, h1, h2, h3 {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .table {
            margin-bottom: 5px;
        }

        tr.w4 td:nth-child(1), tr.w4 td:nth-child(3) {
            width: 18%;
            font-family: 'GESSTwoLight-Light';
            font-size: 1.1em;

        }

        tr.w4 td:nth-child(2), tr.w4 td:nth-child(4) {
            width: 32%;
        }

        tr.w2 td:nth-child(1) {
            width: 18%;
            font-family: 'GESSTwoLight-Light';
            font-size: 1.1em;
        }

        tr.w2 td:nth-child(2) {
            width: 82%;
        }

        @media print {
            .print {
                width: 16cm !important;
                float: left !important;
            }

            .table-bordered > tbody > tr > td {
                border: 1px solid #777
            }

            legend {
                display: none;
            }

            .material_container {
                border: none
            }

            td.bg-success {
                background-color: #DFF0D8 !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
@stop
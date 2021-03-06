{{--@extends('welcome')--}}
{{--@inject('billController', 'App\Http\Controllers\BillController')--}}
{{--@section('content')--}}


<div class="container mt-5">
    <h1 class="mt-3">
        สรุปยอดบิลทั้งหมด

    </h1>

    <hr>
    <table class="table border-2 mt-3 bg-light">
        <thead>
        <tr class="text-center">
            <th class="border-2">#</th>
            <th class="border-2">ยอดชำระ</th>
            <th class="border-2">สถานะ</th>
            <th class="border-2">วัน</th>
            <th class="border-2">โต๊ะ (Relation)</th>
            <th class="border-2">เมนู (Relation)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bills as $bill)
            <tr class="text-center">
                <td class="border-2 p-0.5">
                        {{$bill->id}}
                </td>
                <td class="border-2 p-0.5">{{$bill->total}}</td>
                <td class="border-2 p-0.5">
                    <span class=" badge rounded-pill {{$bill->status==0?"alert-success":"alert-danger"}}">
                            {{$bill->status==0?"ทำเสร็จแล้ว":"ทำยังไม่เสร็จ"}}
                    </span>
                        <span class=" badge rounded-pill {{$bill->paid==0?"alert-success":"alert-danger"}}">
                            {{$bill->paid==0?"ชำระเงินแล้ว":"ยังไม่ชำระ"}}
                    </span>
                </td>

{{--                <td class="border-2 p-0.5">{{$bill->user->name}}</td>--}}
                <td class="border-2 p-0.5">{{$bill->created_at}}</td>
                <td class="border-2 p-0.5">{{$bill->resTable->id}}</td>
                <td class="border-2 p-0.5">
                    @foreach($bill->menus as $menu)
                        <div>
                            {{ $menu->name}}
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{--@endsection--}}

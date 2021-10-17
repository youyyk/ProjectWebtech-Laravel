@extends('welcome')

@section('content')
<div class="container">
    <h1 class="mt-3">
        รายการบิล
    </h1>
    <table class="table border-2 text-center">
        <thead>
        <tr>
            <th class="border-2">#</th>
            <th class="border-2">โต๊ะ / กลับบ้าน</th>
            <th class="border-2">ยอดชำระ (บาท)</th>
            <th class="border-2">สถานะ</th>
            <th class="border-2">รายละเอียด</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bills as $bill)
            <tr class="something text-center align-middle">
                <td class="border-2 p-0.5" style="font-size: 18px">
                    {{$bill->id}}
                </td>
                <td class="border-2 p-0.5" style="width: 20%; font-size: 18px">
                    {{$bill->resTable->name=="Take Away"?"กลับบ้าน":$bill->resTable->name}}
                </td>
                <td class="border-2 p-0.5" style="width: 20%; font-size: 18px">
                    {{$bill->total}}
                </td>
                <td class="border-2 p-0.5" style="width: 40%; font-size: 18px">
                    <span class=" badge rounded-pill {{$bill->status==1?"alert-success":"alert-danger"}}"
                          style="width: 100px; font-size: 16px; margin-right: 20px">
                            {{$bill->status==1?"ทำเสร็จแล้ว":"ทำยังไม่เสร็จ"}}
                    </span>
                    <span class=" badge rounded-pill {{$bill->paid==1?"alert-success":"alert-danger"}}"
                          style="width: 100px; font-size: 16px;">
                            {{$bill->paid==1?"ชำระเงินแล้ว":"ยังไม่ชำระ"}}
                    </span>
                </td>
                <td class="border-2 p-0.5" style="width: 20%; font-size: 18px">
                    <button type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#infoBill{{$bill->id}}">
                        ดูรายละเอียด
                    </button>
                </td>
            </tr>
            @include('bills.bill_component.infoBillPopUp',['bill'=>$bill])
        @endforeach
        </tbody>
    </table>
</div>
@endsection

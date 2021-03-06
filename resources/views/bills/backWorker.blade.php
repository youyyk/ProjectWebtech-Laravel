@extends('welcome')
<style>
    .card:hover {
        cursor: pointer;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        z-index:1000
    }
</style>
@section('content')
    <br>
    <div class="row" style="margin-left: 60px; margin-right: 50px">
        @foreach($bills as $bill)
            <div class="col-sm-6" style="width: 16rem;">
                <div class="card mb-3 col-xl-12">
                    <div class="card-header" style="font-size: 18px">
                        <b>Bill #{{ $bill->id }}</b>
                        <b class="badge alert-secondary" style="float:right; font-size: 16px; color: black">
                            @if($bill->resTable->name=="Take Away")
                                สั่งกลับบ้าน
                            @else
                                {{ $bill->resTable->name}} ({{ $bill->type=="EatIn"?" ร้าน ":" กลับบ้าน " }})
                            @endif
                        </b>
                    </div>
                    <div class="card-body" style="height: 250px; overflow-y: auto;" >
                        <table class="table">
                            <tbody>
                            @foreach($bill->menus as $menu)
                                <tr>
                                    <td style="font-size: 18px">{{ $menu->name }} <br><label style="font-size: 15px">#{{$menu->department->name}}</label></td>
                                    <td style="font-size: 22px">{{ $menu->pivot->amount }}</td>
                                    <td>
                                        @if($menu->pivot->status == 'notStarted')
                                            <a href="{{route('bill.menu.update.status',['bill'=>$bill,'menuId'=>$menu->id])}}"
                                               class="btn btn-success">เริ่ม</a>
                                        @elseif($menu->pivot->status == 'inProcess')
                                            <a href="{{route('bill.menu.update.status',['bill'=>$bill,'menuId'=>$menu->id])}}"
                                               class="btn btn-success">เสร็จ</a>
                                        @else
                                            <button class="btn btn-secondary" disabled>เสร็จ</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

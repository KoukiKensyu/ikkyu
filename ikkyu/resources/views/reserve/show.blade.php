@extends('layouts.app')

@section('content')
<h2>宿詳細</h2>
    <form action="{{route('reserve.edit', $hotel[0]->id)}}" method="get">
        <table border='1' class="table table-bordered" >
            <tbody>
                <tr>
                <th scope="col">宿名</th>
                <td>{{$hotel[0]->name}}</td>
                </tr>
                <tr>
                <th scope="col">住所</th>
                <td>{{$hotel[0]->address}}</td>
                </tr>
                <tr>
                <th scope="col">チェックイン/チェックアウト</th>
                <td>{{$hotel[0]->checkin_time}}/{{$hotel[0]->checkout_time}}</td>
                </tr>
                <tr>
                <th scope="col">金額/部屋</th>
                <td>{{$hotel[0]->price}}円/部屋</td>
                </tr>
                <tr>
                    <th>空き部屋検索日程</th>
                    <td>{{$bbb}}～{{$ccc}}</td>
                </tr>
                <tr>
                <th scope="col">空き部屋</th>
                <td>{{$data}}/{{$hotel[0]->max_rooms}}</td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="data" value="{{$data}}">
        <input type="hidden" name="bbb" value="{{$bbb}}">
        <input type="hidden" name="ccc" value="{{$ccc}}">
<div class="d-flex justify-content-end text-right">
        <button class="btn btn-outline-danger btn-rounded active" type="submit">予約</button>
    </form>
    <button type="button" class="btn btn-outline-info btn-rounded active" onclick="location.href='/user_home/index'">戻る</button>
</div>
@endsection
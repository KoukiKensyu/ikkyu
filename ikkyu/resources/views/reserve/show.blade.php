@extends('layouts.app')

@section('content')
<h2>宿詳細</h2>
<form action="{{route('reserve.edit', $hotel[0]->id)}}" method="get">
    <table class="table">
        <tbody>
            <tr>
            <td>宿名</td>
            <td>{{$hotel[0]->name}}</td>
            </tr>
            <tr>
            <td>住所</td>
            <td>{{$hotel[0]->address}}</td>
            </tr>
            <tr>
            <td>チェックイン/チェックアウト</td>
            <td>{{$hotel[0]->checkin_time}}/{{$hotel[0]->checkout_time}}</td>
            </tr>
            <tr>
            <td>金額/部屋</td>
            <td>$$$$$円/部屋</td>
            </tr>
            <tr>
            <td>空き部屋</td>
            <td>0/{{$hotel[0]->max_rooms}}</td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-outline-danger btn-rounded active" type="submit">予約</button>
</form>
<button class="btn btn-outline-info btn-rounded active" onclick="location.href='/user_home/index'">戻る</button>
@endsection
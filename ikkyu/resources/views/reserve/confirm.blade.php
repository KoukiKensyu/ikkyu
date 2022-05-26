@extends('layouts.app')

@section('content')
<h2>予約が完了しました</h2>
<table class="table">
    <tbody>
        <tr>
        <td>宿名</td>
        <td>{{$hotel_name}}</td>
        </tr>
        <tr>
        <td>氏名</td>
        <td>{{$user_name}}</td>
        </tr>
        <tr>
        <td>部屋数</td>
        <td>{{$reservation->rooms}}</td>
        </tr>
        <tr>
        <td>日程</td>
        <td>{{$reservation->checkin_date}}～{{$reservation->checkout_date}}</td>
        </tr>
        <tr>
        <td>金額</td>
        <td>{{$hotel_price * $reservation->rooms}}円</td>
        </tr>
    </tbody>
</table>
<button class="btn btn-outline-info btn-rounded active" onclick="location.href='/user_home/index'">ホーム</button>
@endsection
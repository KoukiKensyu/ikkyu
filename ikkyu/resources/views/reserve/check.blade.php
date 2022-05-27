@extends('layouts.app')

@section('content')
<h2>予約内容確認</h2>
<table class="table">
    <tbody>
        <tr>
        <td>宿名</td>
        <td>{{$hotel_name}}</td>
        </tr>
        <tr>
        <td>氏名</td>
        <td>{{$reservation->name}}</td>
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
        <td>{{$hotel_price * $reservation->rooms * $day->d}}円</td>
        </tr>
    </tbody>
</table>
<div class="d-flex justify-content-end text-right">
    <form action="{{route('reserve.confirm')}}" method="post">
        @csrf
        <input type="hidden" name="hotel_id" value="{{$hotel[0]->id}}">
        <input type="hidden" name="user_id" value="{{Auth::id()}}">
        <input type="hidden" name="rooms" value="{{$reservation->rooms}}">
        <input type="hidden" name="checkin_date" value="{{$reservation->checkin_date}}">
        <input type="hidden" name="checkout_date" value="{{$reservation->checkout_date}}">
        <button class="btn btn-outline-danger btn-rounded active" type="submit">確定</button>
    </form>

    <form action="{{route('reserve.edit', $hotel[0]->id)}}" method="get">
        <input type="hidden" name="data" value="{{$data}}">
        <input type="hidden" name="checkin_date" value="{{$reservation->checkin_date}}">
        <input type="hidden" name="checkout_date" value="{{$reservation->checkout_date}}">
        <button class="btn btn-outline-info btn-rounded active" name="return">戻る</button>
    </form>
</div>
@endsection
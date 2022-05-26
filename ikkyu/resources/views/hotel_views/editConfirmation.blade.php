@extends('layouts.app')

@section('content')
<form action="{{route('hotels.editCompletion', $hotel->id)}}" method="POST">
    @method('patch')
    @csrf
<h2>変更内容確認</h2>
<table class="table">
    <tbody>
        <tr>
        <td>宿名</td>
        <td>{{$hotel->name}}</td>
        </tr>
        <tr>
        <td>住所</td>
        <td>{{$hotel->address}}</td>
        </tr>
        <tr>
        <td>宿分類</td>
        <td>{{$hotel->hotel_type}}</td>
        </tr>
        <tr>
        <tr>
        <td>チェックイン/チェックアウト</td>
        <td>{{$hotel->checkin_time}}/{{$hotel->checkout_time}}</td>
        </tr>
        <tr>
        <td>部屋数</td>
        <td>{{$hotel->max_rooms}}部屋</td>
        </tr>
        <tr>
        <td>金額/1部屋</td>
        <td>{{$hotel->price}}円</td>
        </tr>
        <td>コメント</td>
        <td>{{$hotel->comment}}</td>
        </tr>
    </tbody>
</table>
<input type="hidden" name="name" value="{{$hotel->name}}">
<input type="hidden" name="address" value="{{$hotel->address}}">
<input type="hidden" name="hotel_type" value="{{$hotel->hotel_type}}">
<input type="hidden" name="checkin_time" value="{{$hotel->checkin_time}}">
<input type="hidden" name="checkout_time" value="{{$hotel->checkout_time}}">
<input type="hidden" name="max_rooms" value="{{$hotel->max_rooms}}">
<input type="hidden" name="price" value="{{$hotel->price}}">
<input type="hidden" name="comment" value="{{$hotel->comment}}">

<p>この内容で登録しますか？</p>
<div class="d-flex justify-content-end">
<button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark">確定</button>
</form>
<button type="button" onclick="location.href='/hotel_views/edit/{{ $hotel->id }}'" class="btn btn-outline-info" data-mdb-ripple-color="dark">戻る</button>
</div>
<!--<button onclick="location.href='/hotel_views/editCompletion'">確定</button>
<button onclick="location.href='/hotel_views/create'">戻る</button>-->
@endsection
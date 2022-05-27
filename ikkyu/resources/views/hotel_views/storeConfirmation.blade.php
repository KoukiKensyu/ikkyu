@extends('layouts.app')

@section('content')
<h2>登録内容確認</h2>
<form action="{{route('hotels.storeCompletion')}}" method="post">
    @csrf
<table border="1" class="table">
    <tbody>
        <tr>
        <td>宿名</td>
        <td>{{ $hotel->name }}</td>
        </tr>
        <tr>
        <td>住所</td>
        <td>{{ $hotel->address }}</td>
        </tr>
        <tr>
        <td>宿分類</td>
        <td>{{ $hotel->hotel_type }}</td>
        </tr>
        <tr>
        <tr>
        <td>チェックイン/チェックアウト</td>
        <td>{{ $hotel->checkin_time }}/{{ $hotel->checkout_time }}</td>
        </tr>
        <tr>
        <td>部屋数</td>
        <td>{{ $hotel->max_rooms }}</td>
        </tr>
        <tr>
        <td>金額/1部屋</td>
        <td>{{$hotel->price}}円</td>
        </tr>
        <tr>
        <td>コメント</td>
        <td><?php echo nl2br($hotel->comment); ?> </td>
        </tr>
    </tbody>
</table>
<input type="hidden" name="name" value="{{ $hotel->name }}">
<input type="hidden" name="address" value="{{$hotel->address}}">
<input type="hidden" name="hotel_type" value="{{ $hotel->hotel_type }}">
<input type="hidden" name="checkin_time" value="{{$hotel->checkin_time}}">
<input type="hidden" name="checkout_time" value="{{$hotel->checkout_time}}">
<input type="hidden" name="max_rooms" value="{{$hotel->max_rooms}}">
<input type="hidden" name="price" value="{{$hotel->price}}">
<input type="hidden" name="comment" value="{{$hotel->comment}}">
<p>この内容で登録しますか？</p>
<div class="text-right">
<button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark" name="submit">確定</button>
<button type="submit" onclick="location.href='/hotel_views/create'" class="btn btn-outline-info" data-mdb-ripple-color="dark" name="return">戻る</button></form>
</div>
@endsection
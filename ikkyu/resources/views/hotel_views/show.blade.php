@extends('layouts.app')

@section('content')
<table border="1">
<tr><th colspan="2">宿詳細情報</th></tr>
<tr><th>宿名</th><td>{{ $hotel->name }}</td></tr>
<tr><th>住所</th><td>{{ $hotel->address }}</td></tr>
<tr><th>分類</th><td>{{ $hotel->hotel_type }}</td></tr>
<tr><th>チェックイン/アウト</th><td>{{ $hotel->checkin_time }}～{{ $hotel->checkout_time }}</td></tr>
<tr><th>金額/日</th><td>※プランごとに違う※円</td></tr>
<tr><th>部屋数</th><td>{{ $hotel->max_rooms }}</td></tr>
</table>
<button onclick="location.href='/hotel_views/edit'">変更</button>
<button onclick="location.href='/hotel_views/hotelDelete'">削除</button>
<button onclick="location.href='/hotel_views/hotelManagement'">＜戻る</button>

@endsection
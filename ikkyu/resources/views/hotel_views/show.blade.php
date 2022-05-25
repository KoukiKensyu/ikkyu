@extends('layouts.app')

@section('content')
<table class="table">
<tr><th colspan="2">宿詳細情報</th></tr>
<tr><th>宿名</th><td>{{ $hotel->name }}</td></tr>
<tr><th>住所</th><td>{{ $hotel->address }}</td></tr>
<tr><th>分類</th><td>{{ $hotel->hotel_type }}</td></tr>
<tr><th>チェックイン/アウト</th><td>{{ $hotel->checkin_time }}～{{ $hotel->checkout_time }}</td></tr>
<tr><th>部屋数</th><td>{{ $hotel->max_rooms }}</td></tr>
<tr><th>コメント</th><td>{{ $hotel->comment }}</td></tr>
</table>
<button onclick="location.href='/hotel_views/edit/{{ $hotel->id }}'">変更</button>
<button onclick="location.href='/hotel_views/delete/{{ $hotel->id }}'">削除</button>
<button onclick="location.href='/hotel_views/index'">＜戻る</button>

@endsection
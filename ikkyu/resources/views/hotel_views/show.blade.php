@extends('layouts.app')

@section('content')

<table class="table">
<tr><th colspan="2">宿詳細情報</th></tr>
<tr><th>宿名</th><td>{{ $hotel->name }}</td></tr>
<tr><th>住所</th><td>{{ $hotel->address }}</td></tr>
<tr><th>分類</th><td>{{ $hotel->hotel_type }}</td></tr>
<tr><th>チェックイン/アウト</th><td>{{ $hotel->checkin_time }}～{{ $hotel->checkout_time }}</td></tr>
<tr><th>部屋数</th><td>{{ $hotel->max_rooms }}部屋</td></tr>
<tr><th>金額/1部屋</th><td>{{ $hotel->price }}円</td></tr>
<tr><th>コメント</th><td><?php echo nl2br($hotel->comment); ?> </td></tr>
</table>
<div class="text-right">
    <button onclick="location.href='/hotel_views/edit/{{ $hotel->id }}'" class="btn btn-outline-danger " data-mdb-ripple-color="dark">変更</button>
    <button onclick="location.href='/hotel_views/delete/{{ $hotel->id }}'" class="btn btn-danger btn-rounded">削除</button>
    <button onclick="location.href='/hotel_views/index'" class="btn btn-outline-info" data-mdb-ripple-color="dark">＜戻る</button>
</div>
@endsection
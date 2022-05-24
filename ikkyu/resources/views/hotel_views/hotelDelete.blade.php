@extends('layouts.app')

@section('content')

<table border="1">
<tr><th colspan="2">宿詳細情報</th></tr>
<tr><th>宿名</th><td>{{ $hotel->name }}</td></tr>
<tr><th>住所</th><td>{{ $hotel->address }}</td></tr>
<tr><th>分類</th><td>{{ $hotel->hotel_type }}</td></tr>
<tr><th>チェックイン/アウト</th><td>{{ $hotel->checkin_time }}～{{ $hotel->checkout_time }}</td></tr>
<tr><th>部屋数</th><td>{{ $hotel->max_rooms }}部屋</td></tr>
</table>

<p>この宿情報を削除しますか</p>
<form action="{{route('hotels.destroy',$hotel->id)}}" method="post">
    @csrf
    @method('delete')
<button type="submit">確定</button>
</form>
<button onclick="location.href='/hotel_views/show/{{ $hotel->id }}'">＜戻る</button>
@endsection
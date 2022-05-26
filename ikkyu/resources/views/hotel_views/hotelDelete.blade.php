@extends('layouts.app')

@section('content')

<table border="1" class="table">
<tr><th colspan="2">宿詳細情報</th></tr>
<tr><th>宿名</th><td>{{ $hotel->name }}</td></tr>
<tr><th>住所</th><td>{{ $hotel->address }}</td></tr>
<tr><th>分類</th><td>{{ $hotel->hotel_type }}</td></tr>
<tr><th>チェックイン/アウト</th><td>{{ $hotel->checkin_time }}～{{ $hotel->checkout_time }}</td></tr>
<tr><th>部屋数</th><td>{{ $hotel->max_rooms }}部屋</td></tr>
<tr><td>金額/1部屋</td><td>{{$hotel->price}}円</td></tr>
<tr><th>コメント</th><td>{{ $hotel->comment }}</td></tr>
</table>

<p>この宿情報を削除しますか</p>
<form action="{{route('hotels.destroy',$hotel->id)}}" method="post">
    @csrf
    @method('delete')
<div class="d-flex justify-content-end">
<button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark">確定</button>
</form>
<button type="button" onclick="location.href='/hotel_views/show/{{ $hotel->id }}'" class="btn btn-outline-info" data-mdb-ripple-color="dark">＜戻る</button>
</div>
@endsection
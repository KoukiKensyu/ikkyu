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
<tr><th>コメント</th><td><?php echo nl2br($hotel->comment); ?></td></tr>
</table>

<div class="d-flex justify-content-center"> <!--tableをセンターに表示-->
<div class="card" style="width: 40rem;"> <!--tableをcard化-->    
@if(!$reservations->isEmpty())
<table border="1" class="table">
<tr><th colspan="2">未宿泊の予約記録</th><th></th></tr>
<tr><th>宿名</th><th>予約日</th><th>チェックイン</th><th>チェックアウト</th></tr>
@foreach($reservations as $reserve)
<tr><td>{{$reserve->name}}</td><td>{{$reserve->reserved_date}}</td><td>{{$reserve->checkin_date}}</td><td>{{$reserve->checkout_date}}</td></tr>
@endforeach
</table>
未宿泊の予定をキャンセルします<br></div></div>
@endif

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
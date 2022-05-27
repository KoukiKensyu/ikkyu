@extends('layouts.app')

@section('content')

<div
  class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
  style="background-image: url('/images/beach_background.jpg');"
>
  <h1 class="mb-3 h2">会員退会確認</h1>
</div>

<!--未宿泊の予約があるかどうかでif-->
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
未宿泊の予定はキャンセルします<br>
@endif
<!-- endif-->
本当に退会しますか？
<div class="d-flex justify-content-end"> <!--ボタンを右サイドにレイアウト-->
<form action="{{route('mypage.delete')}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" name="id" value="{{$users->id}}">
    <div class="text-right">
        <button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark">確定</button>
</form>
      <button type="button" onclick="location.href='/mypage/index'" class="btn btn-outline-info" data-mdb-ripple-color="dark">戻る</button>
</div>
</div></div></div>
@endsection
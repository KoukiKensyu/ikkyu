@extends('layouts.app')

@section('content')

<div
  class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
  style="background-image: url('/images/beach_background.jpg');"
>
  <h1 class="mb-3 h2">会員退会</h1>
</div>

<!--未宿泊の予約があるかどうかでif-->
<div class="d-flex justify-content-center"> <!--tableをセンターに表示-->
<div class="card" style="width: 40rem;"> <!--tableをcard化-->    

<table border="1" class="table">
<tr><th colspan="2">未宿泊の予約記録</th><th></th></tr>
<tr><th>宿名</th><th>予約日</th><th>宿泊日</th></tr>
<tr><td>東横イン</td><td>2022年4月20日</td><td>2022年5月20日</td></tr>
</table>
未宿泊の予定をキャンセルします<br>
<!-- endif-->
[会員ID：{{$users->id}}][氏名：{{$users->name}}]は退会しますか？
<div class="d-flex justify-content-end"> <!--ボタンを右サイドにレイアウト-->
<button onclick="location.href='/'" class="btn btn-outline-danger" data-mdb-ripple-color="dark">確定</button>
<button onclick="location.href='/mypage/index'" class="btn btn-outline-info" data-mdb-ripple-color="dark">＜戻る</button>
</div></div></div>
<form action="{{route('mypage.delete', $users->id)}}">
    @csrf
    @method('delete')
    <input type="hidden" name="id" value="{{$users->id}}">
    <button type="submit">確定</button>
</form>
@endsection
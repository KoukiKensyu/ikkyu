@extends('layouts.app')

@section('content')
<div
  class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/003.webp');"
>
  <h1 class="mb-3 h2">変更内容確認</h1>
</div>

<div class="d-flex justify-content-center"> <!--tableをセンターに表示-->
<div class="card" style="width: 40rem;"> <!--tableをcard化-->

<table border="1" class="table">
<tr><th colspan="2">会員情報</th></tr>
<!--<tr><th>会員ID</th><td>{{$user->id}}</td></tr>-->
<tr><th>氏名</th><td>{{$user->name}}</td></tr>
<tr><th>住所</th><td>{{$user->address}}</td></tr>
<tr><th>電話番号</th><td>{{$user->tel}}</td></tr>
<tr><th>メールアドレス</th><td>{{$user->email}}</td></tr>
<tr><th>生年月日</th><td>{{$user->birthday}}</td></tr>
<tr><th>パスワード</th><td>pasword</td></tr>
</table>
<p>この内容で確定しますか？</p>
<form action="{{route('mypage.edit_store', $user->id)}}" method="post">
    @method('patch')
    @csrf
<input type="hidden" name="id" value="{{$user->id}}">
<input type="hidden" name="name" value="{{$user->name}}">
<input type="hidden" name="address" value="{{$user->address}}">
<input type="hidden" name="tel" value="{{$user->tel}}">
<input type="hidden" name="email" value="{{$user->email}}">
<input type="hidden" name="birthday" value="{{$user->birthday}}">
<div class="text-right">
    <button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark" name="submit">確定</button>
    <button onclick="location.href='/mypage/edit'" class="btn btn-outline-info" data-mdb-ripple-color="dark" name="return">戻る</button>
</form>
</div>
</div>
</div>
@endsection
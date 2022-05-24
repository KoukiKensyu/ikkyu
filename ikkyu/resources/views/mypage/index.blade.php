@extends('layouts.app')

@section('content')
<!-- Jumbotron -->
<div
  class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
  style="background-image: url('/images/beach_background.jpg');"
>
  <h1 class="mb-3 h2">会員情報</h1>

  <p>

  </p>
</div>
<!-- Jumbotron -->
<div class="d-flex justify-content-center">
<div class="card" style="width: 40rem;">

<table border="1" class="table">
<tr><th colspan="2">会員情報</th></tr>
<tr><th>会員ID</th><td>{{$users->id}}</td></tr>
<tr><th>氏名</th><td>{{$users->name}}</td></tr>
<tr><th>住所</th><td>{{$users->address}}</td></tr>
<tr><th>電話番号</th><td>{{$users->tel}}</td></tr>
<tr><th>メールアドレス</th><td>{{$users->email}}</td></tr>
<tr><th>生年月日</th><td>{{$users->birthday}}</td></tr>
</table>
<div class="d-flex justify-content-end">
<button onclick="location.href='/mypage/edit'" class="btn btn-outline-danger" data-mdb-ripple-color="dark">変更</button>
<button onclick="location.href='/mypage/UserDelete'" class="btn btn-danger btn-rounded">退会</button>
<button onclick="location.href='/user_home/index'" class="btn btn-outline-info" data-mdb-ripple-color="dark" >＜戻る</button>
</div>
</div>
</div>

@endsection
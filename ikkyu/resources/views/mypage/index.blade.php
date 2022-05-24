@extends('layouts.app')

@section('content')
<table border="1">
<tr><th colspan="2">会員情報</th></tr>
<tr><th>会員ID</th><td>{{$users->id}}</td></tr>
<tr><th>氏名</th><td>{{$users->name}}</td></tr>
<tr><th>住所</th><td>{{$users->address}}</td></tr>
<tr><th>電話番号</th><td>{{$users->tel}}</td></tr>
<tr><th>メールアドレス</th><td>{{$users->email}}</td></tr>
<tr><th>生年月日</th><td>{{$users->birthday}}</td></tr>
</table>
<button onclick="location.href='/mypage/edit'">変更</button>
<button onclick="location.href='/mypage/UserDelete'">退会</button>
<button onclick="location.href='/user_home/index'">戻る</button>
@endsection
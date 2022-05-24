@extends('layouts.app')

@section('content')
<table border="1">
<tr><th colspan="2">会員情報</th></tr>
<tr><th>会員ID</th><td>{{$user->id}}</td></tr>
<tr><th>氏名</th><td>{{$user->name}}</td></tr>
<tr><th>住所</th><td>{{$user->address}}</td></tr>
<tr><th>電話番号</th><td>{{$user->tel}}</td></tr>
<tr><th>メールアドレス</th><td>{{$user->email}}</td></tr>
<tr><th>生年月日</th><td>{{$user->birthday}}</td></tr>
</table>
</table>
<button onclick="location.href='/admin/user_edit/{{$user ->id}}'">変更</button>
<button onclick="location.href='/admin/user_delete/{{$user ->id}}'">退会</button>
<button onclick="location.href='/admin/user_index'">＜戻る</button>

@endsection
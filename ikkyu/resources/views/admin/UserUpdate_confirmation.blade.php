@extends('layouts.app')

@section('content')
<form action="{{route('update', $user->id)}}" method="POST">
    @method('patch')
    @csrf
<table border="1">
<tr><th colspan="2">会員情報</th></tr>
<tr><th>会員ID</th><td>{{$user->id}}</td></tr>
<tr><th>氏名</th><td>{{$user->name}}</td></tr>
<tr><th>住所</th><td>{{$user->address}}</td></tr>
<tr><th>電話番号</th><td>{{$user->tel}}</td></tr>
<tr><th>メールアドレス</th><td>{{$user->email}}</td></tr>
<tr><th>生年月日</th><td>{{$user->birthday}}</td></tr>
</table>
<input type="hidden" name="name" value="{{$user->name}}">
<input type="hidden" name="address" value="{{$user->address}}">
<input type="hidden" name="tel" value="{{$user->tel}}">
<input type="hidden" name="email" value="{{$user->email}}">
<input type="hidden" name="birthday" value="{{$user->birthday}}">


<p>この内容で確定しますか？</p>
<button type="submit">変更</button>
</form>
<button onclick="location.href='/admin/UserUpdate'">戻る</button>
@endsection
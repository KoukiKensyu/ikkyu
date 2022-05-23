@extends('layouts.app')

@section('content')

<form action="{{route('confirm', $user->id)}}" method="POST">
@csrf
<input type="hidden" name="id" value="{{$user->id}}">
<table class="table">
<tr><th>氏名：</th><td><input type="text" name="name" value="{{$user->name}}"></td></tr>
<tr><th>住所：</th><td><input type="text" name="address" value="{{$user->address}}"></td></tr>
<tr><th>電話番号：</th><td><input type="tel" name="tel" value="{{$user->tel}}"></td></tr>
<tr><th>メールアドレス：</th><td><input type="text" name="email" value="{{$user->email}}"></td></tr>
<tr><th>生年月日：</th><td><input type="date" name="birthday" value="{{$user->birthday}}"></td></tr>
</table>    
<button type="submit">変更</button>
</form>
<button onclick="location.href='/admin/UserIndex'">戻る</button>
@endsection
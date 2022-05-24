@extends('layouts.app')

@section('content')
<button onclick="location.href='/mypage/index'">戻る</button>
<form action="{{route('mypage.edit_confirmation', $user->id)}}" method="POST">
@csrf
<input type="hidden" name="id" value="{{$user->id}}">
<table class="table">
<tr><th>氏名：</th><td><input type="text" name="name" value="{{old('name',$user->name)}}"></td></tr>
<tr><th>住所：</th><td><input type="text" name="address" value="{{old('address',$user->address)}}"></td></tr>
<tr><th>電話番号：</th><td><input type="tel" name="tel" value="{{old('tel',$user->tel)}}"></td></tr>
<tr><th>メールアドレス：</th><td><input type="text" name="email" value="{{old('email',$user->email)}}"></td></tr>
<tr><th>生年月日：</th><td><input type="date" name="birthday" value="{{old('birthday',$user->birthday)}}"></td></tr>
<!--
<tr><th>変更前のパスワード：</th><td><input type="password" name="password" value=""></td></tr>
<tr><th>変更後のパスワード：</th><td><input type="password" name="password_new" value=""></td></tr>
<tr><th>確認用のパスワード：</th><td><input type="password" name="password_confirmation" value=""></td></tr>
-->
<button type="submit">変更</button>
</form>
<p></p>
@endsection
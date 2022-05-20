@extends('layouts.header')

@section('content')
<!--
<form action="" method="POST">
@csrf
-->
<table class="table">
<tr><th>氏名：</th><td><input type="text" name="name" value="{{old('name')}}"></td></tr>
<tr><th>住所：</th><td><input type="text" name="adress" value="{{old('adress')}}"></td></tr>
<tr><th>電話番号：</th><td><input type="tel" name="tel" value="{{old('tel')}}"></td></tr>
<tr><th>メールアドレス：</th><td><input type="text" name="email" value="{{old('email')}}"></td></tr>
<tr><th>生年月日：</th><td><input type="date" name="birthday" value="{{old('birthday')}}"></td></tr>
<tr><th>変更前のパスワード：</th><td><input type="password" name="password_old" value="{{old('password_old')}}"></td></tr>
<tr><th>変更後のパスワード：</th><td><input type="password" name="password" value=""></td></tr>
<tr><th>確認用のパスワード：</th><td><input type="password" name="password_confirmation" value=""></td></tr>
<!--
    </form>
-->
<button onclick="location.href='/mypage/edit_confirmation'">変更</button>
<button onclick="location.href='/mypage/index'">戻る</button>
@endsection
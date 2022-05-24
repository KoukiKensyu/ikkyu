@extends('layouts.app')

@section('content')
<div
  class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
  style="background-image: url('/images/beach_background.jpg');"
>
  <h1 class="mb-3 h2">会員情報変更</h1>
</div>

<button onclick="location.href='/mypage/index'" class="btn btn-outline-info" data-mdb-ripple-color="dark" >戻る</button>
<form action="{{route('mypage.edit_confirmation', $user->id)}}" method="POST">
@csrf
<input type="hidden" name="id" value="{{$user->id}}">

<div class="d-flex justify-content-center">
<div class="card" style="width: 40rem;">
<table border="1" class="table">
<tr><th colspan="2">会員情報</th></tr>
<tr><th>氏名：</th>
    <td><div class="form-outline">
        <input type="text" name="name" value="{{old('name',$user->name)}}"  id="form12" class="form-control">
    </td></tr>
<tr><th>住所：</th>
    <td>
        <div class="form-outline">
        <input type="text" name="address" value="{{old('address',$user->address)}}" id="form12" class="form-control">
    </td></tr>
<tr><th>電話番号：</th>
    <td>
        <div class="form-outline">
        <input type="tel" name="tel" value="{{old('tel',$user->tel)}}" id="form12" class="form-control">
    </td></tr>
<tr><th>メールアドレス：</th>
    <td>
        <div class="form-outline">
        <input type="text" name="email" value="{{old('email',$user->email)}}" id="form12" class="form-control">
    </td></tr>
<tr><th>生年月日：</th>
    <td>
        <div class="form-outline">
            <input type="date" name="birthday" value="{{old('birthday',$user->birthday)}}" id="form12" class="form-control">
    </td></tr>
<!--
<tr><th>変更前のパスワード：</th><td><input type="password" name="password" value=""></td></tr>
<tr><th>変更後のパスワード：</th><td><input type="password" name="password_new" value=""></td></tr>
<tr><th>確認用のパスワード：</th><td><input type="password" name="password_confirmation" value=""></td></tr>
-->
</table>
</div>
</div>
<button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark">変更</button>
</form>

@endsection

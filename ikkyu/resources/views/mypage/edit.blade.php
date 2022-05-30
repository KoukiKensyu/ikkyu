@extends('layouts.app')

@section('content')

<!--<div class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
  style="background-image: url('/images/beach_background.jpg');">
  <h1 class="mb-3 h2">会員情報変更</h1>
</div>-->
<div class="text-center">
    <h1 class="mb-3 h2">会員情報変更</h1>
</div>
@include('commons/flash')

<form class="needs-validation" action="{{route('mypage.edit_confirmation', $user->id)}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <div class="d-flex justify-content-center"> <!--tableをセンターに表示-->
    <div class="card" style="width: 40rem;"> <!--tableをcard化-->
        <table class="table">
        <tr><th colspan="2">会員情報</th></tr>
        <tr>
            <th><label for="validationCustom01" class="form-label">氏名：</label></th>
            <td><div class="form-outline">
                <input class="form-control" id="validationCustom01" type="text" name="name" value="{{old('name',$user->name)}}" required></td>
        </tr>
        <tr>
            <th><label for="validationCustom02" class="form-label">住所：</label></th>
            <td><div class="form-outline">
                <input class="form-control" id="validationCustom02" type="text" name="address" value="{{old('address',$user->address)}}" required></td>
        </tr>
        <tr>
            <th><label for="validationCustom03" class="form-label">電話番号：</label></th>
            <td><div class="form-outline">
                <input class="form-control" id="validationCustom03" type="tel" name="tel" value="{{old('tel',$user->tel)}}" required></td>
        </tr>
        <tr>
            <th><label for="validationCustom04" class="form-label">メールアドレス：</label></th>
            <td><div class="form-outline">
                <input class="form-control" id="validationCustom04" type="email" name="email" value="{{old('email',$user->email)}}" required></td>
        </tr>
        <tr>
            <th><label for="validationCustom05" class="form-label">生年月日：</label></th>
            <td><div class="form-outline">
                <input class="form-control" id="validationCustom05" type="date" name="birthday" value="{{old('birthday',$user->birthday)}}" required></td>
        </tr>
        </table>

    <!--
    <tr><th>変更前のパスワード：</th><td><input type="password" name="password" value=""></td></tr>
    <tr><th>変更後のパスワード：</th><td><input type="password" name="password_new" value=""></td></tr>
    <tr><th>確認用のパスワード：</th><td><input type="password" name="password_confirmation" value=""></td></tr>
    -->
    <div class="text-right">
        <button class="btn btn-outline-danger" data-mdb-ripple-color="dark" type="submit">確認画面へ</button>
</form>
        <button type="button" onclick="location.href='/mypage/index'" class="btn btn-outline-info" data-mdb-ripple-color="dark">戻る</button>
    </div>
</div>
</div>
@endsection

